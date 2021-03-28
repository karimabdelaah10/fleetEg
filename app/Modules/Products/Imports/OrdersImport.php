<?php

namespace App\Modules\Products\Imports;

use App\Modules\BaseApp\Enums\GeneralEnum;
use App\Modules\MoneyProcess\Enums\MoneyProcessEnum;
use App\Modules\Products\Models\Order;
use App\Modules\Products\Models\Productspecvalue;
use App\Modules\Users\Enums\UserEnum;
use App\Modules\Users\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrdersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if (!empty($row['id'])){
            if (in_array($row['row'] ,get_product_admin_orders())){
                $order = Order::find($row['id']);
                if ($order){
                    $rowToUpdate=[
                        'status' => $row['status'],
                    ];
                    if (!empty($row['shipping_number'])){
                        $rowToUpdate['shipping_number'] = $row['shipping_number'];
                        }
                    $order->update($rowToUpdate);
                    if ($order->status == GeneralEnum::DELIVERED){
                        $user= User::findOrFail($order->user_id);
                        // Todo To add this process to transactions db
                        createTransaction($order->user_id , $user->available_balance ,
                            $user->available_balance + $order->total_commission ,
                            $order->total_commission , MoneyProcessEnum::New_ORDER_PRICE);

                        //Todo to send notification to admin about order delivered
                        $description=trans('notifications.notification_order_delivered_txt');
                        $to= UserEnum::CUSTOMER;
                        $related_element_id = $row['id'];
                        $related_element_type = Order::class;
                        create_new_notification($description , $to , $order->user_id ,$related_element_id ,$related_element_type);
                        $user->increment('available_balance',$order->total_price);
                    }
                    elseif ($order->status == GeneralEnum::NOT_SERIOUS || $order->status == GeneralEnum::RETURNED_TO_STOCK){
                        //Todo to increase amount again
                        if (count($order->orderProducts)){
                            foreach ($order->orderProducts as $product){
                                $product_spec_value=Productspecvalue::findOrFail($product->pivot->product_spec_value_id);
                                $product_spec_value->increment('stock' , $product->amount);
                            }
                        }
                    }
                }
            }
        }
    }
}

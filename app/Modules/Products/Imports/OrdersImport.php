<?php

namespace App\Modules\Products\Imports;

use App\Modules\Products\Models\Order;
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
            $order = Order::find($row['id']);
            if ($order){
                $order->update(['status' => $row['status']]);
            }
        }
        }
}

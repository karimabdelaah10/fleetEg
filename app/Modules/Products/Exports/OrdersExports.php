<?php

namespace App\Modules\Products\Exports;

use App\Modules\Products\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExports implements FromCollection,WithHeadings
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        $data=[];
//        return collect($this->data);
        foreach ($this->data as $row){
            foreach ($row->orderProducts as $product){
                $record =[
                    $row->id,
                    $row->customer_name,
                    $row->customer_mobile_number,
                    $row->customer_area,
                    $row->customer_address,
                    $product->title,
                    $product->pivot->detail,
                    $product->pivot->amount,
                    $row->total_price,
                    $row->status,
                   @$row->governorate->title,
                    $row->store_name,
                    $row->shipping_note,
                ];
                array_push($data , $record);
            }
        }

        return collect($data);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Id',
            'Customer Name',
            'Customer Mobile Number',
            'Customer Area',
            'Customer Address',
            'Product Title',
            'Product Details',
            'Amount',
            'Total Price',
            'Status',
            'Governorate',
            'Store Name',
            'Shipping Note',
        ];
    }
}

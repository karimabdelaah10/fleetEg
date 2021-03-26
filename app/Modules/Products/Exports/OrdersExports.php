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
        return collect($this->data);
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
            'Shipping Company',
            'Store Name',
            'Total Price',
            'Total Commission',
            'Status',
            'Governorate Id',
            'User Id',
            'Created At',
            'Updated At',
        ];
    }
}

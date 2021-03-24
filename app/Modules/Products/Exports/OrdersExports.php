<?php

namespace App\Modules\Products\Exports;

use App\Modules\Products\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExports implements FromCollection
{
    public function collection()
    {
        return Order::all();
    }
}

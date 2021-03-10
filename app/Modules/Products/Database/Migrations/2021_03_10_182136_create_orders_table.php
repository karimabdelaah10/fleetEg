<?php

use App\Modules\Products\Enums\OrdersEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('customer_mobile_number')->nullable();
            $table->string('customer_area')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('shipping_note')->nullable();
            $table->string('store_name')->nullable();
            $table->float('total_price')->default(0);
            $table->enum('status', OrdersEnum::ordersStatuses() );
            $table->unsignedBigInteger('governorate_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

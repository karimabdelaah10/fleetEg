<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderproductdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderproductdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderproduct_id')->nullable();
            $table->unsignedBigInteger('spec_value_id')->nullable();
            $table->string('detail')->nullable();

            $table->foreign('spec_value_id')->references('id')->on('specvalues')->onDelete('cascade');
            $table->foreign('orderproduct_id')->references('id')->on('orderproducts')->onDelete('cascade');

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
        Schema::dropIfExists('orderproductdetails');
    }
}

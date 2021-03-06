<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductspecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productspecs', function (Blueprint $table) {
            $table->id();

            $table->integer('stock')->default(0);
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('spec_value_id')->nullable();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('SET NULL');
            $table->foreign('spec_value_id')->references('id')->on('specvalues')->onDelete('SET NULL');

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
        Schema::dropIfExists('productspecs');
    }
}

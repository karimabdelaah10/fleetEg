<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->float('price');
            $table->string('image')->nullable();
            $table->float('commission');
            $table->integer('amount')->default(1);
            $table->unsignedBigInteger('spec_value_id')->nullable();
            $table->unsignedBigInteger('inner_spec_value_id')->nullable();


            $table->foreign('spec_value_id')->references('id')->on('specvalues')->onDelete('cascade');
            $table->foreign('inner_spec_value_id')->references('id')->on('specvalues')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('carts');
    }
}

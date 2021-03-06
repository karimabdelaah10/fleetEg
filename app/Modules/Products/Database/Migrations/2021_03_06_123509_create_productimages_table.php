<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productimages', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();

            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('product_spec_id')->nullable();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('SET NULL');
            $table->foreign('product_spec_id')->references('id')->on('productspecs')->onDelete('SET NULL');

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
        Schema::dropIfExists('productimages');
    }
}

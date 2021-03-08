<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductspecvaluesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productspecvalues', function (Blueprint $table) {
            $table->id();
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('spec_value_id')->nullable();
            $table->unsignedBigInteger('parent_spec_value_id')->nullable();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('SET NULL');
            $table->foreign('spec_value_id')->references('id')->on('specvalues')->onDelete('SET NULL');
            $table->foreign('parent_spec_value_id')->references('id')->on('specvalues')->onDelete('SET NULL');

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
        Schema::dropIfExists('productspecvalues');
    }
}

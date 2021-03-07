<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecvaluesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specvalues', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->boolean('is_active')->default(1);

            $table->unsignedBigInteger('spec_id')->nullable();
            $table->foreign('spec_id')->references('id')->on('specs')->onDelete('SET NULL');
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
        Schema::dropIfExists('specvalues');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("work_type")->nullable();
            $table->string("job_title")->nullable();
            $table->string("company_name")->nullable();
            $table->string("company_address")->nullable();

            $table->string("employment_document")->nullable();
            $table->string("utility_bill")->nullable();

            $table->unsignedBigInteger('marital_status')->nullable();
            $table->foreign('marital_status')->references('id')->on('options')->onDelete('SET NULL');

            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id')->references('id')->on('countries')->onDelete('SET NULL');

            $table->string('passport_number')->nullable();
            $table->string('national_id')->nullable();

            $table->string('national_id_image_front')->nullable();
            $table->string('national_id_image_back')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');

            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
}

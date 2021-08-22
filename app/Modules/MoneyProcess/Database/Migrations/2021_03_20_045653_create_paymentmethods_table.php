<?php

use App\Modules\MoneyProcess\Enums\PaymentMethodEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentmethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentmethods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('default')->default(false);
            $table->enum('type',PaymentMethodEnum::paymentMethodsTypes())->default(PaymentMethodEnum::CASH);
            $table->string('bank_account_number')->nullable();
            $table->string('e_wallet_number')->nullable();
            $table->string('national_id')->nullable();
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
        Schema::dropIfExists('paymentmethods');
    }
}

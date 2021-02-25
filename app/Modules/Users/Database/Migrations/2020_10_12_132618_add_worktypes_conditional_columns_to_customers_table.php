<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorktypesConditionalColumnsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string("net_income")->nullable();
            $table->string("additional_monthly_income")->nullable();
            $table->string("hr_document")->nullable();

            $table->string("work_field")->nullable();
            $table->string("income_proof")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn("net_income");
            $table->dropColumn("additional_monthly_income");
            $table->dropColumn("hr_document");

            $table->dropColumn("work_field");
            $table->dropColumn("income_proof");
        });
    }
}

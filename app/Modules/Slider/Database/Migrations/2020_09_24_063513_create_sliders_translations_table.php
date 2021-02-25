<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTranslationsTable extends Migration
{
    /**
     * Run the translationss.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('locale')->index();
            $table->unique(['slider_id','locale']);
            $table->bigInteger('slider_id')->unsigned();
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the translationss.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders_translations');
    }
}

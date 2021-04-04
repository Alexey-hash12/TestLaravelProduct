<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictationResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('dictation_result_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dictation_id')->unsigned()->index();
            $table->foreign('dictation_id')->references('id')->on('dictation_models');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text("text");
            $table->dateTime('input_at');
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
        Schema::dropIfExists('dictation_results');
    }
}

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
            $table->text('dictation_title')->unsigned()->index();
            $table->foreign('dictation_id')->references('title')->on('dictation_models');
            $table->text('user_name')->unsigned()->index();
            $table->foreign('user_name')->references('name')->on('users');
             $table->text('user_email')->unsigned()->index();
            $table->foreign('user_email')->references('email')->on('users');           
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

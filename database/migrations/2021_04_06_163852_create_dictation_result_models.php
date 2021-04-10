<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictationResultModels extends Migration
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
            $table->text("title_of_dictation");
            $table->text("user_name");
            $table->text("user_email");           
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

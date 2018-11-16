<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_question', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('answer_id');
            $table->unsignedInteger('alternative_id')->nullable();
            $table->text('response');

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
            $table->foreign('answer_id')
                ->references('id')
                ->on('answers')
                ->onDelete('cascade');
            $table->foreign('alternative_id')
                ->references('id')
                ->on('alternatives')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_question');
    }
}

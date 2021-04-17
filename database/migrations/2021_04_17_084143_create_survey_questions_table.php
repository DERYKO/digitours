<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('survey_id')->unsigned();
            $table->integer('survey_question_type_id')->unsigned();
            $table->string('question');
            $table->integer('added_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('survey_id')
                ->references('id')
                ->on('surveys')
                ->onDelete('cascade')
                ->onUpdate('no action');
            $table->foreign('survey_question_type_id')
                ->references('id')
                ->on('survey_question_types')
                ->onDelete('cascade')
                ->onUpdate('no action');
            $table->foreign('added_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_questions');
    }
}

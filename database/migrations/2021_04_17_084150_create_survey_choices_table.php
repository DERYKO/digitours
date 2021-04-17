<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_choices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('survey_question_id')->unsigned();
            $table->string('choice');
            $table->integer('added_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('survey_question_id')
                ->references('id')
                ->on('survey_questions')
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
        Schema::dropIfExists('survey_choices');
    }
}

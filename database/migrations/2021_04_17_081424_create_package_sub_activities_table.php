<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageSubActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_sub_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_activity_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('package_id')
                ->references('id')
                ->on('packages')
                ->onDelete('cascade')
                ->onUpdate('no action');
            $table->foreign('sub_activity_id')
                ->references('id')
                ->on('sub_activities')
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
        Schema::dropIfExists('package_sub_activities');
    }
}

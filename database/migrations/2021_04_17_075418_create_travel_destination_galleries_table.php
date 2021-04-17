<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelDestinationGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_destination_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('travel_destination_id')->unsigned();
            $table->enum('file_type',['video','image']);
            $table->string('file_path');
            $table->integer('added_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('added_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('no action');
            $table->foreign('travel_destination_id')
                ->references('id')
                ->on('travel_destinations')
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
        Schema::dropIfExists('travel_destination_galleries');
    }
}

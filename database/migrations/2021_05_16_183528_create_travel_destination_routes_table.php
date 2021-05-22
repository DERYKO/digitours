<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelDestinationRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_destination_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('travel_destination_id')->unsigned();
            $table->integer('route_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('travel_destination_id')
                ->references('id')
                ->on('travel_destinations')
                ->onDelete('cascade')
                ->onUpdate('no action');
            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
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
        Schema::dropIfExists('travel_destination_routes');
    }
}

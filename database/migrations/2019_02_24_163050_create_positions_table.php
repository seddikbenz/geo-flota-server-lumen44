<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->float('lat');
            $table->float('lon');
            $table->float('alt')->nullable();
            $table->float('speed')->nullable();
            $table->float('fuel')->nullable();
            $table->float('precision')->nullable();
            $table->enum('state', ['on', 'off']);

            $table->integer('tracker_id')->unsigned();
            $table->foreign('tracker_id')
                ->references('id')->on('trackers');

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
        Schema::dropIfExists('positions');
    }
}

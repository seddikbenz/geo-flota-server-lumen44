<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tel');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');

            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')
                ->references('id')->on('cars');

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
        Schema::dropIfExists('drivers');
    }
}

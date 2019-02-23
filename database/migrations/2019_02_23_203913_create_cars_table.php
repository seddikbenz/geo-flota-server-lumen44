<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numberplate')->unique();

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('car_user', function (Blueprint $table) {
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');

            $table->primary(['car_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_user');
        Schema::dropIfExists('cars');
    }
}

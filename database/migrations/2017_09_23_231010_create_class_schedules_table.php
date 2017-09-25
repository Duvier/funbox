<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('time');
            $table->integer('quotas');
            $table->integer('users_id');
            $table->timestamps();
            /*-- Llaves foraneas --*/
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_schedules');
    }
}

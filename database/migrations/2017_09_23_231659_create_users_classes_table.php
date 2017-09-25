<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->integer('class_id');
            $table->boolean('finish')->default(0);
            $table->timestamps();
            /*-- Llaves foraneas --*/
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('class_id')->references('id')->on('users_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_classes');
    }
}

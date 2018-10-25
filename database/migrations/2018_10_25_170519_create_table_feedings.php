<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFeedings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedings', function (Blueprint $table) {
          $table->increments('id');
          $table->float('quantity');
          $table->integer('duck_count');
          $table->integer('location_id')->unsigned();
          $table->integer('food_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->integer('task_id')->unsigned()->nullable();
          $table->dateTimeTz('time');
          $table->string('comment')->nullable();
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
      Schema::dropIfExists('feedings');
    }
}

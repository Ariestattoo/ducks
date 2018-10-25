<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
          $table->increments('id');
          $table->string('portion');
          $table->string('name');
          $table->string('description');
          $table->enum('nutritious_quality',['low','medium','high']);
          //https://www.thespruce.com/what-to-feed-ducks-386584
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
      Schema::dropIfExists('foods');
    }
}

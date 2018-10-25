<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('feedings', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
    });
    Schema::table('tasks', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
    });


  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('feedings', function (Blueprint $table) {
      $table->dropForeign('feedings_user_id_foreign');
      $table->dropForeign('feedings_food_id_foreign');
      $table->dropForeign('feedings_task_id_foreign');
      $table->dropForeign('feedings_location_id_foreign');

    });
    Schema::table('tasks', function (Blueprint $table) {
      $table->dropForeign('tasks_user_id_foreign');
    });
  }
}

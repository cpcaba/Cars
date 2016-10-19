<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKCarsModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //$table->foreign('user_id')->references('id')->on('users')->deleted_at('cascade');
        Schema::table('cars', function (Blueprint $table) {
          $table->foreign('modelo_id')->references('id')->on('modelos')->deleted_at('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
          $table->dropForeign('cars_modelo_id_foreign');
        });
    }
}

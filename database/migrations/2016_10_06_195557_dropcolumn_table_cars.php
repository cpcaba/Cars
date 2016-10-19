<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropcolumnTableCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::table('cars', function (Blueprint $table) {
          $table->dropColumn('color');
          $table->dropColumn('brand_id');
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
        $table->integer('brand_id')->unsigned();
          $table->string('color',10);
      });
    }
}

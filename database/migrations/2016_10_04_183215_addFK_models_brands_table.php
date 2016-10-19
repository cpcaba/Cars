<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKModelsBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //$table->foreign('model_id')->references('id')->on('models')->deleted_at('cascade');
        Schema::table('modelos', function (Blueprint $table) {
          $table->foreign('brand_id')->references('id')->on('brands')->deleted_at('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('modelos', function (Blueprint $table) {
        $table->dropForeign('modelos_brand_id_foreign');
      });
    }
}

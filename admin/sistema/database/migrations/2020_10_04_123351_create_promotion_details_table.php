<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_detail', function (Blueprint $table) {
            $table->increments('id_promotion_detail');
            $table->integer('id_promotion')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('quantity');
            $table->integer('state');
            $table->timestamps();

            $table->foreign('id_promotion')->references('id_promotion')->on('promotion');
            $table->foreign('id_product')->references('id_product')->on('product');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_detail');
    }
}

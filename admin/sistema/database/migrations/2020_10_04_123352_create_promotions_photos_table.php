<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_photo', function (Blueprint $table) {
            $table->increments('id_promotion_photo');
            $table->integer('id_promotion')->unsigned();
            $table->string('image',300)->nullable();
            $table->integer('state');
            $table->timestamps();
            $table->foreign('id_promotion')->references('id_promotion')->on('promotion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_photo');
    }
}

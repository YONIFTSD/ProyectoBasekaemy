<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id_order_detail');
            
            $table->integer('id_order')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('quantity');
            $table->string('size',100)->nullable();
            $table->decimal('unit_price',10,2);
            $table->decimal('total_price',10,2);
            $table->integer('state');
            $table->timestamps();
  
            $table->foreign('id_order')->references('id_order')->on('order');
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
        Schema::dropIfExists('order_detail');
    }
}

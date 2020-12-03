<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {

            $table->increments('id_order');
            $table->integer('id_client')->unsigned();
            $table->string('number_of_order',8)->nullable();
            $table->string('description',100)->nullable();
            $table->integer('id_coupon');
            $table->string('file',150)->nullable();
            $table->decimal('subtotal',10,2);
            $table->decimal('discount',10,2);
            $table->decimal('total',10,2);
            $table->integer('state');

            $table->integer('payment_status')->nullable();
            $table->string('c_charge_id',200)->nullable();
            $table->decimal('c_commission',10,2)->nullable();
            $table->decimal('c_igv',10,2)->nullable();
            $table->decimal('c_amount_to_deposit',10,2)->nullable();
  
            $table->timestamps();
            $table->foreign('id_client')->references('id_client')->on('client');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}

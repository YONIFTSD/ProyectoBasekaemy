<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id_product');
            $table->integer('id_category')->unsigned();
            $table->integer('id_subcategory')->unsigned();
            $table->string('code',30)->nullable();
            $table->string('name',100)->nullable();
            $table->string('related_product',1000)->nullable();
            $table->string('description',1000)->nullable();
            $table->string('specification',2000)->nullable();
            $table->string('image',300)->nullable();
            $table->string('link_visa',300)->nullable();
            $table->decimal('regular_price',10,2);
            $table->decimal('online_price',10,2);
            $table->integer('discount');
            $table->integer('stock');
            $table->integer('outstanding');
            $table->integer('state');
            $table->timestamps();
            $table->foreign('id_category')->references('id_category')->on('category');
            $table->foreign('id_subcategory')->references('id_subcategory')->on('subcategory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}

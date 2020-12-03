<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id_client');
            $table->string('document_type',3)->nullable();
            $table->string('document_number',20)->nullable();
            $table->string('name',150)->nullable();
            $table->string('last_name',150)->nullable();
            $table->string('phone',150)->nullable();
            $table->string('ubigee',6)->nullable();
            $table->string('address',200)->nullable();
            $table->string('email',150)->unique();
            $table->string('password',300);
            $table->string('sex',2)->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('state')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('client');
    }
}

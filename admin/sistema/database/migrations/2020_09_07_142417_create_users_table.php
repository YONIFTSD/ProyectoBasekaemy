<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
 
            $table->increments('id');
            $table->integer('id_user_type')->unsigned();
            $table->string('name', 200)->nullable();
            $table->string('last_name', 200)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('state');
            $table->timestamps();
            $table->foreign('id_user_type')->references('id_user_type')->on('user_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

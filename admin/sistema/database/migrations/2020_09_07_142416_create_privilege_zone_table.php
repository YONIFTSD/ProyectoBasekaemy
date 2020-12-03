<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegeZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege_zone', function (Blueprint $table) {
       
  
            $table->increments('id_privilege_zone');
            $table->integer('id_user_type')->unsigned();
            $table->integer('id_privilege')->unsigned();
            $table->integer('id_zone')->unsigned();
            $table->integer('state');
            $table->timestamps();
            $table->foreign('id_user_type')->references('id_user_type')->on('user_type');
            $table->foreign('id_privilege')->references('id_privilege')->on('privilege');
            $table->foreign('id_zone')->references('id_zone')->on('zone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privilege_zone');
    }
}

<?php

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
            $table->integer('tipo_docto')->unsigned();
            $table->string('numero');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('direccion');
            $table->string('telefono');
            $table->string('celular');
            $table->enum('type',['member','admin'])->default('member');
            $table->foreign('tipo_docto')->references('id')->on('documentos')->onDelete('cascade');
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
        Schema::drop('users');
    }
}

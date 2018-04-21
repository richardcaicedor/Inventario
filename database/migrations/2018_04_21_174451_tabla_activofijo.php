<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaActivofijo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activos_fijos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idtipoequipo')->unsigned();
            $table->longText('observacio');
            $table->string('arearesponsable');
            $table->string('codigobarra'); 
            $table->string('marca');
            $table->string('modelo');
            $table->date('fechaingreso');
            $table->date('fechacompra');
            $table->string('estado');
            $table->float('costo');
            $table->softDeletes(); 
            $table->timestamps(); 
            $table->foreign('idtipoequipo')->references('id')->on('tipos_equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activos_fijos');
    }
}

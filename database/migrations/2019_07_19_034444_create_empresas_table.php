<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut');
            $table->string('razonSocial');
            $table->string('paginaWeb');
            $table->timestamps();
        });

        Schema::create('comunas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
        });

        Schema::create('direcciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('direccion');
            $table->unsignedBigInteger('idComuna');
            $table->unsignedBigInteger('idEmpresa');
            $table->foreign('idComuna')->references('id')->on('comunas');
            $table->foreign('idEmpresa')->references('id')->on('empresas');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('direcciones');
      Schema::dropIfExists('comunas');
      Schema::dropIfExists('empresas');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comunas', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('nombre');
      });

      Schema::create('direcciones', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('direccion')->default('');
          $table->string('numeracion')->default('');
          $table->unsignedBigInteger('idComuna');
          $table->foreign('idComuna')->references('id')->on('comunas');
          $table->unsignedBigInteger('idDeudor');
          $table->foreign('idDeudor')->references('id')->on('empresas');
          $table->unsignedBigInteger('idAcreedor');
          $table->foreign('idAcreedor')->references('id')->on('empresas');
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
        Schema::dropIfExists('direcciones');
        Schema::dropIfExists('comunas');
    }
}

<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompromisoPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compromiso_pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('fecha')->default( Carbon::now() );
            $table->unsignedBigInteger('idAcreedor');
            $table->unsignedBigInteger('idDeudor');
            $table->unsignedBigInteger('idCuota');
            $table->foreign('idAcreedor')->references('id')->on('empresas');
            $table->foreign('idDeudor')->references('id')->on('empresas');
            $table->foreign('idCuota')->references('id')->on('cuotas');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compromiso_pagos');
    }
}

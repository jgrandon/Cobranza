<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobranzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobranzas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idEstado');
            $table->string('observacion');
            $table->unsignedBigInteger('idDocumento');
            $table->foreign('idCuota')->references('id')->on('cuotas');
            $table->foreign('idEstado')->references('id')->on('estadosCobranza');
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
        Schema::dropIfExists('cobranzas');
        Schema::dropIfExists('estadosCobranza');
    }
}

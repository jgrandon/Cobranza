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
        // Schema::create('estadosCobranza', function (Blueprint $table) {
        //   $table->bigIncrements('id');
        //   $table->string('nombre');
        //   $table->timestamps();
        // });

        Schema::create('cobranzas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idDocumento');
            $table->string('estado');
            // $table->unsignedBigInteger('idEstado');
            $table->string('observacion');
            $table->foreign('idDocumento')->references('id')->on('documentos');
            // $table->foreign('idEstado')->references('id')->on('estadosCobranza');
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
        // Schema::dropIfExists('estadosCobranza');
    }
}

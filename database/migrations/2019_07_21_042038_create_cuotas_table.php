<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('numeroCuota');
            $table->unsignedBigInteger('idDocumento');
            $table->timestamp('fechaVencimiento');
            $table->integer('monto');
            $table->timestamp('fechaConciliacion')->default(null)->nullable();
            // $table->timestamp('fechaFacturacion')->default(false);
            $table->foreign('idDocumento')->references('id')->on('documentos');
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
        Schema::dropIfExists('cuotas');
    }
}

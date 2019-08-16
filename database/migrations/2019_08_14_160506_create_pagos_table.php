<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pagos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('monto')->default(0);
          $table->boolean('porConciliar')->default(false);
          $table->timestamp('fechaPago')->nullable()->default(null);
          $table->timestamp('fechaConciliacion')->nullable()->default(null);
          $table->unsignedBigInteger('idCobranza')->nullable()->default(null);
          $table->foreign('idCobranza')->references('id')->on('cobranzas');
          $table->timestamps();
        });

        Schema::create('pagosCuotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('monto')->default(0);
            $table->unsignedBigInteger('idPago');
            $table->foreign('idPago')->references('id')->on('pagos');
            $table->unsignedBigInteger('idCuota');
            $table->foreign('idCuota')->references('id')->on('cuotas');
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
        Schema::dropIfExists('pagosCuotas');
        Schema::dropIfExists('pagos');
    }
}

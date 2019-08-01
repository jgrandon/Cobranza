<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipo');
            $table->integer('folio');
            $table->timestamp('fechaEmision')->default(null)->nullable();
            $table->timestamp('fechaVencimiento')->default(null)->nullable();
            $table->integer('monto');
            $table->boolean('solicitarPdf');
            $table->unsignedBigInteger('idAcreedor');
            $table->unsignedBigInteger('idDeudor');
            $table->foreign('idAcreedor')->references('id')->on('empresas');
            $table->foreign('idDeudor')->references('id')->on('empresas');
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
        Schema::dropIfExists('documentos');
    }
}

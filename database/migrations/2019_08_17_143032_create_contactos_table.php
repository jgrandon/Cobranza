<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->default('');
            $table->string('cargo')->default('');
            $table->string('telefono')->default('');
            $table->string('email')->default('');
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
        Schema::dropIfExists('contactos');
    }
}

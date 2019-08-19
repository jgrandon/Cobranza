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

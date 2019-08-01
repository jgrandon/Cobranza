<?php

use Illuminate\Database\Seeder;

class EstadoCobranzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('documentos')->insert(['nombre' => 'Promesa de Pago']);
      DB::table('documentos')->insert(['nombre' => 'Otro']);
      DB::table('documentos')->insert(['nombre' => 'Pagado']);
      DB::table('documentos')->insert(['nombre' => 'Sin respuesta']);
    }
}

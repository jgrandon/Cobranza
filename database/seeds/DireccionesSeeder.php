<?php

use Illuminate\Database\Seeder;

class DireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('direcciones')->insert(['direccion' => 'Lo Errazuriz','numeracion'=>'2222','idComuna'=>1,'idDeudor'=>3, 'idAcreedor'=>1]);
    }
}

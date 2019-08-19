<?php

use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voi */
    public function run()
    {
        DB::table('empresas')->insert(['rut' => '12345678-9',
        'razonSocial' => 'Ripley',
        'paginaWeb' => 'ripley.cl']);
        DB::table('empresas')->insert(['rut' => '44444444-4',
        'razonSocial' => 'Lider',
        'paginaWeb' => 'lider.cl']);
        DB::table('empresas')->insert(['rut' => '6485350-3',
        'razonSocial' => 'Almacen don Pepe',
        'paginaWeb' => 'jota-apps.cl']);
    }
}

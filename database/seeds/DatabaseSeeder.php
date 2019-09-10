<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmpresasSeeder::class);
        $this->call(DocumentosSeeder::class);
        $this->call(ComunasSeeder::class);
        $this->call(ContactosSeeder::class);
        $this->call(DireccionesSeeder::class);
        $this->call(MediosPagoSeeder::class);
    }
}

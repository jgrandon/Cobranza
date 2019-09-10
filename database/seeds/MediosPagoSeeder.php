<?php

use Illuminate\Database\Seeder;

class MediosPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medios_pago')->insert(['nombre' => 'Transferencia']);
        DB::table('medios_pago')->insert(['nombre' => 'Efectivo']);
        DB::table('medios_pago')->insert(['nombre' => 'Cheque']);
    }
}

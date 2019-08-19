<?php

use Illuminate\Database\Seeder;

class ComunasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comunas')->insert(['nombre' => 'Cerrillos']);
        DB::table('comunas')->insert(['nombre' => 'Maipu']);
        DB::table('comunas')->insert(['nombre' => 'Puente Alto']);
        DB::table('comunas')->insert(['nombre' => 'Estacion Central']);
        DB::table('comunas')->insert(['nombre' => 'Santiago Centro']);
        DB::table('comunas')->insert(['nombre' => 'Ñuñoa']);
    }
}

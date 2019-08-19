<?php

use Illuminate\Database\Seeder;

class ContactosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contactos')->insert(['nombre' => 'José Grandon','cargo'=>'Administrador','telefono'=>'+562 2742 0182','email'=>'jose.grandon@gmail.com','idDeudor'=>3,'idAcreedor'=>1]);
    }
}

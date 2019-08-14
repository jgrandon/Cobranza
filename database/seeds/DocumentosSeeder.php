<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('documentos')->insert(['tipo' => '33',
        'folio' => '487'
        , 'fechaEmision' => Carbon::createFromDate(2019,7,1)
        , 'fechaVencimiento' => Carbon::createFromDate(2019,7,16)
        , 'monto' => 40000
        , 'idAcreedor' => 1
        , 'idDeudor' => 2
        ]);
        DB::table('cuotas')->insert([
          'idDocumento' => 1
          , 'fechaVencimiento' => Carbon::createFromDate(2019,7,16)
          , 'monto' => 20000
        ]);
        DB::table('cuotas')->insert([
          'idDocumento' => 1
          , 'fechaVencimiento' => Carbon::createFromDate(2019,8,16)
          , 'monto' => 20000
        ]);


        DB::table('documentos')->insert(['tipo' => '34',
        'folio' => 542345
        , 'fechaEmision' => Carbon::createFromDate(2019,1,8)
        , 'fechaVencimiento' => Carbon::createFromDate(2019,1,9)
        , 'monto' => 25999
        , 'idAcreedor' => 1
        , 'idDeudor' => 3
        ]);
        DB::table('cuotas')->insert([
          'idDocumento' => 2
          , 'fechaVencimiento' => Carbon::createFromDate(2019,1,9)
          , 'monto' => 25999
        ]);

        DB::table('documentos')->insert(['tipo' => '33',
        'folio' => '12'
        , 'fechaEmision' => Carbon::createFromDate(2019,15,1)
        , 'fechaVencimiento' => Carbon::createFromDate(2019,1,4)
        , 'monto' => 1599000
        , 'idAcreedor' => 3
        , 'idDeudor' => 1
        ]);
        DB::table('cuotas')->insert([
          'idDocumento' => 3
          , 'fechaVencimiento' => Carbon::createFromDate(2019,1,4)
          , 'monto' => 533000
        ]);
        DB::table('cuotas')->insert([
          'idDocumento' => 3
          , 'fechaVencimiento' => Carbon::createFromDate(2019,2,4)
          , 'monto' => 533000
        ]);
        DB::table('cuotas')->insert([
          'idDocumento' => 3
          , 'fechaVencimiento' => Carbon::createFromDate(2019,3,4)
          , 'monto' => 533000
        ]);


        DB::table('documentos')->insert(['tipo' => '33',
        'folio' => '666'
        , 'fechaEmision' => Carbon::createFromDate(2019,23,5)
        , 'fechaVencimiento' => Carbon::createFromDate(2019,1,7)
        , 'monto' => 190000
        , 'idAcreedor' => 3
        , 'idDeudor' => 2
        ]);
        DB::table('cuotas')->insert([
          'idDocumento' => 4
          , 'fechaVencimiento' => Carbon::createFromDate(2019,1,7)
          , 'monto' => 190000
        ]);


    }
}

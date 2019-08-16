<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class CobranzaController extends Controller
{
    public function verDeudores(){
      $deudores = App\Empresa::all();
      $deudas = [];
      foreach ($deudores as $d) {
        $acreedores = $d->getAcreedores();
        // var_dump($acreedores);
        // echo "<br><br>";
        foreach ($acreedores as $a) {
          // var_dump($a);
          // echo "a";
          if( $d->getTotalAdeudado($a->id)>0 ){
            $deudas[] = [
              'deudor' => $d
              , 'acreedor' => $a
            ];
          }
        }
      }
      // exit();
      return view('cobranza.listaDeudores',compact('deudas'));

      // $idsDeudores = DB::table('documentos')->rightJoin('cuotas','documentos.id','=','cuotas.idDocumento')->where('cuotas.fechaConciliacion',null)->pluck('idDeudor')->toArray();
      // $deudores = App\Empresa::whereIn('id',$idsDeudores)->get();
      // return view('cobranza.listaDeudores',compact('deudores'));


      // echo var_dump($deudores);
      // exit();
    }


    public function verCobranza($id){
      $deudor = App\Empresa::where('id',$id)->first();
      return view('cobranza.cobrar',compact($deudor));
    }
}

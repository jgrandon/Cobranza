<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class CobranzaController extends Controller
{
    public function verDeudores(){
      $idsDeudores = DB::table('documentos')->rightJoin('cuotas','documentos.id','=','cuotas.idDocumento')->where('cuotas.fechaConciliacion',null)->pluck('idDeudor')->toArray();
      $deudores = App\Empresa::whereIn('id',$idsDeudores)->get();
      return view('cobranza.listaDeudores',compact('deudores'));


      // echo var_dump($deudores);
      // exit();
    }


    public function verCobranza($id){
      $deudor = App\Empresa::where('id',$id)->first();
      return view('cobranza.cobrar',compact($deudor));
    }
}

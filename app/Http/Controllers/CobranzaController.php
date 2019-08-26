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


    public function verCobranza(Request $request){
      // var_dump($request->deudor);
      //
      // exit();
      $deudor = App\Empresa::where('id',$request->deudor)->first();
      $acreedor = App\Empresa::where('id',$request->acreedor)->first();
      return view('cobranza.cobrar',compact('deudor','acreedor'));
    }

    public function getOpcionCobranza(Request $request){
      $deudor = App\Empresa::where('id',$request->idDeudor)->first();
      $acreedor = App\Empresa::where('id',$request->idAcreedor)->first();
      $a = $request->accion;
      return view( 'cobranza.opcion.'.camel_case($request->accion),compact('deudor','acreedor') );
      // if( $a=='sin-respuesta' ){
      //   return view('cobranza.opcion.sinRespuesta');
      // }elseif( $a=='no-reconoce' ){
      //   return view('cobranza.opcion.noReconoce');
      // }elseif( $a=='compromiso' ){
      //   return view('cobranza.opcion.compromiso');
      // }elseif( $a=='pago-realizado' ){
      //   return view('cobranza.opcion.pagoRealizado');
      // }elseif( $a=='otro' ){
      //   return view('cobranza.opcion.sinRespuesta');
      // }
    }

    function finalizarCobranza(Request $request){
      $acreedor = App\Empresa::where('id',$request->idAcreedor)->first();
      $deudor = App\Empresa::where('id',$request->idDeudor)->first();
      if( $request->accion == 'sin-respuesta' ){
        if( !empty($request->confirmarContacto) ){
          $contactos = $deudor->getContactos($acreedor);
          foreach($contactos as $c){
            $c->solicitarConfirmacion = true;
            $c->save();
          }
        }
      }
      elseif( $request->accion == 'no-reconoce'){

      }else{
        return back();
      }
      $documentos = $deudor->getDocumentosAdeudados($acreedor->id);
      foreach ($documentos as $doc) {
        $cobranza = new Cobranza();
        $cobranza->estado = $request->accion;
        $cobranza->observacion = $request->observacion;
        $cobranza->idDocumento = $doc->id;
        $estado
      }
    }
}

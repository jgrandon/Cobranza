<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class CobranzaController extends Controller
{
    public function verDeudores($mensaje=null){
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
      return view('cobranza.listaDeudores',compact('deudas','mensaje'));

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
      $mediosPago = App\MedioPago::all();
      return view( 'cobranza.opcion.'.camel_case($request->accion),compact('deudor','acreedor','mediosPago') );
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
      // return $request;
      if( $request->estado == 'sin-respuesta' ){
        if( !empty($request->confirmarContacto) ){
          $contactos = $deudor->getContactos($acreedor);
          foreach($contactos as $c){
            $c->solicitarConfirmacion = true;
            $c->save();
          }
        }
      }
      elseif( $request->estado == 'no-reconoce'){
        if(!empty($request->pdf)){
          foreach($request->pdf as $idDoc){
            $documento = App\Documento::find($idDoc);
            $documento->solicitarPdf = true;
            $documento->save();
          }
        }
      } elseif( $request->estado == 'compromiso' ) {
        $request->observacion = "El cliente se compromete a pagar el {$request->fechaCompromiso} - {$request->observacion}";
        foreach ($request->cuotas as $c) {
          $cuota = App\Cuota::findOrFail($c);
          $compromiso = new App\CompromisoPago();
          $compromiso->idAcreedor = $request->idAcreedor;
          $compromiso->idDeudor = $request->idDeudor;
          $compromiso->idCuota = $cuota->id;
          $compromiso->save();
        }
      } elseif( $request->estado == 'pago-realizado') {
        $pago = 0;
      } else {
        echo 'tu mama es weona';
        exit();
        // return back();
      }
      // return $request;
      // var_dump($request->observacion);
      // exit();
      $documentos = $deudor->getDocumentosAdeudados($acreedor->id);
      foreach ($documentos as $doc) {
        $this->registrarCobranza($request,$doc);
      }

      return redirect('deudores')->with('mensaje','guardado');
    }




    function registrarCobranza($req /* Request */ ,$doc /* Documento */ ){
      $cobranza = new App\Cobranza();
      $cobranza->estado = $req->estado;
      $cobranza->observacion = $req->observacion==null ? "" : $req->observacion;
      $cobranza->idDocumento = $doc->id;
      $cobranza->estado = $req->estado;
      $cobranza->save();
    }

}

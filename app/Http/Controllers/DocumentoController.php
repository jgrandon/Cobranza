<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class DocumentoController extends Controller
{




    public function verDocumentos(){
        $user = Auth::user();
        $documentos = App\Documento::all();
        return view('listaDocumentos',compact('documentos'));
        //
        // if( $user ){
        //
        // }
    }


    public function verAgregarDocumento(){
        $etapa = 1;
        return view('crearDocumento',compact('etapa'));
    }

    public function validarFormlarioDocumento(Request $request){
      if( $request->etapa == 1){

      }
    }

    public function verDetalleDocumento(Request $request,$id){
      $documento = App\Documento::findOrFail($id);

      return response()->json([
        'error' => false,
        'modal' => view('documentos.detalle',compact('documento'))->render()
      ]);
    }

    // public function agregarDocumento(Request $request){
    //     if(){
    //
    //     }
    //     $d = new Documento();
    // }
}

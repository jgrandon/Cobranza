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

    public function agregarDocumento(Request $request){
        if(){

        }
        $d = new Documento();


    }
}

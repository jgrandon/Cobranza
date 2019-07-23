<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class CobranzaController extends Controller
{
    public function verDocumentos(){
        $user = Auth::user();
        $cobranzas = App/Cobranza::all();
        return view('listaDocumentos',compact('cobranzas'));
        //
        // if( $user ){
        //
        // }
    }
}

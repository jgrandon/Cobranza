<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CobranzaController extends Controller
{
    public function verDocumentos(){
        $user = Auth::user();

        return view('listaDocumentos');
        //
        // if( $user ){
        //
        // }
    }
}

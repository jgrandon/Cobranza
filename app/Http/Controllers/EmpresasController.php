<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function listarEmpresas(){
        $empresas = App\Empresa::all();
        return view( 'listaEmpresas',compact('empresas') );
    }


    public function agregarEmpresa(){
      return view('agregarEmpresa');
    }
}

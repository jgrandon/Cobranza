<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //

    /**
    ** ** FUNCIONES PARA DEUDOR ** **
    **/


    //Devuelve los documentos adeudados
    public function getDocumentosAdeudados($idAcreedor=null){
      $documentosAdeudados = [];
      $documentos = $idAcreedor==null
                            ? Documento::where('idDeudor',$this->id)->get()
                            : Documento::where('idDeudor',$this->id)->where('idAcreedor',$idAcreedor)->get();
      // $deudas = Cuota::whereIn('idDocumento',$documentosAdeudados)->get();
      foreach($documentos as $d){
        if($d->getMontoAdeudado()>0){
          $documentosAdeudados[] = $d;
        }
      }
      // echo "<pre>".var_dump($d)."</pre>";
      // exit();
      return $documentosAdeudados;
    }


    public function getFechaPrimeraCuota($idAcreedor=null){
      $documentosAdeudados = $idAcreedor==null
                            ? Documento::where('idDeudor',$this->id)->pluck('id')->toArray()
                            : Documento::where('idDeudor',$this->id)->where('idAcreedor',$idAcreedor)->pluck('id')->toArray();
      $primeraCuota = Cuota::whereIn('idDocumento',$documentosAdeudados)->where('fechaConciliacion',null)->orderBy('fechaVencimiento','asc')->first();
      return $primeraCuota!=null ? $primeraCuota->fechaVencimiento : '';
    }

    public function getAcreedores(){
      $deudas = $this->getDocumentosAdeudados();
      // echo "<pre>".var_dump($deudas)."</pre>";
      $acreedores = [];
      foreach ($deudas as $d) {
        $acreedores[] = Empresa::where('id',$d->idAcreedor)->first();
      }
      return $acreedores;
    }

    public function getTotalAdeudado($idAcreedor=null){
      $totalDeuda = 0;
      $deudas = $this->getDocumentosAdeudados($idAcreedor);
      $totalDeuda = 0;
      foreach ($deudas as $d) {
        $totalDeuda = $d->getMontoAdeudado();
      }
      return $totalDeuda;
    }


    /*
    ** Retorna las contactos asociadas a determinado acreedor
    */
    public function getContactos($acreedor=null){
        $contactos = $acreedor==null
                    ? Contacto::all()->get()
                    : Contacto::where('idAcreedor',$acreedor->id)->get();
        return $contactos;
    }


    /*
    ** Retorna las direcciones asociadas a determinado acreedor
    */
    public function getDirecciones($acreedor=null){
        $direcciones = $acreedor==null
                    ? Direccion::all()->get()
                    : Direccion::where('idAcreedor',$acreedor->id)->get();
        return $direcciones;
    }

}

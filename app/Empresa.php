<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //



    public function getDeudas(){
      $documentosAdeudados = Documento::where('idDeudor',$this->id)->pluck('id')->toArray();
      $deudas = Cuota::whereIn('idDocumento',$documentosAdeudados)->get();
      return $deudas;
    }

    public function getFechaPrimeraCuota(){
      $documentosAdeudados = Documento::where('idDeudor',$this->id)->pluck('id')->toArray();
      $primeraCuota = Cuota::whereIn('idDocumento',$documentosAdeudados)->where('fechaConciliacion',null)->orderBy('fechaVencimiento','asc')->first();
      return $primeraCuota->fechaVencimiento;
    }

    public function totalDeuda(){
      $totalDeuda = 0;
      $deudas = $this->getDeudas();
      foreach ($deudas as $d) {
        $totalDeuda += $d->monto;
      }
      return $totalDeuda;
    }
}

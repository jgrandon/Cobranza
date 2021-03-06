<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
    protected $dates = ['fechaEmision','fechaVencimiento'];


    public function estado(){
        // $cobranzas = Cobranza::where( 'idDocumento', $this->id )->get();
        // // return "<pre>".var_dump($cobranzas)."</pre>";
        // if( count($cobranzas)>0 ){
        //   return 'En Proceso';
        // }else{
        // }
        return 'Pendiente';
    }

    public function nombreDoc(){
      return $this->tipoDocumento==33 ? 'Factura Electronica' : 'Factura Exenta Electronica';
    }

    public function cuotas(){
      return Cuota::where('idDocumento',$this->id)->get();
    }

    public function cobranzas(){
      return Cobranza::where('idDocumento',$this->id)->get();
    }

    public function acreedor(){
        $acreedor = Empresa::where('id',$this->idAcreedor)->first();
        return $acreedor;
    }

    public function deudor(){
        $deudor = Empresa::where('id',$this->idDeudor)->first();
        return $deudor;
    }

    // public function estado(){
    //     return 'Pendiente';
    // }

    public function crearCuotas($nCuotas){
        for ($idCuota=1; $i <= $nCuotas; $i++) {
          $nc = new Cuota();
          $nc->idDocumento = $this->id;
          $nc->fechaVencimiento = $this->fechaVencimiento->addMonths($idCuota-1);
          $nc->monto = $this->monto/$nCuotas;
          $nc->save();
        }
    }

    /*
    ** Suma los montos de cuotas ya vencidas
    */
    public function getMontoAdeudado(){
      $cuotas = Cuota::where('idDocumento',$this->id)->get();
      $totalDeuda = 0;
      foreach($cuotas as $c){
        if( $c->isVencida()){
          $totalDeuda += $c->getMontoPendiente();
        }
      }
      return $totalDeuda;
    }


    public function getCuotasPendientes(){
      $cuotasPendientes = [];
      $cuotas = Cuota::where('idDocumento',$this->id)->get();
      foreach($cuotas as $c){
        if( $c->isVencida() && $c->getMontoPendiente()>0 ){
          $cuotasPendientes[] = $c;
        }
      }
      return $cuotasPendientes;
    }

}

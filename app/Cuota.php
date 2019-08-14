<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
use Illuminate\Support\Facades\DB;

class Cuota extends Model
{
    //
  public function cobranzas(){
    return Cuota::where('idDocumento',$this->id);
  }

  public function isVencida(){
    return $this->fechaVencimiento->lt( Carbon\Carbon::now() );
  }

  public function isPendiente(){
    $sumaPagos = DB::table('pagosCuotas')->where('idCuota',$this->id)->sum('monto');
    return $sumaPagos < $this->monto;
  }

  public function getMontoPendiente(){
    return $this->monto - DB::table('pagosCuotas')->where('idCuota',$this->id)->sum('monto');
  }

  protected $dates = ['fechaConciliacion','fechaVencimiento'];
}

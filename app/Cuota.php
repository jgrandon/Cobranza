<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
class Cuota extends Model
{
    //
  public function cobranzas(){
    return Cuota::where('idDocumento',$this->id);
  }

  public function isVencida(){
    return $this->fechaVencimiento->lt( Carbon\Carbon::now() );
  }

  protected $dates = ['fechaConciliacion','fechaVencimiento'];
}

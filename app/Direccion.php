<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Direccion extends Model
{
  protected $table = 'direcciones';

    public function nombreComuna(){
      return DB::table('comunas')->where('id',$this->idComuna)->pluck('nombre')[0];
    }
}

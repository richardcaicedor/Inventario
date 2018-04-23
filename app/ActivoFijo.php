<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivoFijo extends Model
{
    use SoftDeletes;

    protected $table ='activos_fijos';

    protected $fillable = ['tipoequipo_id','observacion','arearesponsable','codigobarra','marca','modelo','ordencompra','fechacompra','estado','costo'];  
 
    protected $dates = ['deleted_at'];

    public function tipoEquipo(){
    	return $this->belongsTo('App\TipoEquipo','tipoequipo_id'); 
    }

}

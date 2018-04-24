<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insumo extends Model 
{
    use SoftDeletes;

    protected $table ='insumos';

    protected $fillable = ['tipoinsumo_id','descripcion','observacion','cantidad','estado'];  
 
    protected $dates = ['deleted_at'];

    public function tipoInsumo(){
    	return $this->belongsTo('App\TipoInsumo','tipoinsumo_id'); 
    }

    public function solicitud(){
    	return $this->hasMany('App\Solicitud');
    }
}

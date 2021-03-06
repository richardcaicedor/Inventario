<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEquipo extends Model
{

	use SoftDeletes;

    protected $table ='tipos_equipos';

    protected $fillable = ['descripcion','observacion'];  

    protected $dates = ['deleted_at'];

    public function equipos(){
    	return $this->hasMany('App\ActivoFijo');
    }
    
}

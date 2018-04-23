<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoInsumo extends Model
{
    use SoftDeletes;
 
    protected $table ='tipos_insumos';

    protected $fillable = ['descripcion','observacion'];  

    protected $dates = ['deleted_at'];

    public function insumo(){
    	return $this->hasMany('App\Insumo');
    }
}

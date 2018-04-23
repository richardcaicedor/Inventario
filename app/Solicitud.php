<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table ='solicitudes';

    protected $fillable = ['insumo_id','user_id','observacion','solicitante','cantidad'];  

    protected $dates = ['created_at','updated_at'];

}

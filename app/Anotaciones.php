<?php

namespace App;

use Facade\FlareClient\Http\Client;
use Illuminate\Database\Eloquent\Model;

class Anotaciones extends Model
{
    public function user()
    {
        return $this->belongsTo(Clientes::class,'id_anotaciones');
    }
}

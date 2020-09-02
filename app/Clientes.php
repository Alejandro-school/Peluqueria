<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{

    public function Anotaciones()
    {

        return $this->hasMany(Anotaciones::class, 'id_cliente');
    }

    //Scope

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('Nombre', 'Like', "%$name%");
        }
    }


    public function scopePhone($query, $phone)
    {
        if ($phone) {
            return $query->where('Telefono', 'Like', "%$phone%");
        }
    }
}

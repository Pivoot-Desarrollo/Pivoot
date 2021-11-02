<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    public $timestamps = false;

    //permitir carga masiva de datos:
    protected $guarded =[ ];


public function rol()
    {
        return $this->belongsTo('App\Models\Rol', 'idRolFK');
    }
}

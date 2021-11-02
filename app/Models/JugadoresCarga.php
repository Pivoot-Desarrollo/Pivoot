<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JugadoresCarga extends Model
{
    protected $table = "Jugador";
    protected $primaryKey = "idJugador";
    public $timestamps = false;


     //permitir carga masiva de datos:
     protected $guarded =[ ];
}

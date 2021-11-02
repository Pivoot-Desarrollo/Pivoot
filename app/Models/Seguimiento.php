<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = "seguimiento";
    protected $primaryKey = "idSeguimiento";
    public $timestamps = false;

    public function jugador()
    {
        return $this->belongsTo('App\Models\Jugadores', 'idJugadorFK');
    }


    public function actividad()
    {
        return $this->belongsTo('App\Models\Actividad', 'idActividadFK');
    }

    public function test()
    {
        return $this->belongsTo('App\Models\Test', 'idTestFK');
    }

    public function entrenador()
    {
        return $this->belongsTo('App\Models\Entrenadores', 'idEntrenadorFK');
    }
}

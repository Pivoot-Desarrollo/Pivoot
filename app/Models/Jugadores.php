<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadores extends Model
{
    protected $table = "Jugador";
    protected $primaryKey = "idJugador";
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'idUsuarioFK');
    }

    public function acudiente()
    {
        return $this->belongsTo('App\Models\Acudiente', 'idAcudienteFK');
    }

    
}

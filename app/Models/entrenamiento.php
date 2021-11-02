<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrenamiento extends Model
{
    protected $table = "Entrenamiento";
    protected $primaryKey = "idEntrenamiento";
    public $timestamps = false;


    public function TipoEntrenamiento()
    {
        return $this->belongsTo('App\Models\Tipo_entrenamiento', 'idTipoEntrenamientoFK');
    }

    public function entrenador()
    {
        return $this->belongsTo('App\Models\Entrenadores', 'idEntrenadorFK');
    }

    public function grupo()
    {
        return $this->belongsTo('App\Models\Grupo', 'idGrupoFK');
    }
}


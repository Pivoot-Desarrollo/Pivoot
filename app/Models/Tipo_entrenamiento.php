<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_entrenamiento extends Model
{
    protected $table = "tipo_entrenamiento";
    protected $primaryKey = "idTipoEntrenamiento";
    public $timestamps = false;
}

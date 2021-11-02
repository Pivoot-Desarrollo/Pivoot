<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    protected $table = "entrenador";
    protected $primaryKey = "idEntrenador";
    public $timestamps = false;


    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'idUsuarioFK');
    }
}

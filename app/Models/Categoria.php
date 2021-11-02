<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categoria";
    protected $primaryKey = "idCategoria";
    public $timestamps = false;

    public function rol()
    {
        return $this->belongsTo('App\Models\Rol', 'idRolFK');
    }
}
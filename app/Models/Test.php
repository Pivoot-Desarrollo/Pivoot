<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = "test";
    protected $primaryKey = "idTest";
    public $timestamps = false;

    public function Categoria()
    {
        return $this->belongsTo('App\Models\Categoria', 'idCategoriaFK');
    }

    public function TipoTest()
    {
        return $this->belongsTo('App\Models\TipoTest', 'idTipoTestFK');
    }
}

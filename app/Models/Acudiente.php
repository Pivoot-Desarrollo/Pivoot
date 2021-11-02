<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
    protected $table = "Acudiente";
    protected $primaryKey = "idAcudiente";
    public $timestamps = false;
}

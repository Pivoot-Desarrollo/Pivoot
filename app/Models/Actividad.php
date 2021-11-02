<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = "Actividad";
    protected $primaryKey = "idActividad";
    public $timestamps = false;
}

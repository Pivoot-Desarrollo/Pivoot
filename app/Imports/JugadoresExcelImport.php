<?php

namespace App\Imports;


use App\Models\JugadoresCarga;
use Carbon\Carbon as CarbonCarbon; //para fechas
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow};

class JugadoresExcelImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JugadoresCarga([
            'idJugador' => $row["id"],
            'idUsuarioFK' =>$row["usuario"],
            'idAcudienteFK' =>$row["acudiente"],
            'nombreJugador' => $row["nombre"],
            'apellidoJugador' => $row["apellido"],
            'direccionJugador' =>$row["direccion"],
            'fechaNacimiento' =>CarbonCarbon::parse ($row["fecha"]),
            'docJugador' => $row["doc"],
            'telJugador' => $row["tel"],
            'habilitado' => $row["habilitado"],


        ]);
    }
}

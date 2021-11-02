<?php
//Maatwebsite paquete de Larevl usado para importar y exportar datos desde excel.

namespace App\Imports;

use App\Models\Users;
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow};

class UsersExcelImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Users([
            'id' => $row["id"],
            'name' => $row["name"],
            'email' => $row["email"],
            'email_verified_at' => $row["email_verified_at"],
            'password' =>bcrypt($row["password"]),
            'remember_token' => $row["remember_token"],
            'created_at' => $row["created_at"],
            'updated_at' => $row["updated_at"],
            'estado' => $row["estado"],
            'idRolFK' => $row["rol"],
            'habilitado' => $row["habilitado"],


        ]);
    }
}

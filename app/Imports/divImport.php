<?php

namespace App\Imports;

use App\Models\Dividido;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class divImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //separando la fecha y la hora
        $fecha = substr($row['tiempo'],0, 10);
        $hora = substr($row['tiempo'],11,5);




        return new Dividido([
            "nombre_completo" => $row["nombre"],
            "fecha" => $fecha,
            "hora" => $hora,
            "id_trabajador" => $row["id"],
            "estado" => $row["terminal"],
            "terminal" => $row["terminal"],



        ]);
    }
}

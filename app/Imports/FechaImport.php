<?php

namespace App\Imports;

use App\Models\Fechas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FechaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $fecha = substr($row['tiempo'],0, 10);
        



        return new Fechas([
            "fecha" => $fecha,
            "id_trabajador" => $row["id"],
        ]);
    }
}

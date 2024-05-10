<?php

namespace App\Imports;

use App\Models\Cargar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CargarImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cargar([
            'tiempo' =>$row['tiempo'],
            'nombre' =>$row['nombre'],
            'id_trabajador' => $row['id'],
            'codigo_pago' => $row['codigo'],
            'estado_trabajo' => $row['estado'],
            'nombre_terminal' => $row['terminal']
        ]);
    }
}

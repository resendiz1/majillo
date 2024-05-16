<?php

namespace App\Imports;

use App\Models\Horas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HoraImport implements ToModel , WithHeadingRow    
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $hora = substr($row['tiempo'],11,5);
        $fecha = substr($row['tiempo'],0, 10);


        return new Horas([
            'hora' => $hora,
            'fecha' => $fecha,
            'id_trabajador' => $row['id'],
        ]);
    }
}

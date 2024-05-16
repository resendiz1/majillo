<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\Cargar;
use App\Imports\divImport;
use App\Imports\HoraImport;
use App\Imports\FechaImport;
use Illuminate\Http\Request;

use App\Imports\CargarImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;

class cargarController extends Controller
{


    public function inicio(){

        $trabajadores = DB::select('SELECT DISTINCT nombre_completo, id_trabajador FROM divididos ');
        return view('inicio', compact('trabajadores'));

    }
    public function cargar_excel(Request $request){
   
        $file = $request->file('excel');
        
        Excel::import(new CargarImport, $file);
        Excel::import(new divImport, $file);
        Excel::import(new FechaImport, $file);
        Excel::import(new HoraImport, $file );
        
        return redirect()->back()->with(['success'=> 'El archivo se cargo conn exito!']);
    }



    public function detalle_trabajador($trabajador){

        $horas=[];

        $trabajador_detalle = DB::select("SELECT*FROM divididos WHERE id_trabajador LIKE $trabajador");
        
        $dias_trabajados = DB::select("SELECT DISTINCT fecha FROM divididos WHERE id_trabajador LIKE $trabajador");

                


        return view('perfil_trabajador', compact('trabajador_detalle', 'dias_trabajados', 'horas'));
    }


    public function horas_trabajadas($id_trabajador, $fecha){

        $fecha_decod = Crypt::decryptString($fecha);


        //TODO ESTE CODIGO VA A SER PARA EL PERSONAL CON HORARIO ADMINISTRATIVO

        //obteniendo solo las horas
        $horas = DB::select("SELECT*FROM divididos WHERE id_trabajador LIKE $id_trabajador AND fecha LIKE '$fecha_decod'");

        //obteniendo la entrada
        $entrada = DB::select("SELECT MIN(hora) AS hora_entrada FROM divididos WHERE id_trabajador LIKE $id_trabajador AND fecha LIKE '$fecha_decod'");

        //obteniendo la hora de salida
        $salida = DB::select("SELECT MAX(hora) AS hora_salida FROM divididos WHERE id_trabajador LIKE $id_trabajador AND fecha LIKE '$fecha_decod'");

        //obteniendo las hora trabajadas
        $hora_entrada = new DateTime($entrada[0]->hora_entrada);
        $hora_salida = new DateTime($salida[0]->hora_salida);

        //sacando la diferencia de las dos horas comparadas
        $horas_trabajadas = $hora_entrada->diff($hora_salida);

        //formateando las horas obtenidas para saber cuantas checadas estan entra la entrada y la salida
        $hora_entrada_formateado = $hora_entrada->format("H:m"); 
        $hora_salida_formateado = $hora_salida->format("H:m");

        //comparando la entrada para saber si hay retardo, lo hago aqui para que la vista se pueda usar con todos los turnos
        $retardo = 'Sin retardo';

        if($entrada[0]->hora_entrada > '08:10'){
            $retardo = 'Retardo';
        }


        //de las horas que estan entre la entrada y la salida debo tomar la primer hora despues de la entrada y compararla, si esta a una hora o menos de distancia entonces se procede a tomar la hora siguiente y asi hasta encontrar una que este mas alla de la hora, encontrando esa hora entonces la tomamos como inicio de hora de comida, y empezamos a tomar fechas al reves, esta vez tomamos como referencia la hora de salida y realizamos la comprobacion, si la hora tomara una checada antes de la salida esta a menos de una hora de distancia de la salida, entonces la descartamos y vamos por la siguiente.

        //con eso sacamos la hora de entrada y salida de comida del horario administrativo


        //obteniendo las checadas que entan dentro de la checada de inicio y la checada de fin
         $checadas_dia = DB::select("SELECT hora FROM divididos WHERE id_trabajador LIKE $id_trabajador AND fecha LIKE '$fecha_decod' AND hora BETWEEN '$hora_entrada_formateado' AND '$hora_salida_formateado' ");

   
        //TODO ESTE CODIGO VA A SER PARA EL PERSONAL CON HORARIO ADMINISTRATIVO




        return view("horas_trabajadas", compact("horas", "entrada", "salida", "horas_trabajadas", "retardo"));
    }



}

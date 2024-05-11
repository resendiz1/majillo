<?php

namespace App\Http\Controllers;
use App\Imports\divImport;
use App\Models\Cargar;
use Illuminate\Http\Request;
use App\Imports\CargarImport;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
        return redirect()->back()->with(['success'=> 'El archivo se cargo conn exito!']);
    }



    public function detalle_trabajador($trabajador){

        $trabajador_detalle = DB::select("SELECT*FROM divididos WHERE id_trabajador LIKE $trabajador");

        //hacer un ciclo con cada dia para saber las checadas de ese dia
        for($i=0; $i<count($trabajador_detalle); $i++){
            
        }

        return view('perfil_trabajador', compact('trabajador_detalle'));
    }



}

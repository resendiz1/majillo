<?php

namespace App\Http\Controllers;
use App\Models\Cargar;
use Illuminate\Http\Request;
use App\Imports\CargarImport;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class cargarController extends Controller
{


    public function inicio(){

        $trabajadores = DB::select('SELECT DISTINCT nombre FROM excel ');
        return view('inicio', compact('trabajadores'));

    }
    public function cargar_excel(Request $request){
   
        $file = $request->file('excel');
        Excel::import(new CargarImport, $file);

        return redirect()->back()->with(['success'=> 'El archivo se cargo conn exito!']);
    }



}

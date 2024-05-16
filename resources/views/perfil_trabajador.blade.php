@php
use Illuminate\Support\Facades\Crypt;
    
@endphp
@extends('plantilla')
@section('contenido')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h1>{{$trabajador_detalle[0]->nombre_completo}}</h1>
            <h3>Dias trabajados: {{count($dias_trabajados)}}</h3>
        </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        @forelse ($dias_trabajados as $dia)
            <div class="col-3 m-3 border text-center">
                <div class="row">
                    <div class="col-12">
                        @php
                            $fecha = Crypt::encryptString($dia->fecha);
                        @endphp
                        <a href="{{route('horas.trabajadas',['id_trabajador' => $trabajador_detalle[0]->id_trabajador, 'fecha' => $fecha])}}">
                            {{$dia->fecha}}
                        </a>
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse


    </div>
</div>


@forelse ($horas as $hora)
    <h5>{{var_dump($hora[1]->hora)}}</h5>
@empty
    
@endforelse



@endsection
@extends('plantilla')
@section('contenido')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h1>{{$trabajador_detalle[0]->nombre_completo}}</h1>
        </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        @forelse ($trabajador_detalle as $trabajador)
            <div class="col-3 m-3 border text-center">
                <div class="row">
                    <div class="col-12">
                        {{$trabajador->fecha}}
                    </div>
                    <div class="col-12">
                        {{$trabajador->hora}}
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse


    </div>
</div>



@endsection
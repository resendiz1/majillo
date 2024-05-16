@php
    use Carbon\Carbon;
@endphp
@extends('plantilla')
@section('contenido')

    <div class="container">
        <div class="row mt-3">
            <div class="col-12 text-center mt-3">
                <h1>{{$horas[0]->nombre_completo}}</h1>
            </div>
            <div class="col-12 text-center mt-3">
                <h4>
                    @php
                        $fechaCarbon = Carbon::createFromFormat('d/m/Y',$horas[0]->fecha)->locale('es');
                        $fechaFormateada = $fechaCarbon->formatLocalized("%A %d de %B de %Y");
                    @endphp
                    {{$fechaFormateada}}

                </h4>
            </div>
        </div>
        <div class="row justify-content-center mt-4">

            @forelse ($horas as $hora)
                <div class="col-1 p-3 bg-white shadow shadow-sm text-center border">
                    <h5 class="fw-bold">{{$hora->hora}}</h5>
                </div>
            @empty
                
            @endforelse

        </div>
    </div>



    <div class="container-fluid mt-5 p-2 border">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 text-center p-4 h5">
                Entrada: <br> {{$entrada[0]->hora_entrada}} <br>
                {{$retardo}}
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 text-center p-4 h5">
                Salida: <br> {{$salida[0]->hora_salida}}
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 text-center p-4 h5">
                Horas Trabajadas: <br> {{$horas_trabajadas->format("%h horas, %i minutos")}}
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 text-center p-4 h5">
                Checadas: <br> {{count($horas)}}
            </div>
        </div>
    </div>



@endsection
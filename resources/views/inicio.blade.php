@extends('plantilla')
@section('contenido')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <small class="text-success">{{session('success')}}</small>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-4 text-center">
            <form action="{{route('cargar.excel')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="excel" class="form-control ">
                <button class="btn btn-success mt-3">Agregar</button>
            </form>
        </div>
    </div>

</div>


<div class="container">
    <div class="row">
        @forelse ($trabajadores as $trabajador)   
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <h4>{{$trabajador->nombre}}</h4>
                </div>                
            </div>
        </div>
        @empty
        <li>No hay registros cargados</li>
        @endforelse
    </div>
</div>

@endsection
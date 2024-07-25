@extends('layout')

@section('title', 'Servicio |' . $servicio->titulo)

@section('content')
<style>
    .hola{
        column-count:2;
    }
</style>
<div class="container" style="justify-content:center; display:flex;">
@auth
    <div class="card" style="width: 18rem; text-align:center;">
        <img src="/storage/{{ $servicio->image}}" class="card-img-top" alt="{{ $servicio->titulo}}">
        <div class="card-body">
            <h5 class="card-title">{{$servicio->titulo}}</h5>
            <p class="card-text">{{$servicio->descripcion}}</p>
            <div class="hola">
                <a href="{{route('servicios.edit', $servicio)}}" class="btn btn-primary">Editar</a>
                <form action="{{route('servicios.destroy', $servicio)}}" method="post">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Eliminar</button>
                </form>
            </div>
            
        </div>
    </div>
@endauth
</div>

@endsection
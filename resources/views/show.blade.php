@extends('layout')

@section('title', 'Servicio |' . $servicio->titulo)

@section('content')

<table cellpadding="3" cellspacing="5" class="table table-bordered" style="display:flex;">
    @auth
    <tr>
        <th>Titulo: </th>
        <td colspan="4">{{$servicio->titulo}} </td>
        
    </tr>

    <tr>
        <th>Descripcion: </th>
        <td colspan="4">{{$servicio->descripcion}}</td>
    </tr>

    <tr>
        <td><a href="{{route('servicios.edit', $servicio)}}">Editar</a></td>
        <td colspan="2">
            <form action="{{route('servicios.destroy', $servicio)}}" method="post">
                @csrf @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </td>
    </tr>
    @endauth   
</table>
@endsection
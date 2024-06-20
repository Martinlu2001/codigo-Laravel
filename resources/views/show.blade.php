@extends('layout')

@section('title', 'Servicio |' . $servicio->titulo)

@section('content')

<tr>
    <td colspan="4">{{$servicio->titulo}} </td>
    <a href="{{route('servicios.edit', $servicio)}}">Editar</a>
    <td colspan="2">
        <form action="{{route('servicios.destroy', $servicio)}}" method="post">
            @csrf @method('DELETE')
            <button>Eliminar</button>
        </form>

    </td>
</tr>
<br>
<tr>
    <td colspan="4">{{$servicio->descripcion}}</td>
</tr>
<br>

@endsection
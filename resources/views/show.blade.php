@extends('layout')

@section('title', 'Servicio |' . $servicio->titulo)

@section('content')

<tr>
    <td colspan="4">{{$servicio->titulo}} </td>
</tr>
<br>
<tr>
    <td colspan="4">{{$servicio->descripcion}}</td>
</tr>
<br>
<tr>
    <td colspan="4">{{$servicio->created_at}}</td>
</tr>
@endsection
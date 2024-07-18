@extends('layout')

@section('title', 'Servicio')

@section('content')

<table class="table table-bordered" style="display:flex;">
    <tr>
        @auth
        <td colspan="4">
            <a href="{{route('servicios.create')}}"> + Nuevo servicio</a>
        </td>
        @endauth
    </tr>
</table>

<h2 style="text-align:center;">Listado de servicios</h2>

<table class="table table-bordered" style="display:flex;">
        <tr>
            @if($servicios)
                @foreach($servicios as $servicio)
                    <td><a href="{{ route('servicios.show',$servicio)}}">{{$servicio->titulo}}</a></td>                   
                @endforeach
            @else
                <li>No existe ningun servicio que mostrar</li>
            @endif
        </tr>

        <tr>
            <td colspan="4">{{$servicios->links('pagination::bootstrap-5')}}</td>
        </tr>
</table>
@endsection
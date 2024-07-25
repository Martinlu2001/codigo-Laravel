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
        
            @if($servicios)
                @foreach($servicios as $servicio)
                <tr>
                    <td>
                        @if($servicio->image)
                            <img src="/storage/{{ $servicio->image}}" alt="{{$servicio->titulo}}" width="50" height="50">
                        @endif
                    </td>
                    
                    <td>
                        <a href="{{ route('servicios.show',$servicio)}}">{{$servicio->titulo}}</a>
                    </td>                   
                @endforeach
                </tr>
            @else
                <li>No existe ningun servicio que mostrar</li>
            @endif
        

        <tr>
            <td colspan="4">{{$servicios->links('pagination::bootstrap-5')}}</td>
        </tr>
</table>
@endsection
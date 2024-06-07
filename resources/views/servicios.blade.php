@extends('layout')

@section('title', 'Servicio')

@section('content')

<style>
    .tablaservicios{
        justify-content: center;
        display:flex;
    }

    .linke-link {
        font-size: 10rem; /* Ajusta el tamaño de la paginación */
        padding: 10rem 10rem;
        color:green; 
    }

    /* .linke {
        padding: 0.5rem 0.75rem; 
    } */

</style>
<table class="tablaservicios">
    
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
            <td colspan="4" class="linke">{{$servicios->links()}}</td>
        </tr>
</table>


        
@endsection
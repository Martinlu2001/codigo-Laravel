@extends('layout')

@section('title', 'Editar Servicio')

@section('content')

<table cellpading="3" cellspacing="5" class="table table-bordered" style="display:flex;">
    @auth
    <tr>
        <th colspan="4">Editar Servicio</th>
    </tr>
    <tr>
        <td style="justify-content:center; display:flex;"><img  src="/storage/{{ $servicio->image}}" alt="{{ $servicio->titulo}}" width="50" height="50"></td>
    </tr>
    @endauth
   
    @include('partials.validations-errors')
    <form action="{{route('servicios.update', $servicio)}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @include('partials.form', ['btnText'=> 'Actualizar'])
    </form>
</table>

@endsection
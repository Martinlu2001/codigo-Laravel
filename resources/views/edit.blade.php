@extends('layout')

@section('title', 'Editar Servicio')

@section('content')

<table cellpading="3" cellspacing="5" class="table table-bordered" style="display:flex;">
    @auth
    <tr>
        <th colspan="4">Editar Servicio</th>
    </tr>
    @endauth
   
    @include('partials.validations-errors')
    <form action="{{route('servicios.update', $servicio)}}" method="post">
        @method('PATCH')
        @include('partials.form', ['btnText'=> 'Actualizar'])
    </form>
</table>

@endsection
@extends('layout')

@section('title', 'Editar Servicio')

@section('content')

<table cellpading="3" cellspacing="5">
    <tr>
        <th colspan="4">Editar Servicio</th>
    </tr>
   
    @include('partials.validations-errors')
    <form action="{{route('servicios.update', $servicio)}}" method="post">
        @method('PATCH')
        @include('partials.form', ['btnText'=> 'Actualizar'])
    </form>
</table>


@endsection
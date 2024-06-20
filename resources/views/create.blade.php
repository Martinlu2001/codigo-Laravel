@extends('layout')

@section('title', 'Crear Servicio')

@section('content')

<h1>El campo titulo es obligatorio</h1>
<h1>El campo descripcion es obligatorio</h1>
<table cellpadding="3" cellspaceing="5">

    <tr>
        <th colspan="4">Crear nuevo servicio</th>
    </tr>
    @include('partials.validations-errors')
    <form action="{{route('servicios.store')}}" method="post">
        @include('partials.form', ['btnText'=> 'Guardar'])
    </form>
</table>
@endsection
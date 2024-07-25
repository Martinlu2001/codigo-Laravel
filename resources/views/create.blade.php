@extends('layout')

@section('title', 'Crear Servicio')

@section('content')

<table cellpadding="3" cellspacing="5" class="table table-bordered" style="display:flex;">
    <tr>
        <th colspan="4">Crear nuevo servicio</th>
    </tr>
    @include('partials.validations-errors')
    <form action="{{route('servicios.store')}}" method="post" enctype="multipart/form-data">
        @include('partials.form', ['btnText'=> 'Guardar'])
    </form>
</table>
@endsection
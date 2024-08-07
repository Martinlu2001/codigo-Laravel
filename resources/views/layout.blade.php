<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
    <style>
        .activo a{
            color:red !important;
            text-decoration:none;
        }
        a{
            color:blue !important;
            text-decoration:none;
        }
        .table{
            justify-content: center;
            text-align:center;
        }
    </style>
</head>
<body>
    <nav>
        <!-- {{dump(request()->routeIs('home'))}} -->
        <table class="table">
            <!-- <thead class="table table-bordered">
                <tr> -->
                    <!-- <th scope="col" class="activo"><a href="/">Home</a></th>
                    <th scope="col" class="activo1"><a href="nosotros">Nosotros</a></th>
                    <th scope="col" class="activo1"><a href="servicios">Servicios</a></th>
                    <th scope="col" class="activo1"><a href="contacto">Contactos</a></th> -->

                    <!-- <th scope="col" class="{{request()->routeIs('home') ? 'activo' : ''}}"><a href="/">Home</a></th>
                    <th scope="col" class="{{request()->routeIs('nosotros') ? 'activo' : ''}}"><a href="nosotros">Nosotros</a></th>
                    <th scope="col" class="{{request()->routeIs('servicios') ? 'activo' : ''}}"><a href="servicios">Servicios</a></th>
                    <th scope="col" class="{{request()->routeIs('contacto') ? 'activo' : ''}}"><a href="contacto">Contactos</a></th> -->
                    
                    <!-- <th scope="col" class="{{ setActivo('home') }}"><a href="/">Home</a></th>
                    <th scope="col" class="{{ setActivo('nosotros') }}"><a href="nosotros">Nosotros</a></th>
                    <th scope="col" class="{{ setActivo('servicios') }}"><a href="servicios">Servicios</a></th>
                    <th scope="col" class="{{ setActivo('contacto') }}"><a href="contacto">Contactos</a></th> -->
                <!-- </tr>
            </thead> -->
            @include('partials.nav')
            
        </table>
        <!-- <ul>
            <li><a href="/">Home</a></li>
            <li><a href="nosotros">Nosotros</a></li>
            <li><a href="servicios">Servicios</a></li>
            <li><a href="contacto">Contactos</a></li>
        </ul> -->
    </nav>
    @include('partials.sesion-estado')
    @yield('content')
</body>
</html>
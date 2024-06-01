<?php

    function setActivo($ruta){
        return request()->routeIs($ruta) ? 'activo' : '';
    }
//cambio de cadena a variable
?>
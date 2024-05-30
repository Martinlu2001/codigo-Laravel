<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

$servicios = [
    /*['titulo' => 'Servicio 01'],
    ['titulo' => 'Servicio 02'],
    ['titulo' => 'Servicio 03'],
    ['titulo' => 'Servicio 04'],
    ['titulo' => 'Servicio 05'],*/
];

Route::view('/','home')->name('home');
Route::view('nosotros','nosotros')->name('nosotros');
//Route::get('servicios','App\Http\Controllers\ServiciosController@servicios')->name('servicios');
//Route::get('servicios', 'App\Http\Controllers\Servicios2Controller@index')->name('servicios');
/*Route::get('servicios/create', 'App\Http\Controllers\Servicios2Controller@create')->name('servicios');
Route::get('servicios', 'App\Http\Controllers\Servicios2Controller@store')->name('servicios');
Route::get('servicios/{servicio}', 'App\Http\Controllers\Servicios2Controller@show')->name('servicios');
Route::get('servicios/{servicio}/edit', 'App\Http\Controllers\Servicios2Controller@edit')->name('servicios');
Route::get('servicios/{servicio}', 'App\Http\Controllers\Servicios2Controller@update')->name('servicios');
Route::get('servicios/{servicio}', 'App\Http\Controllers\Servicios2Controller@destroy')->name('servicios');
*/
Route::resource('servicios', 'App\Http\Controllers\Servicios2Controller');
//Route::resource('servicios','App\Http\Controllers\Servicios2Controller')->only('index','show');
//Route::resource('servicios','App\Http\Controllers\Servicios2Controller')->except('index','show');

//Route::view('servicios','servicios', compact('servicios'))->name('servicios');
Route::view('contacto','contacto')->name('contacto');

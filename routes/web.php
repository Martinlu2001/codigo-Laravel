<?php

use Illuminate\Support\Facades\Route;

Route::view('/','home')->name('home');
Route::view('nosotros','nosotros')->name('nosotros');

Route::resource('servicios','App\Http\Controllers\Servicios2Controller')->names('servicios')->middleware('auth');
Route::get('categorias/{category}', 'App\Http\Controllers\CategoryController@show')->name('categories.show');
/*
Route::get('servicios', 'App\Http\Controllers\Servicios2Controller@index')->name('servicios.index');
Route::get('servicios/crear', 'App\Http\Controllers\Servicios2Controller@create')->name('servicios.create');
Route::get('servicios/{id}/editar', 'App\Http\Controllers\Servicios2Controller@edit')->name('servicios.edit');
Route::patch('servicios/{id}', 'App\Http\Controllers\Servicios2Controller@update')->name('servicios.update');
Route::post('servicios', 'App\Http\Controllers\Servicios2Controller@store')->name('servicios.store');
Route::get('servicios/{id}', 'App\Http\Controllers\Servicios2Controller@show')->name('servicios.show');
Route::delete('servicios/{servicio}', 'App\Http\Controllers\Servicios2Controller@destroy')->name('servicios.destroy');
*/






/*Route::get('servicios/create', 'App\Http\Controllers\Servicios2Controller@create')->name('servicios');
Route::get('servicios', 'App\Http\Controllers\Servicios2Controller@store')->name('servicios');
Route::get('servicios/{servicio}', 'App\Http\Controllers\Servicios2Controller@show')->name('servicios');
Route::get('servicios/{servicio}/edit', 'App\Http\Controllers\Servicios2Controller@edit')->name('servicios');
Route::get('servicios/{servicio}', 'App\Http\Controllers\Servicios2Controller@update')->name('servicios');
Route::get('servicios/{servicio}', 'App\Http\Controllers\Servicios2Controller@destroy')->name('servicios');
*/
//Route::resource('servicios', 'App\Http\Controllers\Servicios2Controller');
//Route::resource('servicios','App\Http\Controllers\Servicios2Controller')->only('index','show');
//Route::resource('servicios','App\Http\Controllers\Servicios2Controller')->except('index','show');

//Route::view('servicios','servicios', compact('servicios'))->name('servicios');
Route::view('contacto','contacto')->name('contacto');
Route::post('contacto', 'App\Http\Controllers\ContactoController@store');


Auth::routes(['register' => false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

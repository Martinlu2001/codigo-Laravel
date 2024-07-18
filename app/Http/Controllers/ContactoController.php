<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Mail;
use App\Mail\MensajeRecibido;

class ContactoController extends Controller
{
    public function store()
    {
        $mensaje = request()->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'asunto' => 'required',
            'mensaje' => 'required|min:3',
        ],[
            'nombre.required' => 'Ingresa tu nombre',
            'email.required' => 'Ingresa tu correo',
            'asunto.required' => 'Ingresa un asunto',
            'mensaje.required' => 'Ingresa el mensaje',
        ]);
        

        Mail::to('ejemplo@gmail.com')->send(new MensajeRecibido($mensaje));
        //return new MensajeRecibido($mensaje);
        //return 'Mensaje Enviado';
        return back()->with('estado', 'Gracias por ponerte en contacto, te responderemos a la brevedad posible');
    }
}

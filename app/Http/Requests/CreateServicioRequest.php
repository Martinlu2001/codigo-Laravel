<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServicioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * :bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required',
            'descripcion' => 'required',
            'image' => [
                $this->route('servicio') ? 'nullable': 'required',
            'mimes:jpeg,png']
            //
        ];
    }

    public function messages(){
        return [
            'titulo.required' => 'Se necesita un titulo para el servicio',
            'descripcion.required' => 'Ingresa una descripcion, es necesaria',
            'image.required' => 'Debes seleccionar una imagen'
        ];
    }
}

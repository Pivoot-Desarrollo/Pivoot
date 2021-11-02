<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class JugadorEditStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [



            "nombre" => 'required|max:30',
            "apellido" => 'required|max:30',
            "direccion" => 'required|max:30',

        ];

        $mensajes = [
            "unique" => "¡Este usuario ya esta registrado / Este usuario ya esta en uso !",

        ];
    }
}

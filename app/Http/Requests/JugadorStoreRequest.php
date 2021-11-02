<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class JugadorStoreRequest extends FormRequest
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


            "documento" => 'required|unique:Jugador,docJugador|min:8|max:10',
            "usuario" => 'required|unique:Jugador,idUsuarioFK',
            "acudiente" => 'required',
            "nombre" => 'required|max:30',
            "apellido" => 'required|max:30',
            "direccion" => 'required|max:30',
            "fecha" => 'required',
            "telefono" =>'required|min:7|max:10'

        ];

        $mensajes = [
            "unique" => "¡Este usuario ya esta registrado / Este usuario ya esta en uso !",

        ];
    }
}

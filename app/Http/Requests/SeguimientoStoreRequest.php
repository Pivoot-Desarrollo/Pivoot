<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class SeguimientoStoreRequest extends FormRequest
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

            "actividad" => 'required',
            "entrenador" => 'required',
            "jugador" => 'required',
            "test" => 'required',
            "fecha" => 'required',
            "seguimiento" => 'required',



        ];

        $mensajes = [
            "unique" => "¡Este usuario ya esta registrado / Este usuario ya esta en uso !",

        ];
    }
}

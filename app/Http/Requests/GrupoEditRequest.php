<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class GrupoEditRequest extends FormRequest
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


            "fechaInicio" => 'required',
            "fechaFin" => 'required',
            "categoria" =>'required',



        ];

        $mensajes = [
            "unique" => "¡Este usuario ya esta registrado / Este usuario ya esta en uso !",
            "categoria.required" => "Selecciona una categoria",
        ];
    }
}

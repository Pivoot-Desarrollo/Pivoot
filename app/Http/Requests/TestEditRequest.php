<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class TestEditRequest extends FormRequest
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


            "idCategoriaFK" => 'required',
           "idTipoTestFK" => 'required',
           "denominacionTest" => 'required|alpha|min:5',
           "fechaCreacionTest" => 'required',



        ];

        $mensajes = [
            "required" => "Debes completar este campo",
            "idCategoriaFK.required" => "Selecciona la categoria",
            "idTipoTestFK.required" => "Selecciona el tipo de test",
            "alpha" => "Solo letras"

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            "rol" => "required",
            "nombre" => "required|unique:users,name|max:15",
            "email"  => "required|unique:users,email|email:rfc,dns|max:30",


        ];

        $mensajes = [
            "unique" => "¡Este usuario ya esta registrado / Este usuario ya esta en uso !",
            "confirmed" => "Las contraseñas no coinciden",
            "min" => "La contraseña debe tener :min caracteres"
        ];
    }
}

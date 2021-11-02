<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class UserEditStoreRequest extends FormRequest
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
            "nombre" => "required|max:15",
            "email"  => "required|email:rfc,dns|max:30",


        ];

        $mensajes = [
            "unique" => "¡Este usuario ya esta registrado / Este usuario ya esta en uso !",

        ];
    }
}

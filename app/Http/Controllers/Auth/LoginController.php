<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginStoreRequest;
use AuthenticatesUsers;


class LoginController extends Controller


{

    //mostrar el formualrio de login
    public function form()
    {

        return view('auth.login');
    }
    //logear y redireccionar en caso positivo
    public function login(LoginStoreRequest $request)
    {
        //Auth: Establecer inicios de sesion
        if (Auth::attempt($request->only(
            ['email', 'password']
        ))) {
            return redirect('inicio');
        } else {
            return redirect('login')->with("credenciales_invalidas", "Correo y/o contraseña invalidos");
        }
    }


    //Cerrar sesion
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}

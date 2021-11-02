<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CorreoStoreRequest;
use App\Http\Requests\ConfirmarStoreRequest;
use App\Http\Requests\UserStoreRequest;
//Paquetes utilizados para la caracterizacion
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; //Para las fechas
use App\Models\User;
use Illuminate\Support\Facades\Hash; //Para incriptar el password

//corre personalizado
use App\Mail\ResetPasswordMail;

class ResetPasswordController extends Controller
{
    //Mostrar el formulario de envio de correo del link de seguridad
    // metodo get
    public function emailform()
    {
        return view('auth.recordar_correo');
    }
    //enviar el link de seguridad al correo anterior
    //metodo post
    public function submitlink(ConfirmarStoreRequest $r)
    {
        //1. Generar codigo aleatorio
        $token = Str::random(64);


        //2. Registrar en password_reset email,codigo,fecha
        DB::table('password_resets')->insert(
            [
                "email" => $r->input("email"),
                "token" => $token,
                "created_at" => Carbon::now()
            ]
        );
        //3. Enviar el email al destino, con el codio de seguidad generado
        Mail::to($r->input("email"))->send(new ResetPasswordMail($token));

        return redirect('recuperar-password')
            ->with("mensaje_correo", "Correo de verificación enviado,
                              revise su bandeja de entrada.");
    }

    //mostrar formulario de reseteo de password
    //metodo get

    public function resetform($token)
    {
        return view('auth.reset-password')
            ->with('token', $token);
    }

    //resetea password
    //metodo post

    public function resetpassword(CorreoStoreRequest $r)
    {
        //1. Obtener el registro correspondiente al token e email
        //ingresados en la tabla password-resets:where

        $pass_reset = DB::table('password_resets')->where([
            'email' => $r->input('email'),
            'token' => $r->input('token')
        ])->first();

        if ($pass_reset == null) {

            return redirect('reset-password/{tonken}')
                ->with("mensaje_password", "Correo invalido.");
        }

        //2. De estar el registro, proceder a aactualizar el password
        // al usario correspondiente a ese email (modelo User)

        $user = User::where('email', $r->input('email'))->first();
        $user->password = Hash::make($r->input('password'));
        $user->save();

        return redirect('login')
            ->with("mensaje_cambio_password", "Cambio de contraseña exitoso.");

        //3.Eliminar el registro del token tilizado en la tabla password-user
    }
}

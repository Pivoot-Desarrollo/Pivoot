<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserEditStoreRequest;
use Illuminate\Support\Str;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('miautenticacion');
    }


    public function index()
    {

        //seleccion de jugadores
        $usuarios = User::all();
        //retorna los recursos (jugadores)
        return view('usuario.index')
            ->with("usuarios",  $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {

        //Traer el id maximo que este en la tabla jugador
        $maxusuario = User::all()->max('id');
        $maxusuario++;
        //crear el nuevo recurso jugadores:
        $nuevousuario = new User();
        $nuevousuario->id = $maxusuario;
        $nuevousuario->idRolFK = $request->input("rol");
        $nuevousuario->name = $request->input("nombre");
        $nuevousuario->email = $request->input("email");
        $nuevousuario->password = Str::random(30);
        $nuevousuario->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('usuario')
            ->with("mensaje_exito", "¡Usuario registrado exitosamente!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        //seleccionar el recurso(singleton) con el id del parametro
        $usuario = User::find($id);
        //pasar el cliente a la vista para presentarse
        return view('usuario.index')
            ->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditStoreRequest $request, $id)
    {


        //Seleccion del recurso a modificar
        $usuario = User::find($id);
        //actuarlizar el estado del cliente
        //en virtud de los datos que vengan del formulario
        $usuario->name = $request->input("nombre");
        $usuario->email = $request->input("email");
        $usuario->save();

        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('usuario')
            ->with("mensaje_exito", "¡Usuario actualizado exitosamente!");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function habilitar($id)
    {
        //establecer el estado del cliente(null, 1=activo, 0 = inactivo)
        $usuario = User::find($id);
        $mensaje = "";
        switch ($usuario->habilitado) {
            case null:
                $usuario->habilitado = 1;
                $usuario->save();
                $mensaje = "Estado activo asignado al usuario: $usuario->name";
                break;
            case 1:
                $usuario->habilitado = 2;
                $mensaje = "Estado inactivo asignado al usuario: $usuario->name";
                $usuario->save();
                break;

            case 2:
                $usuario->habilitado = 1;
                $mensaje = "Estado activo asignado al usuario: $usuario->name";
                $usuario->save();
                break;
        }
        //redireccionar a la ruta por defecto index:'jugadores'
        //con un mensaje de exito
        return redirect('usuario')->with(
            'mensaje_exito',
            $mensaje
        );
    }

}


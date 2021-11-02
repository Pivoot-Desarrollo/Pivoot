<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrenadores;
use App\Models\User;
use App\Models\Acudiente;


class EntrenadorController extends Controller
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

        $usuarios = User::all();
        $Acudiente = Acudiente::all();
        $entrenador = Entrenadores::all();

        //retorna los recursos (jugadores)
        return view('entrenador.index')
            ->with("usuarios", $usuarios)
            ->with("Acudiente", $Acudiente)
            ->with('entrenador', $entrenador);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        $Acudiente = Acudiente::all();
        $entrenador = Entrenadores::all();
        return view('jugadores.index')
            ->with("usuarios", $usuarios)
            ->with("Acudiente", $Acudiente)
            ->with("entrenador", $entrenador);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //Traer el id maximo que este en la tabla jugador
        $maxentrenador = Entrenadores::all()->max('idEntrenador');
        $maxentrenador++;
        //crear el nuevo recurso jugadores:
        $nuevoentrenador = new Entrenadores();
        $nuevoentrenador->idEntrenador = $maxentrenador;
        $nuevoentrenador->idUsuarioFK = $request->input("usuario");
        $nuevoentrenador->nombreEntrenador = $request->input("nombreEntrenador");
        $nuevoentrenador->apellidoEntrenador = $request->input("apellidoEntrenador");
        $nuevoentrenador->docEntrenador = $request->input("docEntrenador");
        $nuevoentrenador->direccionEntrenador = $request->input("direccionEntrenador");
        $nuevoentrenador->telEntrenador = $request->input("telEntrenador");
        $nuevoentrenador->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('entrenador')
            ->with("mensaje_exito", "Entrenador registrado exitosamente");
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
        $entrenador = Entrenadores::find($id);

        //pasar el cliente a la vista para presentarse
        return view('entrenador.index')
            ->with('entrenador', $entrenador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //proceso para validar datos (laravel)
        //1. Establecer las reglas de validacion en un arreglo

        //Seleccion del recurso a modificar
        $entrenador = Entrenadores::find($id);
        //actuarlizar el estado del cliente
        //en virtud de los datos que vengan del formularioZ
        //$jugadores->idUsuarioFK = $request->input("usuario");


        $entrenador->nombreEntrenador = $request->input("nombreEntrenador");
        $entrenador->apellidoEntrenador = $request->input("apellidoEntrenador");
        $entrenador->direccionEntrenador = $request->input("direccionEntrenador");
        $entrenador->telEntrenador = $request->input("telEntrenador");
        $entrenador->save();

        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('entrenador')
            ->with("mensaje_exito", "Entrenador actualizado exitosamente");
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
        $entrenador = Entrenadores::find($id);
        $mensaje = "";
        switch ($entrenador->habilitado) {
            case null:
                $entrenador->habilitado = 1;
                $entrenador->save();
                $mensaje = "Estado activo asignado al jugador: $entrenador->nombreEntrenador $entrenador->apellidoEntrenador";
                break;
            case 1:
                $entrenador->habilitado = 2;
                $mensaje = "Estado inactivo asignado al jugador: $entrenador->nombreEntrenador $entrenador->apellidoEntrenador";
                $entrenador->save();
                break;

            case 2:
                $entrenador->habilitado = 1;
                $mensaje = "Estado activo asignado al jugador: $entrenador->nombreEntrenador $entrenador->apellidoEntrenador";
                $entrenador->save();
                break;
        }
        //redireccionar a la ruta por defecto index:'jugadores'
        //con un mensaje de exito
        return redirect('entrenador')->with(
            'mensaje_exito',
            $mensaje
        );
    }
}

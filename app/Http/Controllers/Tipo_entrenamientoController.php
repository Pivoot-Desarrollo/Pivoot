<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_entrenamiento;
use Illuminate\Support\Facades\Validator;

class Tipo_entrenamientoController extends Controller
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
        $Tipo_entrenamiento = Tipo_entrenamiento::all();

        //retorna los recursos (jugadores)
        return view('Tipo_entrenamiento.index')
            ->with('Tipo_entrenamiento', $Tipo_entrenamiento);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Tipo_entrenamiento = Tipo_entrenamiento::all();
        return view('Tipo_entrenamiento.index')
            ->with("Tipo_entrenamiento", $Tipo_entrenamiento);
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
        $maxTipo_entrenamiento = Tipo_entrenamiento::all()->max('idTipoEntrenamiento');
        $maxTipo_entrenamiento++;
        //crear el nuevo recurso jugadores:
        $nuevoTipo_entrenamiento = new Tipo_entrenamiento();
        $nuevoTipo_entrenamiento->idTipoEntrenamiento = $maxTipo_entrenamiento;
        $nuevoTipo_entrenamiento->denominacionTipoEntrenamiento = $request->input("denominacionTipoEntrenamiento");
        $nuevoTipo_entrenamiento->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('Tipo_entrenamiento')
            ->with("mensaje_exito", "Tipo entrenamiento registrado exitosamente");
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
        $Tipo_entrenamiento = Tipo_entrenamiento::find($id);

        //pasar el cliente a la vista para presentarse
        return view('Tipo_entrenamiento.index')
            ->with('Tipo_entrenamiento', $Tipo_entrenamiento);
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
        $Tipo_entrenamiento = Tipo_entrenamiento::find($id);
        //actuarlizar el estado del cliente
        //en virtud de los datos que vengan del formularioZ
        //$jugadores->idUsuarioFK = $request->input("usuario");


        $Tipo_entrenamiento->denominacionTipoEntrenamiento = $request->input("denominacionTipoEntrenamiento");
        $Tipo_entrenamiento->save();

        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('Tipo_entrenamiento')
            ->with("mensaje_exito", "Tipo_entrenamiento actualizado exitosamente");
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
        $Tipo_entrenamiento = Tipo_entrenamiento::find($id);
        $mensaje = "";
        switch ($Tipo_entrenamiento->habilitado) {
            case null:
                $Tipo_entrenamiento->habilitado = 1;
                $Tipo_entrenamiento->save();
                $mensaje = "Estado activo asignado al Tipo_entrenamiento: $Tipo_entrenamiento->idTipoEntrenamiento";
                break;
            case 1:
                $Tipo_entrenamiento->habilitado = 2;
                $mensaje = "Estado inactivo asignado al Tipo_entrenamiento: $Tipo_entrenamiento->idTipoEntrenamiento";
                $Tipo_entrenamiento->save();
                break;

            case 2:
                $Tipo_entrenamiento->habilitado = 1;
                $mensaje = "Estado activo asignado al Tipo_entrenamiento: $Tipo_entrenamiento->idTipoEntrenamiento";
                $Tipo_entrenamiento->save();
                break;
        }
        //redireccionar a la ruta por defecto index:'jugadores'
        //con un mensaje de exito
        return redirect('Tipo_entrenamiento')->with(
            'mensaje_exito',
            $mensaje
        );
    }
}

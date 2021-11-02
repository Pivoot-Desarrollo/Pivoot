<?php

namespace App\Http\Controllers;
use App\Models\entrenamiento;
use App\Models\Entrenador;
use App\Models\Tipo_entrenamiento;
use App\Models\Grupo;

use Illuminate\Http\Request;

class entrenamientoController extends Controller
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
        $entrenamiento = entrenamiento::all();
        $entrenador = Entrenador::all();
        $Tipo_entrenamiento = Tipo_entrenamiento::all();
        $grupos = Grupo::all();
        //retorna los recursos (jugadores)
        return view('entrenamiento.index')
            ->with("entrenamiento",  $entrenamiento)
            ->with("entrenador", $entrenador)
            ->with("Tipo_entrenamiento", $Tipo_entrenamiento)
            ->with("grupos", $grupos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccion de jugadores
        $entrenamiento = entrenamiento::all();
        $entrenador = Entrenador::all();
        $Tipo_entrenamiento = Tipo_entrenamiento::all();
        $grupos = Grupo::all();
        //retorna los recursos (jugadores)
        return view('entrenamiento.index')
            ->with("entrenamiento",  $entrenamiento)
            ->with("entrenador", $entrenador)
            ->with("Tipo_entrenamiento", $Tipo_entrenamiento)
            ->with("grupos", $grupos);
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
        $maxentrenamiento = entrenamiento::all()->max('idEntrenamiento');
        $maxentrenamiento++;
        //crear el nuevo recurso jugadores:
        $nuevoentrenamiento = new entrenamiento();
        $nuevoentrenamiento->idEntrenamiento = $maxentrenamiento;
        $nuevoentrenamiento->idTipoEntrenamientoFK = $request->input("tipo_entrenamiento");
        $nuevoentrenamiento->idEntrenadorFK = $request->input("idEntrenador");
        $nuevoentrenamiento->idGrupoFK = $request->input("grupo");
        $nuevoentrenamiento->fechaentrenamiento = $request->input("fechaentrenamiento");
        $nuevoentrenamiento->horaInicio = $request->input("horaInicio");
        $nuevoentrenamiento->horaFin = $request->input("horaFin");
        $nuevoentrenamiento->lugarEntrenamiento = $request->input("lugarEntrenamiento");
        $nuevoentrenamiento->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('entrenamiento')
            ->with("mensaje_exito", "Entrenamiento registrado exitosamente");
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
        $entrenamiento = entrenamiento::find($id);

        //pasar el cliente a la vista para presentarse
        return view('entrenamiento.index')
            ->with('entrenamiento', $entrenamiento);
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
        $entrenamiento = entrenamiento::find($id);
        //actuarlizar el estado del cliente
        //en virtud de los datos que vengan del formularioZ
        //$jugadores->idUsuarioFK = $request->input("usuario");



        $entrenamiento->fechaEntrenamiento = $request->input("fechaEntrenamiento");
        $entrenamiento->horaInicio = $request->input("horaInicio");
        $entrenamiento->horaFin = $request->input("horaFin");
        $entrenamiento->lugarEntrenamiento = $request->input("lugarEntrenamiento");
        $entrenamiento->save();

        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('entrenamiento')
            ->with("mensaje_exito", "Entrenamiento actualizado exitosamente");
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
        $entrenamiento = entrenamiento::find($id);
        $mensaje = "";
        switch ($entrenamiento->habilitado) {
            case null:
                $entrenamiento->habilitado = 1;
                $entrenamiento->save();
                $mensaje = "Estado activo asignado al entrenamiento con fecha: $entrenamiento->fechaEntrenamiento";
                break;
            case 1:
                $entrenamiento->habilitado = 2;
                $mensaje = "Estado inactivo asignado al entrenamiento con fecha: $entrenamiento->fechaEntrenamiento";
                $entrenamiento->save();
                break;

            case 2:
                $entrenamiento->habilitado = 2;
                $mensaje = "Estado inactivo asignado al entrenamiento con fecha: $entrenamiento->fechaEntrenamiento";
                $entrenamiento->save();
                break;

             case 3:
                $entrenamiento->habilitado = 2;
                $mensaje = "Estado inactivo asignado al entrenamiento con fecha: $entrenamiento->fechaEntrenamiento";
                $entrenamiento->save();
                break;
            case 4:
                $entrenamiento->habilitado = 1;
                $mensaje = "Estado activo asignado al entrenamiento con fecha: $entrenamiento->fechaEntrenamiento";
                $entrenamiento->save();
                break;
        }
        //redireccionar a la ruta por defecto index:'jugadores'
        //con un mensaje de exito
        return redirect('entrenamiento')->with(
            'mensaje_exito',
            $mensaje
        );
    }
}

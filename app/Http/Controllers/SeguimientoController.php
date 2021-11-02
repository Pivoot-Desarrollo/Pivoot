<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SeguimientoStoreRequest;

use App\Http\Requests\SeguimientoEditStoreRequest;
use App\Models\Seguimiento;
use App\Models\Jugadores;
use App\Models\Test;
use App\Models\Actividad;
use App\Models\Entrenadores;
use Illuminate\Support\Facades\Validator;

class SeguimientoController extends Controller
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
        $seguimientos = Seguimiento::all();
        $jugadores = Jugadores::all();
        $tests = Test::all();
        $entrenador = Entrenadores::all();
        //retorna los recursos (jugadores)
        return view('seguimiento.index')
            ->with("seguimientos",  $seguimientos)
            ->with("jugadores", $jugadores)
            ->with("tests",  $tests)
            ->with("entrenador",  $entrenador);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jugadores = Jugadores::all();
        $tests = Test::all();
        $entrenador = Entrenadores::all();
        return view('seguimiento.index')
            ->with("jugadores", $jugadores)
            ->with("tests",  $tests)
            ->with("entrenador",  $entrenador);
        //->with("actividades", $actividades);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeguimientoStoreRequest $request)
    {
        //proceso para validar datos (laravel)

        //Traer el id maximo que este en la tabla jugador
        $maxseguimiento = Seguimiento::all()->max('idSeguimiento');
        $maxseguimiento++;
        //crear el nuevo recurso jugadores:
        $nuevoseguimiento = new Seguimiento();
        $nuevoseguimiento->idSeguimiento = $maxseguimiento;
        $nuevoseguimiento->idActividadFK = $request->input("actividad");
        $nuevoseguimiento->idJugadorFK = $request->input("jugador");
        $nuevoseguimiento->idEntrenadorFK = $request->input("entrenador");
        $nuevoseguimiento->idTestFK = $request->input("test");
        $nuevoseguimiento->fechaSeguimiento = $request->input("fecha");
        $nuevoseguimiento->observacionesSeguimiento = $request->input("seguimiento");
        $nuevoseguimiento->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('seguimiento')
            ->with("mensaje_exito", "¡Seguimiento registrado exitosamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        //seleccionar el recurso(singleton) con el id del parametro
        $seguimiento = Seguimiento::find($id);
        $tests = Test::all();

        //pasar el cliente a la vista para presentarse
        return view('seguimiento.index')
            ->with('seguimiento', $seguimiento)
            ->with("tests",  $tests);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeguimientoEditStoreRequest $request, $id)
    {

        //Seleccion del recurso a modificar
        $seguimiento = Seguimiento::find($id);
        //actuarlizar el estado del cliente
        //en virtud de los datos que vengan del formulario
        $seguimiento->idActividadFK = $request->input("actividad");
        //$seguimiento->idJugadorFK = $request->input("jugador");

        $seguimiento->fechaSeguimiento = $request->input("fecha");
        $seguimiento->observacionesSeguimiento = $request->input("seguimiento");
        $seguimiento->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('seguimiento')
            ->with("mensaje_exito", "¡Seguimiento actualizado exitosamente!");
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
        $seguimiento = Seguimiento::find($id);
        $mensaje = "";
        switch ($seguimiento->habilitado) {
            case null:
                $seguimiento->habilitado = 1;
                $seguimiento->save();
                $mensaje = "Estado activo asignado al seguimiento: $seguimiento->idSeguimiento";
                break;
            case 1:
                $seguimiento->habilitado = 2;
                $mensaje = "Estado inactivo asignado al seguimiento: $seguimiento->idSeguimiento";
                $seguimiento->save();
                break;

            case 2:
                $seguimiento->habilitado = 1;
                $mensaje = "Estado activo asignado al seguimiento: $seguimiento->idSeguimiento";
                $seguimiento->save();
                break;
        }
        //redireccionar a la ruta por defecto index:'jugadores'
        //con un mensaje de exito
        return redirect('seguimiento')->with(
            'mensaje_exito',
            $mensaje
        );
    }
}

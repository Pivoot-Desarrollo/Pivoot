<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugadores;
use App\Models\User;
use App\Models\Acudiente;
use App\Http\Requests\JugadorStoreRequest;
use App\Http\Requests\JugadorEditStoreRequest;
use Illuminate\Support\Facades\Validator;

class JugadorController extends Controller
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
        $jugador = Jugadores::all();
        $usuarios = User::all();
        $Acudiente = Acudiente::all();
        //retorna los recursos (jugadores)
        return view('jugadores.index')
            ->with("jugador",  $jugador)
            ->with("usuarios", $usuarios)
            ->with("Acudiente", $Acudiente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        $jugador = Jugadores::all();
        $Acudiente = Acudiente::all();
        return view('jugadores.index')
            ->with("usuarios", $usuarios)
            ->with("Acudiente", $Acudiente)
            ->with("jugador",  $jugador);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JugadorStoreRequest $request)
    {


        //Traer el id maximo que este en la tabla jugador
        $maxjugadores = Jugadores::all()->max('idJugador');
        $maxjugadores++;
        //crear el nuevo recurso jugadores:
        $nuevojugadores = new Jugadores();
        $nuevojugadores->idJugador = $maxjugadores;
        $nuevojugadores->idUsuarioFK = $request->input("usuario");
        $nuevojugadores->idAcudienteFK = $request->input("acudiente");
        $nuevojugadores->nombreJugador = $request->input("nombre");
        $nuevojugadores->apellidoJugador = $request->input("apellido");
        $nuevojugadores->direccionJugador = $request->input("direccion");
        $nuevojugadores->fechaNacimiento = $request->input("fecha");
        $nuevojugadores->docJugador = $request->input("documento");
        $nuevojugadores->telJugador = $request->input("telefono");
        $nuevojugadores->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('jugadores')
            ->with("mensaje_exito", "Jugador registrado exitosamente");
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
        $jugadores = Jugadores::find($id);

        //pasar el cliente a la vista para presentarse
        return view('jugadores.index')
            ->with('jugadores', $jugadores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JugadorEditStoreRequest $request, $id)
    {
        //proceso para validar datos (laravel)
        //1. Establecer las reglas de validacion en un arreglo

        //Seleccion del recurso a modificar
        $jugadores = Jugadores::find($id);
        //actuarlizar el estado del cliente
        //en virtud de los datos que vengan del formularioZ
        //$jugadores->idUsuarioFK = $request->input("usuario");


        $jugadores->nombreJugador = $request->input("nombre");
        $jugadores->apellidoJugador = $request->input("apellido");
        $jugadores->direccionJugador = $request->input("direccion");
        $jugadores->fechaNacimiento = $request->input("fecha");
        $jugadores->docJugador = $request->input("documento");
        $jugadores->telJugador = $request->input("telefono");
        $jugadores->save();

        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('jugadores')
            ->with("mensaje_exito", "Jugador actualizado exitosamente");
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
        $jugadores = Jugadores::find($id);
        $mensaje = "";
        switch ($jugadores->habilitado) {
            case null:
                $jugadores->habilitado = 1;
                $jugadores->save();
                $mensaje = "Estado activo asignado al jugador: $jugadores->nombreJugador $jugadores->apellidoJugador";
                break;
            case 1:
                $jugadores->habilitado = 2;
                $mensaje = "Estado inactivo asignado al jugador: $jugadores->nombreJugador $jugadores->apellidoJugador";
                $jugadores->save();
                break;

            case 2:
                $jugadores->habilitado = 1;
                $mensaje = "Estado activo asignado al jugador: $jugadores->nombreJugador $jugadores->apellidoJugador";
                $jugadores->save();
                break;
        }
        //redireccionar a la ruta por defecto index:'jugadores'
        //con un mensaje de exito
        return redirect('jugadores')->with(
            'mensaje_exito',
            $mensaje
        );
    }
}

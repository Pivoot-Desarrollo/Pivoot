<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Novedades;
use App\Models\Jugadores;

class NovedadesController extends Controller
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
        $Novedades = Novedades::all();
        $jugadores = Jugadores::all();
        return view('Novedad.index')
        ->with('Novedad', $Novedades)->with("jugador",  $jugadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Novedades = Novedades::all();
        $jugadores = Jugadores::all();
        return view('novedad.index')
        ->with("jugador", $jugadores)
        ->with("Novedades", $Novedades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {

        //Traer el id maximo que este en la tabla grupo
        $novedadmax = Novedades::all()->max('idNovedad');
        $novedadmax++;
        //crear el nuevo recurso jugadores:
        $maxnovedad = new Novedades();
        $maxnovedad->idNovedad = $novedadmax;
        $maxnovedad->idEntrenamientoFK = $request->input("idEntrenamientoFK");
        $maxnovedad->idUsuarioFK = $request->input("idUsuarioFK");
        $maxnovedad->fechaNovedad = $request->input("fechaNovedad");
        $maxnovedad->descripcionNovedad = $request->input("descripcionNovedad");
        $maxnovedad->save();



        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('Novedad')
            ->with("mensaje_exito", "Novedad registrado exitosamente");
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
         $Novedades = Novedades::find($id);
         //pasar el cliente a la vista para presentarse
         return view('Novedad.index')->with('Novedades', $Novedades);
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

         //Seleccion del recurso a modificar
         $Novedades = Novedades::find($id);
         //actuarlizar el estado del cliente
         //en virtud de los datos que vengan del formulario
         $Novedades->idNovedad = $request->input("idNovedad");
         $Novedades->idEntrenamientoFK= $request->input("idEntrenamientoFK");
         $Novedades->idUsuarioFK = $request->input("idUsuarioFK");
         $Novedades->fechaNovedad = $request->input("fechaNovedad");
         $Novedades->descripcionNovedad = $request->input("descripcionNovedad");
         $Novedades->save();

         //rediccionamiento a una ruta especifica
         //SOLO PARA RUTAS GET
         //with: crear variables de sesion de duracion corta(flash)
         return redirect('Novedad')
             ->with("mensaje_exito", "Novedad actualizada exitosamente");
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
        $Novedades = Novedades::find($id);
        $mensaje = "";
        switch ($Novedades->habilitado) {
            case null:
                $Novedades->habilitado = 1;
                $Novedades->save();
                $mensaje = "Estado activo asignado al seguimiento: $Novedades->idSeguimiento";
                break;
            case 1:
                $Novedades->habilitado = 2;
                $mensaje = "Estado inactivo asignado al seguimiento: $Novedades->idSeguimiento";
                $Novedades->save();
                break;

            case 2:
                $Novedades->habilitado = 1;
                $mensaje = "Estado activo asignado al seguimiento: $Novedades->idSeguimiento";
                $Novedades->save();
                break;
        }
        //redireccionar a la ruta por defecto index:'Novedad'
        //con un mensaje de exito
        return redirect('Novedad')->with(
            'mensaje_exito',
            $mensaje
        );
    }
}

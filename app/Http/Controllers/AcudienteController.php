<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Acudiente;


class AcudienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

     public function __construct()
    {
        $this->middleware('miautenticacion');
    }

    public function index()
    {
        $Acudiente = Acudiente::all();
        return view('Acudiente.index')
        ->with('Acudiente', $Acudiente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Acudiente.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Traer el id maximo que este en la tabla grupo
        $Acudientemax = Acudiente::all()->max('idAcudiente');
        $Acudientemax++;
        //crear el nuevo recurso jugadores:
        $maxAcudiente = new Acudiente();
        $maxAcudiente->idAcudiente = $Acudientemax;
        $maxAcudiente->nombreAcudiente = $request->input("nombreAcudiente");
        $maxAcudiente->apellidoAcudiente = $request->input("apellidoAcudiente");
        $maxAcudiente->docAcudiente = $request->input("docAcudiente");
        $maxAcudiente->direccionAcudiente = $request->input("direccionAcudiente");
        $maxAcudiente->telAcudiente = $request->input("telAcudiente");
        $maxAcudiente->correoAcudiente = $request->input("correoAcudiente");
        $maxAcudiente->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('Acudiente')
            ->with("mensaje_exito", "Acudiente registrado exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          //seleccion del recurso cuyo id es el parametro
          $Acudiente = Acudiente::find($id);

          return view('Acudiente.show')
              ->with("Acudiente", $Acudiente);
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
         $Acudiente = Acudiente::find($id);
         //pasar el cliente a la vista para presentarse
         return view('Acudiente.index')->with('Acudiente', $Acudiente);
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
         $Acudiente = Acudiente::find($id);
         //actuarlizar el estado del cliente
         //en virtud de los datos que vengan del formulario
         $Acudiente->idAcudiente = $request->input("idAcudiente");
         $Acudiente->nombreAcudiente = $request->input("nombreAcudiente");
         $Acudiente->apellidoAcudiente= $request->input("apellidoAcudiente");
         $Acudiente->docAcudiente = $request->input("docAcudiente");
         $Acudiente->direccionAcudiente = $request->input("direccionAcudiente");
         $Acudiente->telAcudiente = $request->input("telAcudiente");
         $Acudiente->correoAcudiente = $request->input("correoAcudiente");
         $Acudiente->save();

         //rediccionamiento a una ruta especifica
         //SOLO PARA RUTAS GET
         //with: crear variables de sesion de duracion corta(flash)
         return redirect('Acudiente')
             ->with("mensaje_exito", "Acudiente actualizado exitosamente");
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
}

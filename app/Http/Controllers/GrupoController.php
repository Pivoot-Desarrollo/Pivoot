<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoEditRequest;
use App\Models\Categoria;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GrupoController extends Controller
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
        $grupos = Grupo::all();
        $categorias = Categoria::all();
        return view('grupo.index')
        ->with('grupos', $grupos)->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grupo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //proceso para validar datos (laravel)
        //1. Establecer las reglas de validacion en un arreglo
        $reglas = [
            "fechaInicio" => 'required',
            "fechaFin" => 'required',
            "categoria" =>'required',
            "denominacionGrupo" =>'required|alpha|max:50',

        ];
        //1.1 Establecer mensajes de validacion
        $mensajes = [
            "required" => "Campo requerido",
            "categoria.required" => "Selecciona la categoria",
            "denominacionGrupo.required" => "Campo requerido,Asignale un nombre al grupo",
            "alpha" => "Debe ser solo letras"

        ];

        //2. crear el objeto para validacion
        $validador = Validator::make($request->all(), $reglas, $mensajes);

        //3. Realizar la validacion utilizando el validator
        if ($validador->fails()) {
            //zona de fallo
            return redirect('grupos')
                ->withErrors($validador)
                ->withInput();
        }

        //Traer el id maximo que este en la tabla grupo
        $gruposmax = Grupo::all()->max('idGrupo');
        $gruposmax++;
        //crear el nuevo recurso jugadores:
        $maxgrupos = new Grupo();
        $maxgrupos->idGrupo = $gruposmax;
        $maxgrupos->denominacionGrupo =$request->input("denominacionGrupo");
        $maxgrupos->idCategoriaFK = $request->input("categoria");
        $maxgrupos->fechaInicio= $request->input("fechaInicio");
        $maxgrupos->fechaFin = $request->input("fechaFin");
        $maxgrupos->estado = $request->input("estado");
        $maxgrupos->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('grupos')
            ->with("mensaje_exito", "Grupo registrado exitosamente");
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
          $grupos = Grupo::find($id);

          return view('grupo.show')
              ->with("grupos", $grupos);
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
         $grupos = Grupo::find($id);
         //pasar el cliente a la vista para presentarse
         return view('grupo.edit')->with('grupos', $grupos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GrupoEditRequest $request, $id)
    {
         //Seleccion del recurso a modificar
         $grupos = Grupo::find($id);
         //actuarlizar el estado del cliente
         //en virtud de los datos que vengan del formulario
         $grupos->denominacionGrupo = $request->input("denominacionGrupo");
         $grupos->idCategoriaFK = $request->input("idCategoriaFK");
         $grupos->fechaInicio = $request->input("fechaInicio");
         $grupos->fechaFin = $request->input("fechaFin");

         $grupos->save();

         //rediccionamiento a una ruta especifica
         //SOLO PARA RUTAS GET
         //with: crear variables de sesion de duracion corta(flash)
         return redirect('grupos')
             ->with("mensaje_exito", "Grupo actualizado exitosamente");
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
        $grupos = Grupo::find($id);
        $mensaje = "";
        switch ($grupos->habilitado) {
            case null:
                $grupos->habilitado = 1;
                $grupos->save();
                $mensaje = "Estado activo asignado al grupo: $grupos->idGrupo";
                break;
            case 1:
                $grupos->habilitado = 2;
                $mensaje = "Estado inactivo asignado al grupo: $grupos->idGrupo";
                $grupos->save();
                break;

            case 2:
                $grupos->habilitado = 1;
                $mensaje = "Estado activo asignado al grupo: $grupos->idGrupo";
                $grupos->save();
                break;
        }

        return redirect('grupos')->with(
            'mensaje_exito',
            $mensaje
        );
    }
}

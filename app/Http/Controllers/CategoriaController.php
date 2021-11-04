<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
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
        //
        //seleccion de jugadores
        $categorias = Categoria::all();
        //retorna los recursos (jugadores)
        return view('categorias.index')
            ->with("categorias",  $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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
            "nombre" => 'required|alpha|max:10',
            "edadmin" => 'required|numeric',
            "edadmax" => 'required|numeric',

        ];
        //1.1 Establecer mensajes de validacion
        $mensajes = [
            "required" => "Campo requerido",
            "alpha" => "Solo letras",
            "number" => "Solo numeros",
            "max" => "Debe tener maximo :max caracteres",
            "min" => "Debe tener minimi :min carateres"
        ];

        //2. crear el objeto para validacion
        $validador = Validator::make($request->all(), $reglas, $mensajes);

        //3. Realizar la validacion utilizando el validator
        if ($validador->fails()) {
            //zona de fallo
            return redirect('categorias')
                ->withErrors($validador)
                ->withInput();

        }

        //Traer el id maximo que este en la tabla jugador
        $maxcategorias = Categoria::all()->max('idCategoria');
        $maxcategorias++;
        //crear el nuevo recurso jugadores:
        $nuevacategoria = new Categoria();
        $nuevacategoria->idCategoria = $maxcategorias;
        $nuevacategoria->edadMinima = $request->input("edadmin");
        $nuevacategoria->edadMaxima = $request->input("edadmax");
        $nuevacategoria->denominacionCategoria = $request->input("nombre");
        $nuevacategoria->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('categorias')
            ->with("mensaje_exito", "Categoria registrada exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $categorias = Categoria::find($id);
        //pasar el cliente a la vista para presentarse
        return view('categorias.edit')->with('categorias', $categorias);

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
        $categorias = Categoria::find($id);
        //actuarlizar el estado del cliente
        //en virtud de los datos que vengan del formularioZ
        //$jugadores->idUsuarioFK = $request->input("usuario");
        $categorias->edadMinima = $request->input("edadmin");
        $categorias->edadMaxima = $request->input("edadmax");
        $categorias->denominacionCategoria = $request->input("nombre");
        $categorias->save();

        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('categorias')
            ->with("mensaje_exito", "Categoria actualizada exitosamente");
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestEditRequest;
use App\Models\Categoria;
use App\Models\Test;
use App\Models\TipoTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
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
        $tests = Test::all();
        $categorias = Categoria::all();
        $tipotest= TipoTest::all();

        //retorna los recursos (jugadores)
        return view('test.index')
            ->with("tests",  $tests)
            ->with("tipotest",  $tipotest)
            ->with("categorias", $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $tipotest = TipoTest::all();
        return view('test.create')->with("categoria", $categorias)
                                  ->with("tipotest", $tipotest);
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
           "idCategoriaFK" => 'required',
           "idTipoTestFK" => 'required',
           "denominacionTest" => 'required|alpha|min:5|max:50',
           "fechaCreacionTest" => 'required|after_or_equal:fechaCreacionTest',
        ];
        //1.1 Establecer mensajes de validacion
        $mensajes = [
            "required" => "Debes completar este campo",
            "idCategoriaFK.required" => "Selecciona la categoria",
            "idTipoTestFK.required" => "Selecciona el tipo de test",
            "alpha" => "Solo letras",
            "max" => "Superaste el limite de caracteres, este no debe ser mayor a 50",
            "after_or_equal:fechaCreacionTest" => "La fecha debe ser posterior a la actual"
        ];

        //2. crear el objeto para validacion
        $validador = Validator::make($request->all(), $reglas, $mensajes);

        //3. Realizar la validacion utilizando el validator
        if ($validador->fails()) {
            //zona de fallo
            return redirect('tests')
                ->withErrors($validador)
                ->withInput();
        }

        //Traer el id maximo que este en la tabla jugador
        $maxtests = Test::all()->max('idTest');
        $maxtests++;
        //crear el nuevo recurso jugadores:
        $nuevotest = new Test();
        $nuevotest->idTest = $maxtests;
        $nuevotest->idCategoriaFK = $request->input("idCategoriaFK");
        $nuevotest->idTipoTestFK = $request->input("idTipoTestFK");
        $nuevotest->denominacionTest = $request->input("denominacionTest");
        $nuevotest->fechaCreacionTest = $request->input("fechaCreacionTest");
        $nuevotest->save();


        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('tests')
            ->with("mensaje_exito", "Test registrado exitosamente");
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
        $tests = Test::find($id);

        return view('test.show')
            ->with("tests", $tests);
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
        $tests = Test::find($id);
        //pasar el cliente a la vista para presentarse
        return view('test.edit')->with('tests', $tests);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestEditRequest $request, $id)
    {
        //proceso para validar datos (laravel)
        //1. Establecer las reglas de validacion en un arreglo

        //Seleccion del recurso a modificar
        $tests = Test::find($id);
        //actuarlizar el estado del cliente
        //en virtud de los datos que vengan del formularioZ
        //$jugadores->idUsuarioFK = $request->input("usuario");
        $tests->idCategoriaFK = $request->input("idCategoriaFK");
        $tests->idTipoTestFK = $request->input("idTipoTestFK");
        $tests->denominacionTest = $request->input("denominacionTest");
        $tests->fechaCreacionTest = $request->input("fechaCreacionTest");
        $tests->save();

        //rediccionamiento a una ruta especifica
        //SOLO PARA RUTAS GET
        //with: crear variables de sesion de duracion corta(flash)
        return redirect('tests')
            ->with("mensaje_exito", "Test actualizado exitosamente");
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
        $tests = Test::find($id);
        $mensaje = "";
        switch ($tests->habilitado) {
            case null:
                $tests->habilitado = 1;
                $tests->save();
                $mensaje = "Estado activo asignado al test: $tests->idTest";
                break;
            case 1:
                $tests->habilitado = 2;
                $mensaje = "Estado inactivo asignado al test: $tests->idTest";
                $tests->save();
                break;

            case 2:
                $tests->habilitado = 1;
                $mensaje = "Estado activo asignado al test: $tests->idTest";
                $tests->save();
                break;
        }
        //redireccionar a la ruta por defecto index:'jugadores'
        //con un mensaje de exito
        return redirect('tests')->with(
            'mensaje_exito',
            $mensaje
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Imports\JugadoresExcelImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class JugadoresCargaController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jugadores-excel.input');
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
               "input" => 'required|mimes:xls,xlsx'
            ];
            //1.1 Establecer mensajes de validacion
            $mensajes = [
                "required" => "Por favor seleccione un archivo",
                "mimes" => "Solo archivos con extesión xls o xlsx",
            ];

            //2. crear el objeto para validacion
            $validador = Validator::make($request->all(), $reglas, $mensajes);

            //3. Realizar la validacion utilizando el validator
            if ($validador->fails()) {
                //zona de fallo
                return redirect('jugadores-excel/create')
                    ->withErrors($validador)
                    ->withInput();
            }

        $archivo = $request->file('input');
        Excel::import( new JugadoresExcelImport, $archivo);


        return redirect('jugadores-excel/create')
        ->with("mensaje_carga", "¡Jugadores importados exitosamente!");
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
        //
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
        //
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

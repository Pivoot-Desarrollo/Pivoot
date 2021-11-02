<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('jugadores', 'App\Http\Controllers\JugadorController')->middleware('miautenticacion');;
Route::resource('usuario', 'App\Http\Controllers\usuarioController')->middleware('miautenticacion');
Route::resource('seguimiento', 'App\Http\Controllers\SeguimientoController')->middleware('miautenticacion');
Route::resource('Novedad', 'App\Http\Controllers\NovedadesController')->middleware('miautenticacion');
Route::resource('Acudiente', 'App\Http\Controllers\AcudienteController')->middleware('miautenticacion');
Route::resource('categorias', 'App\Http\Controllers\CategoriaController')->middleware('miautenticacion');
Route::resource('grupos', 'App\Http\Controllers\GrupoController')->middleware('miautenticacion');
Route::resource('tests', 'App\Http\Controllers\TestController')->middleware('miautenticacion');
Route::resource('entrenador', 'App\Http\Controllers\EntrenadorController')->middleware('miautenticacion');
Route::resource('Tipo_entrenamiento', 'App\Http\Controllers\Tipo_entrenamientoController')->middleware('miautenticacion');
Route::resource('entrenamiento','App\Http\Controllers\entrenamientoController')->middleware('miautenticacion');


Route::get('login', 'App\Http\Controllers\Auth\LoginController@form');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');



Route::get('inicio', function () {
    return view('templates.inicio');
});

Route::get('index', function () {
    return view('auth.index');
});

Route::get('pivoot', function () {
    return view('auth.about');
});

//Rutas Para habilitar o deshabilitar un jugador
Route::get(
    'jugadores/{jugadores}/habilitar',
    'App\Http\Controllers\JugadorController@habilitar'
);

//Rutas Para habilitar o deshabilitar un seguimiento
Route::get(
    'seguimiento/{seguimiento}/habilitar',
    'App\Http\Controllers\SeguimientoController@habilitar'
);

//Rutas Para habilitar o deshabilitar un usuario
Route::get(
    'usuario/{usuario}/habilitar',
    'App\Http\Controllers\usuarioController@habilitar'
);

//Rutas Para habilitar o deshabilitar un seguimiento
Route::get(
    'entrenador/{entrenador}/habilitar',
    'App\Http\Controllers\EntrenadorController@habilitar'
);

Route::get(
    'Tipo_entrenamiento/{Tipo_entrenamiento}/habilitar',
    'App\Http\Controllers\Tipo_entrenamientoController@habilitar'
);

//Rutas de habilitar o deshabilitar tests
Route::get(
    'tests/{tests}/habilitar',
    'App\Http\Controllers\TestController@habilitar'
);

//Rutas de habilitar y dehabilitar grupos
Route::get(
    'grupos/{grupos}/habilitar',
    'App\Http\Controllers\GrupoController@habilitar'
);

//Rutas de habilitar o deshabilitar entrenamiento
Route::get(
    'entrenamiento/{entrenamiento}/habilitar',
    'App\Http\Controllers\entrenamientoController@habilitar'
);


//Rutas Para habilitar o deshabilitar una novedad
Route::get(
    'Novedad/{Novedad}/habilitar',
    'App\Http\Controllers\NovedadesController@habilitar'
);

//Ruta de prueba emails
Route::get('prueba-email', function () {

    $detalles = ["Enviado por" => "Paula Palacios"];

    Mail::to('papalacios61@misena.edu.co')
        ->send(new TestMail($detalles));
    die('correo enviado');
});

//Rutas para la recuperacion de contraseña de usuario
Route::get('recuperar-password', "App\Http\Controllers\Auth\ResetPasswordController@emailform");
Route::post('enviar-link', "App\Http\Controllers\Auth\ResetPasswordController@submitlink");
Route::get('reset-password/{tonken}', "App\Http\Controllers\Auth\ResetPasswordController@resetform");
Route::post('reset-password', "App\Http\Controllers\Auth\ResetPasswordController@resetpassword");

//Rutas para importar datos de excel
Route::resource('usuarios-excel', "App\Http\Controllers\UsersController")
->only(['create' , 'store'])->middleware('miautenticacion');

Route::resource('jugadores-excel', "App\Http\Controllers\JugadoresCargaController")
->only(['create' , 'store'])->middleware('miautenticacion');

@extends('templates.contenido')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/categorias.css') }}" />

    <center>

        <body>

            <h1 class="title">GESTIONAR CATEGORIAS</h1>
            <center>
                @if (session('mensaje_exito'))
                    <div>
                        <strong class="alert alert-success">
                            {{ session('mensaje_exito') }}
                        </strong>
                    </div><br>
                @endif
            </center>

            @foreach ($categorias as $categoria)

                <div class="container">

                    <div class="card">
                        <img src="img/img6.jpg">
                        <h4>{{ $categoria->denominacionCategoria }}</h4>
                        <p>JUGADORES ENTRE {{ $categoria->edadMinima }} a {{ $categoria->edadMaxima }}</p>
                        <a href="{{ 'grupos' }}">Ver</a>

                    </div>
                </div>

            @endforeach

            <center>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@getbootstrap">Agregar
                    Categoria</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title-center " id="exampleModalLabel"><strong>Nueva
                                        Categoria</strong>

                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('categorias') }}" class="form-horizontal">
                                    @csrf
                                    <fieldset>
                                        <center>
                                            <!-- Form Name -->
                                            <br><strong>
                                                <legend>Registar nueva Categoria</legend>
                                            </strong>

                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="textinput">Edad minima :</label>

                                                <input value="{{ old('edadmin') }}" name="edadmin" type="text"
                                                    placeholder="Ingrese la edad minima de la categoria"
                                                    class="form-control input-md">
                                                <strong class="alert-danger">{{ $errors->first('edadmin') }}</strong>

                                            </div>

                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="textinput">Edad maxima :</label>

                                                <input value="{{ old('edadmax') }}" name="edadmax" type="text"
                                                    placeholder="Ingrese la edad maxima de la categoria"
                                                    class="form-control input-md">
                                                <strong class="alert-danger">{{ $errors->first('edadmax') }}</strong>

                                            </div>

                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-md-8 control-label" for="textinput">Denominacion de la
                                                    categoria :</label>

                                                <input value="{{ old('nombre') }}" name="nombre" type="text"
                                                    placeholder="" class="form-control input-md">
                                                <strong class="alert-danger">{{ $errors->first('nombre') }}</strong>

                                            </div>



                                            <!-- Button -->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for=""></label>
                                                <div class="col-md-4">
                                                    <button id="" name=" " class="btn btn-success">Guardar</button>
                                                </div>
                                            </div>
                                        </center>
                                    </fieldset>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </center>

        </body>

        </html>


    @endsection
</center>

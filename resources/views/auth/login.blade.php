<!doctype html>
<html lang="en">

<head>
    <title>PIVOOT-Gestor de escuela deportiva</title>
    <link rel="shortcut icon" href="../assets/LOGO-VF-PIVOOT.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/stylee.css') }}">

</head>


<body style="background-image: url(../img/fondologin.svg);">

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>

                <center>
                    @if (session('credenciales_invalidas'))
                        <strong class="alert alert-warning">
                            {{ session('credenciales_invalidas') }}
                        </strong>
                    @endif
                </center>

                <center>
                    @if (session('mensaje_cambio_password'))
                        <strong class="alert alert-warning">
                            {{ session('mensaje_cambio_password') }}
                        </strong>
                    @endif
                </center>

            </div>

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image:  url(../img/fondolog.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Iniciar sesión</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="https://www.facebook.com/clubesbalca"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form method="POST" action="{{ url('login') }}" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label">Correo usuario</label>
                                    <input value="{{ old('email') }}" name="email" id="email" class="form-control" placeholder="Correo">
                                    <strong class="alert-danger">{{ $errors->first('email') }}</strong>

                                </div>
                                <div class="form-group mb-3">
                                    <label class="label">Contraseña</label>
                                    <input value="{{ old('password') }}" id="password" name="password" type="password" class="form-control"
                                        placeholder="Password">
                                        <strong class="alert-danger">{{ $errors->first('password') }}</strong>
                                </div>
                                <div class="form-group">
                                    <br>
                                    <center><button type="submit"
                                            class=" btn-block btn-warning rounded-pill rounded submit px-3 text-white border-0 altura  ">Ingresar</button>
                                    </center>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Recuerdame
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <br><br><br><a href="{{ 'recuperar-password' }}">Olvidaste tu contraseña?</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>

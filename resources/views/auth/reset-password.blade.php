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


                @if (session('mensaje_correo'))
                    <center>
                        <strong class="alert alert-warning" role="alert">
                            {{ session('mensaje_correo') }}
                        </strong>
                    </center>

                @endif


                @if (session('mensaje_password'))
                    <center>
                        <strong class="alert alert-warning" role="alert">
                            {{ session('mensaje_password') }}
                        </strong>
                    </center>
                @endif


            </div>

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image:  url(../img/fondolog.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Nueva contraseña</h3>
                                </div>

                            </div>
                            <form method="POST" action="{{ url('reset-password') }}" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label value="{{ old('email') }}" class="label">Correo usuario</label>
                                    <input name="email" id="email" class="form-control" placeholder="Correo">
                                    <a class="alert-warning">{{ $errors->first('email') }}</a>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label">Contraseña</label>
                                    <input value="{{ old('password') }}" name="password" id="password"
                                        class="form-control" type="password" placeholder="Contraseña">
                                    <a class="alert-warning">{{ $errors->first('password') }}</a>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label">Confirmar
                                        contraseña</label>
                                    <input value="{{ old('password') }}" class="form-control" type="password"
                                        name="password_confirmation" placeholder="Contraseña">

                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <a class="alert-warning">{{ $errors->first('password') }}</a>
                                </div>

                                <div class="form-group">
                                    <br>
                                    <center><button type="submit"
                                            class=" btn-block btn-warning rounded-pill rounded submit px-3 text-white border-0 altura">Resetear</button>
                                    </center>
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

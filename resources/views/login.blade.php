<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login | </title>
</head>

<body>
    @if(session('success'))
    <div class="alert alert-success mt-4 text-center">
        <strong>¡Éxito!</strong> {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger mt-4 text-center">
        <strong>¡Error!</strong> {{ session('error') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger mt-4 text-center">
        <strong>¡Error! </strong>
        <ul>
            @foreach ($errors->all() as $error)
            <p>* {{ $error }}</p>
            @endforeach
        </ul>
    </div>
    @endif
    <div id="login">
        <form action="{{ route('ingresar')}}" method="POST">
            @csrf
            <h1>Inicio Sesion</h1>
            <input type="text" placeholder="Correo" name="email">
            <input type="password" placeholder="Contraseña" name="password">
            <button type="submit">Login</button>
        </form>
        <div class="text-center">
            <p>¿No tienes cuenta? <strong>pulsa <a href="" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">aquiiiii</a></strong></p>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #a2d7fc">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Registrarse</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('registro') }}" method="POST">
                        @csrf
                        <label for=""><strong>Nombre</strong></label>
                        <input type="text" class="form-control" name="name">
                        <label for="" class="mt-2"><strong>Correo</strong></label>
                        <input type="email" class="form-control" name="email">
                        <label for="" class="mt-2"><strong>Contraseña</strong></label>
                        <input type="password" class="form-control" name="password">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Crear cuenta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 5000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
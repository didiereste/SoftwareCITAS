<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: gray">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('bienvenido') }}"><img src="{{ asset('img/logo.jpeg') }}" alt=""
                    class="img-fluid" style="width: 80px;height:60px; border-radius:500px"><strong> CO
                    GARAGE</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('bienvenido') }}"
                            style="color:white"><strong style="color: black"><i class="fa-solid fa-house"></i> Inicio</strong></a>
                    </li>
                    @role('cliente')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('citas.index') }}"
                            style="color:white"><strong style="color: black">Cita</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('miscitas') }}" style="color:white"><strong style="color: black"> <i class="fa-regular fa-calendar-check"></i> Mis
                                Citas</strong></a>
                    </li>
                    @endrole
                    @if(auth()->user()->can('administrar'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuarios') }}"
                            style="color:white"><strong style="color: black"> <i class="fa-solid fa-users"></i>  Usuarios </strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gestioncitas') }}" style="color:white"><strong style="color: black"><i class="fa-solid fa-clipboard-question"></i>  Gestionar
                                citas</strong></a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('calendario') }}" style="color:white"><strong style="color: black"><i class="fa-solid fa-calendar-days"></i> Calendario</strong></a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <form action="{{ route('logout')}}" method="POST" style="margin-top: 2px">
                            @csrf
                            <button type="submit" class="btn" style="color:white"><strong style="color: black"> <i class="fa-solid fa-circle-xmark"></i>  Salir</strong>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('contenido')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
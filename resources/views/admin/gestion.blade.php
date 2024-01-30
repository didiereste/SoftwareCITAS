@extends('layaout.navbar')
@section('contenido')
<div class="container">
    <div class="row">
        @if(session('success'))
        <div class="alert alert-success mt-4 text-center">
            <strong>¡Éxito!</strong> {{ session('success') }}
        </div>
        @endif
        <div class="col-lg-12 mt-4 text-center justify-content-center align-content-center align-items-center"
            style="background-color: rgba(255, 255, 255, 0.8); border-radius:30px">
            <table class="table mt-4">
                <thead class="table-dark">
                    <th>Nombre</th>
                    <th>Placa</th>
                    <th>Fecha</th>
                    <th>Vehiculo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($citas as $cita )
                    <tr>
                        <td>{{ $cita->nombre_propie }}</td>
                        <td>{{ $cita->placa }}</td>
                        <td>{{ date('m/d H:i', strtotime($cita->fecha_inicio_cita))}}</td>
                        <td>{{ $cita->tipovehiculo->nombre }}</td>
                        <td>{{ $cita->estado }}</td>
                        @if($cita->estado === 'pendiente')
                        <td>
                            <form action="{{ route('cambiarestado',$cita->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro?');">
                                @method('PUT')
                                @csrf
                                <button name="estado" value="confirmada" class="btn btn-success">Aceptar</button>
                                <button name="estado" value="cancelada" class="btn btn-danger">Rechazar</button>
                            </form>
                        </td>
                        @elseif ($cita->estado === 'confirmada')
                        <td>
                            <form action="{{ route('cambiarestado',$cita->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro?');">
                                @method('PUT')
                                @csrf
                                <button name="estado" value="completada" class="btn btn-primary">Completar</button>
                            </form>
                        </td>
                        @elseif($cita->estado === 'cancelada')
                        <td>
                            <h6 style="font-size: 15px;background-color:red; border-radius:10px">Cita rechazada</h6>
                        </td>
                        @else
                        <td></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
@endsection
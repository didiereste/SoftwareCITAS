@extends('layaout.navbar')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-4 text-center justify-content-center align-content-center align-items-center"
            style="background-color: rgba(255, 255, 255, 0.8); border-radius:30px">
            <table class="table mt-4">
                <thead class="table-dark">
                    <th>Nombre</th>
                    <th>Placa</th>
                    <th>Fecha</th>
                    <th>Vehiculo</th>
                    <th>Estado</th>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita->nombre_propie }}</td>
                        <td>{{ $cita->placa }}</td>
                        <td>{{ date('m/d H:i', strtotime($cita->fecha_inicio_cita)) }}</td>
                        <td>{{ $cita->tipovehiculo->nombre }}</td>
                        <td class="estado-celda">{{ $cita->estado }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var celdasEstado = document.querySelectorAll('.estado-celda');
    
            celdasEstado.forEach(function(celda) {
                var estado = celda.innerText.trim().toLowerCase();
    
                switch (estado) {
                    case 'pendiente':
                        celda.style.backgroundColor = 'orange';
                        break;
                    case 'confirmada':
                        celda.style.backgroundColor = 'green';
                        break;
                    case 'cancelada':
                        celda.style.backgroundColor = 'red';
                        break;
                    case 'completada':
                        celda.style.backgroundColor = 'blue';
                        break;
                    default:
                        break;
                }
            });
        });
    </script>
    
</div>


@endsection
@extends('layaout.navbar')
@section('contenido')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <form action="" id="miformulario">
        <div class="row">
            <div class="col-lg-5 mt-4">
                <div class="text-center" style="background-color:rgba(255, 255, 255, 0.8)">
                    <h6 ><strong>Horario de atencion</strong></h6>
                </div>
                <table class="table">
                    <thead class="table-dark">
                        <td>Dia</td>
                        <td>Hora inicio</td>
                        <td>Hora fin</td>
                    </thead>
                    <tbody style="background-color: rgba(255, 255, 255, 0.8)">
                        @foreach ($horarios as $horarioDia)
                            <tr>
                                <th>{{ $horarioDia->dia_semana }}</th>
                                <th>{{ $horarioDia->hora_inicio }}</th>
                                <th>{{ $horarioDia->hora_fin }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-1">

            </div>
            <div class="col-lg-4 mt-4 border border-dark"
                style="width:auto;height:auto; background-color: rgba(255, 255, 255, 0.8); border-radius:30px">
                <h6 class="mt-4"><strong>Solicitar cita</strong></h6>
                <div class="row">
                    <div class="col-md-6 mt-4 mb-4">
                        <label for="">Nombre dueño</label>
                        <input type="text" class="form-control" name="nombre_propie" id="nombre_propie">
                    </div>
                    <div class="col-md-6 mt-4 mb-4">
                        <label for="">Placa Vehiculo</label>
                        <input type="text" class="form-control" name="placa" id="placa">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2 mb-4">
                        <label for="">Cilindraje</label>
                        <input type="text" class="form-control" name="cilindraje" id="cilindraje">
                    </div>
                    <div class="col-md-6 mt-2 mb-4">
                        <label for="">Servicio</label>
                        <select name="servicio" id="servicio" class="form-control">
                            <option value="mantenimiento">Mantenimiento</option>
                            <option value="diagnostico">Diagnóstico</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2 mb-4">
                        <label for="">Tipo Vehiculo</label>
                        <select name="tipo_vehiculo" id="tipo_vehiculo" class="form-control">
                            @foreach ($tiposvehiculos as $tipovehiculo)
                            <option value="{{ $tipovehiculo->id }}">{{ $tipovehiculo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mt-2 mb-4">
                        <label for="">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="2"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2 mb-4">
                        <label for="">Fecha</label>
                        <input type="date" id="fecha_inicio_cita" name="fecha_inicio_cita" class="form-control">
                    </div>
                    <div class="col-md-6 mt-2 mb-4">
                        <label for="">Hora</label>
                        <input type="time" name="horaLocal" id="horaLocal" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <button class="btn btn-warning" type="submit" id="enviar"><strong>Solicitar</strong></button>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>

<script>
    const enviar=document.getElementById('enviar');
        const nombre_propie=document.getElementById('nombre_propie');
        const placa=document.getElementById('placa');
        const cilindraje=document.getElementById('cilindraje');
        const servicio=document.getElementById('servicio');
        const descripcion=document.getElementById('descripcion');
        const fecha=document.getElementById('fecha_inicio_cita');
        const hora=document.getElementById('horaLocal')
        const tipo_vehiculo=document.getElementById('tipo_vehiculo')

        enviar.addEventListener('click', function(e){
            e.preventDefault();
           
            const valueNombre_propie = nombre_propie.value;
            const valuePlaca = placa.value;
            const valueCilindraje = cilindraje.value;
            const valueServicio = servicio.value;
            const valueDescripcion = descripcion.value;
            const valueFecha = fecha.value;
            const valueHora = hora.value;
            const valueTipoVehiculo= tipo_vehiculo.value;

            const token = document.querySelector('meta[name="csrf-token"]').content;

            
            fetch('/pedircita', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'X-CSRF-TOKEN': token,
                },
                body: JSON.stringify({
                    nombre_propie:valueNombre_propie,
                    placa:valuePlaca,
                    cilindraje:valueCilindraje,
                    servicio:valueServicio,
                    descripcion:valueDescripcion,
                    fecha:valueFecha,
                    hora:valueHora,
                    tipo_vehiculo:valueTipoVehiculo,
                }),
            })
            .then(response => response.json())
            .then(data => {
                    if(data.error){
                        alert('Error: ' + data.error)
                    }else if(data.exito){
                        alert('Exito: ' + data.exito);
                        location.reload();
                    }
                    else{
                        alert('Respuesta inesperada')
                    }
            }).catch(error=>{
                console.log('Error al tratar de solicitar la cita')

            })
        });
</script>
</div>

@endsection
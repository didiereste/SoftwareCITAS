@extends('layaout.navbar')
@section('contenido')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-2 mt-4">
            <div class="Informacion" style="background-color: rgba(255, 255, 255, 0.9);border-radius: 20px">
                <div class="header text-center" style="background-color: black; border-radius:20px">
                    <strong style="color: white">Indices</strong>
                </div>
                <div class="body">
                    <ul>
                        <li>Pendiente <span class="naranja"></span></li>
                        <li>Confirmada <span class="verde"></span></li>
                        <li>Completada <span class="azul"></span></li>
                        <li>Cancelada <span class="roja"></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8" style="margin-left: 50px">
            <div class="mt-4 mb-4" id="calendari">

            </div>
        </div>
    </div>
</div>
<style>
    #calendari {
        background-color: rgba(255, 255, 255, 0.8); /* Cambia este color al que desees */
        border-radius: 20px
    }
    .fc-day, .fc-day-number {
            background-color: ; /* Cambia "yourColor" al color deseado para los días y números de la semana */
            color: black; /* Cambia este color al texto deseado, por ejemplo, blanco */
        }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        var calendarEl = document.getElementById('calendari');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            editable: true,
            selectable: true,
            events: {!! $eventos !!},
            eventClick: function(info) {
                alert('Información de la cita:\n' +
                    'Duracion: ' + info.event.title + '\n' +
                    'Fecha: ' + info.event.start.toLocaleDateString() + '\n' )
            }
        });
        calendar.render();
    })
</script>
<style>
    .naranja{
        display: inline-block;
        margin-left: 25px;
        width: 15px;
        height: 8px;
        background-color: #FFD700;
    }

    .verde{
        display: inline-block;
        margin-left: 9px;
        width: 15px;
        height: 8px;
        background-color: #3DE340;
    }

    .azul{
        display: inline-block;
        margin-left: 4px;
        width: 15px;
        height: 8px;
        background-color: #87CEEB;
    }

    .roja{
        display: inline-block;
        margin-left: 16px;
        width: 15px;
        height: 8px;
        background-color: #DC143C;
    }

</style>
@endsection
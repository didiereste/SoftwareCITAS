@extends('layaout.navbar')
@section('contenido')

<div class="container">
    <form action="">
        <div class="row text-center justify-content-center align-content-center align-items-center">
            <div class="col-lg-8 mt-4 border border-dark"
                style="width:300px;height:auto; background-color: rgba(255, 255, 255, 0.8); border-radius:30px">
                <h6 class="mt-4"><strong>Solicitar cita</strong></h6>
                <div class="row">
                    <div class="col-md-6 mt-4 mb-4">
                        <label for="">Nombre dueño</label>
                        <input type="text" class="form-control" name="nombre_producto" required>
                    </div>
                    <div class="col-md-6 mt-4 mb-4">
                        <label for="">Placa Vehiculo</label>
                        <input type="text" class="form-control" name="nombre_producto" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2 mb-4">
                        <label for="">Marca</label>
                        <input type="text" class="form-control" name="nombre_producto" required>
                    </div>
                    <div class="col-md-6 mt-2 mb-4">
                        <label for="">Modelo</label>
                        <input type="text" class="form-control" name="nombre_producto" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <button class="btn btn-warning" type="submit">Solicitar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>


@endsection
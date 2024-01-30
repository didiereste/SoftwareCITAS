@extends('layaout.navbar')
@section('contenido')
<div class="row  text-center justify-content-center align-content-center align-items-center">
    @if(session('success'))
    <div class="alert alert-success mt-4 text-center">
        <strong>¡Éxito!</strong> {{ session('success') }}
    </div>
    @endif
    <div class="col-lg-8 mt-4" style="background-color: rgba(255, 255, 255, 0.8); border-radius:30px">
        <table class="table mt-4">
            <thead class="table-dark">
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        @foreach ($usuario->roles as $rol)
                        {{ $rol->name }}
                        @endforeach
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning d-inline" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $usuario->id }}">
                            Editar
                        </button>
                        <form action="{{ route('eliminarUser',$usuario->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <div class="modal fade" id="exampleModal{{ $usuario->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('update', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas actualizar este usuario?');">
                                            @method('PUT')
                                            @csrf
                                            <label for=""><strong>Nombre</strong></label>
                                            <input type="text" class="form-control mt-2" name="name"
                                                value="{{ $usuario->name }}" required>
                                            <label for="" class="mt-2"><strong>Email</strong></label>
                                            <input type="email" class="form-control mt-2" name="email"
                                                value="{{ $usuario->email }}" required>
                                            <label for="" class="mt-2"><strong>Rol</strong></label>
                                            <select name="rol" id="" class="form-control mt-2">
                                                @foreach ($roles as $rol)
                                                <option value="{{ $rol->name}}">{{ $rol->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
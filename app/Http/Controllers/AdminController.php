<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administrar');
    }


    public function gestioncitas()
    {
        $citas = Cita::all();
        return view('admin.gestion', compact('citas'));
    }

    public function cambiarestado(Request $request, string $id)
    {
        $cita = Cita::find($id);

        $cita->estado = $request->input('estado');

        $cita->update();

        return redirect()->route('gestioncitas')->with('success', 'El estado de la cita se ha actualizado correctamente');
    }

    public function gestionusers()
    {
        $usuarios = User::all();
        $roles = Role::all();

        return view('admin.usuarios', compact('usuarios', 'roles'));
    }

    public function updateUser(Request $request, string $id)
    {
        $usuario = User::find($id);

        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');

        $usuario->save();

        $nuevoRol = $request->input('rol');

        $usuario->syncRoles([$nuevoRol]);

        return redirect()->route('usuarios')->with('success', 'El usuario se ha actualizado correctamente');
    }


    public function deleteUser(string $id)
    {
        $usuario= User::find($id);

        $usuario->delete();

        return redirect()-> route('usuarios')->with('success', 'El usuario se ha eliminado correctamente');
    }

    public function calendario()
    {
        $citas= Cita::all();

        $eventos = [];

        foreach($citas as $cita){
            $estado=$cita->estado;

            //convertir las cadenas a objetos DateTime
            $start = new \DateTime($cita->fecha_inicio_cita);
            $end= new \DateTime($cita->fecha_fin_cita);

            //color dependiendo del estado
            //'confirmada','cancelada','completada'
            switch ($estado) {
                case 'pendiente':
                    $color = '#FFD700';
                    break;
                case 'confirmada':
                    $color = '#3DE340';
                    break;
                case 'completada':
                    $color = '#87CEEB';
                    break;
                case 'cancelada';
                    $color = '#DC143C';
                    break;
                default:
                    $color = '#3DD9DA';
                    break;
            }

            //formatear las fechas
            $inicioFormateada= $start->format('Y-m-d');
            $endFormateada= $end->format('Y-m-d');

            $horainicio= $start->format('H:i');
            $horaFin= $end->format('H:i');

            $eventos[] = [
                'title' => $horainicio . ' a ' . $horaFin,
                'start' => $inicioFormateada,
                'end' => $endFormateada,
                'backgroundColor' => $color,
            ];
        }
        return view('admin.calendario', compact('citas'))->with('eventos', json_encode($eventos));
    }
}

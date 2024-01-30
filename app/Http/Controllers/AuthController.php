<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('email', 'password');

        if (Auth::attempt($credenciales)) {
            return redirect()->route('bienvenido');
        } else {
            return redirect()->route('login')->with('error', 'Las credenciales son incorrectas');
        }
    }

    public function registro(Request $request)
    {
        
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);
        
            $usuario = User::create($request->all());
            $rol = Role::findById(2);
            $usuario->syncRoles([$rol]);
        
            return redirect()->route('login')->with('success', 'Registrado correctamente');
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

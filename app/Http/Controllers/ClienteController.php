<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function miscitas()
    {
        $citas=Cita::where('user_id', Auth::id())
                    ->get();
        return view('clientes.miscitas', compact('citas'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Paciente;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $a = Paciente::count();
       $b = Paciente::query()->where('status', 'Activo')->count();
       $c = Agenda::query()->where('estado', 'Pendiente')->count();
       $d = Agenda::count();
        return view('inicio', compact('a', 'b', 'c', 'd'));
    }
}

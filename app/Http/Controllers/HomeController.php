<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Paciente;
use Carbon\Carbon;
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
        date_default_timezone_set('America/Mexico_City');
        $now = Carbon::now()->format('Y-m-d');
      
        $a = Paciente::count();
       $b = Paciente::query()->where('status', 'Activo')->count();
       $c = Agenda::query()->where('estado', 'Pendiente')->count();
       $d = Agenda::all()->toArray();
        $res = array_filter($d, function ($cita) use ($now) {
            $fechaParse = Carbon::parse($cita['start'])->format('Y-m-d');
            return $fechaParse  == $now;
        });
       $nowAppointments = count($res);
        return view('inicio', compact('a', 'b', 'c', 'nowAppointments'));
    }
}

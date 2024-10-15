<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $especialidad_user = auth()->user()->especialidad_id;
        $query = Paciente::query()->where('id_especialidad', $especialidad_user)->get();
        $pacientes = $query;
        return view('agenda.agenda', compact('pacientes'));
    }


    public function getPacientes()
    {
        $especialidad_user = auth()->user()->especialidad_id;
        $query = Paciente::query()->where('id_especialidad', $especialidad_user)->get();
        $pacientes = $query;
        return $pacientes;
    }
}

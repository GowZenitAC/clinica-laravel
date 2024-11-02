<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $especialidad_usuario = auth()->user()->especialidad_id;
        $agenda = Agenda::leftJoin('pacientes', 'agenda.id_paciente', '=', 'pacientes.id')
                    ->leftJoin('especialidades', 'pacientes.id_especialidad', '=', 'especialidades.id')
                    ->select('agenda.*')
                    ->where('especialidades.id', $especialidad_usuario)
                    ->orWhereNotNull('agenda.nombre_paciente')
                    ->get();
        return $agenda;   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'id_paciente' => 'nullable',
            'nombre_paciente' => 'nullable',
            'estado' => 'nullable',
        ]);

        Agenda::create([
            'title' => $request->title,
            'start' => $request->start,
            'id_paciente' => $request->id_paciente,
            'nombre_paciente' => $request->nombre_paciente,
            'estado' => $request->estado
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'id_paciente' => 'required',
        ]);
      $agenda =  Agenda::findOrFail($id);
      $agenda->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
    }

    public function confirmAsistance(Request $request, string $id){
        $request->validate([
            'estado' => 'required',
        ]);
        $agenda =  Agenda::findOrFail($id);
        $agenda->update([
            'estado' => 'Asistió'
        ]);
    }
}

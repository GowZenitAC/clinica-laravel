<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Especialidad;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       $pacientes = Paciente::pacientesFilter();
        return view('pacientes.pacientes', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $especialidad_user = Especialidad::especialidadUser();
        return view('pacientes.pacientes-create', compact('especialidad_user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        //convertir a tipo entero
        $id_es = $request->id_especialidad;
        $id_es_convert = intval($id_es);
        

        $request->validate([
            'nombre' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'diagnostico' => 'required',
            'historial' => 'required',
            'observaciones' => 'required',
            'fecha_valoracion' => 'required',
            'seguimiento' => 'required',
            'id_especialidad' => 'required',
        ]);

        

     
        Paciente::create([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'diagnostico' => $request->diagnostico,
            'historial' => $request->historial,
            'fecha_valoracion' => $request->fecha_valoracion,
            'observaciones' => $request->observaciones,
            'seguimiento' => $request->seguimiento,
            'id_especialidad' => $id_es_convert,
        ]);
        toastify()->success('Equipo creado correctamente', [
            'duration' => 3500,
            'position' => 'right',
            'width' => 400,
        ]);
         return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pacientes = Paciente::findOrFail($id);
        $citas_count = Agenda::with('paciente')->where('id_paciente', $id)->count();
        return view('pacientes.pacientes-show', compact('pacientes', 'citas_count'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pacientes = Paciente::findOrFail($id);
        $especialidad_user = Especialidad::especialidadUser();
        return view('pacientes.pacientes-edit', compact('pacientes', 'especialidad_user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $pacientes = Paciente::findOrFail($id);
        $pacientes->update($request->all());
        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        toastify()->success('Registro eliminado correctamente', [
            'duration' => 3500,
            'position' => 'right',
            'width' => 400,
        ]);
        $pacientes = Paciente::findOrFail($id);
        $pacientes->delete();
        return redirect()->route('pacientes.index');
    }
}

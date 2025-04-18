<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Especialidad;
use App\Models\InformacionMedica;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;

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


       $validated = $request->validate([
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
            'status' => 'required',
            'citas_a_tomar' => 'required',
        ]);

        
        try { 
            // Usar una transacción para garantizar consistencia
            return DB::transaction(function () use ($validated, $request) {
                // Convertir id_especialidad a entero (esto ya lo haces bien)
                $id_es_convert = intval($request->id_especialidad);
                
                // Crear el paciente y obtener el modelo recién creado
                $paciente = Paciente::create([
                    'nombre' => $validated['nombre'],
                    'fecha_nacimiento' => $validated['fecha_nacimiento'],
                    'genero' => $validated['genero'],
                    'direccion' => $validated['direccion'],
                    'telefono' => $validated['telefono'],
                    'id_especialidad' => $id_es_convert,
                    'status' => $validated['status'],
                ]);
    
                // Preparar los datos para informacion_medica
                $informacionMedicaData = [
                    'paciente_id' => $paciente->id, // Usar el ID del paciente recién creado
                    'diagnostico' => $validated['diagnostico'],
                    'historial' => $validated['historial'],
                    'primera_valoracion' => $validated['fecha_valoracion'], // Ajustar el nombre del campo
                    'observaciones' => $validated['observaciones'],
                    'seguimiento' => $validated['seguimiento'],
                    'citas_a_tomar' => $validated['citas_a_tomar'],
                ];
    
                // Instanciar el InformacionMedicaController y llamar a un método personalizado
                $informacionMedicaController = new InformacionMedicaController();
                $informacionMedicaController->store($informacionMedicaData);
    
                // Mostrar mensaje de éxito
                toastify()->success('Paciente e información médica creados correctamente', [
                    'duration' => 3500,
                    'position' => 'right',
                    'width' => 400,
                ]);
    
                return redirect()->route('pacientes.index');
            });
        } catch (\Exception $e) {
            // Manejar errores y mostrar mensaje
            toastify()->error('Error al crear el paciente: ' . $e->getMessage(), [
                'duration' => 3500,
                'position' => 'right',
                'width' => 400,
            ]);
    
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pacientes = Paciente::with('infoMedica')->findOrFail($id);
        // dd($pacientes);
        $citas_paciente_hechas = Paciente::citasHechas($id);
        return view('pacientes.pacientes-show', compact('pacientes', 'citas_paciente_hechas'));
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

    public function updateAppointments(Request $request, string $id){
        $request->validate([
            'citas_a_tomar' => 'required',
        ]);
        $pacientes =  Paciente::with('infoMedica')->findOrFail($id);
        dd($pacientes->infoMedica->citas_a_tomar);
        $pacientes->update([
            'citas_a_tomar' => $pacientes->citas_a_tomar + $request->citas_a_tomar
        ]);
    }
}

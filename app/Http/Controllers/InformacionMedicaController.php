<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformacionMedica;

class InformacionMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(array $data)
    {
        return InformacionMedica::create([
            'paciente_id' => $data['paciente_id'],
            'diagnostico' => $data['diagnostico'],
            'historial' => $data['historial'],
            'primera_valoracion' => $data['primera_valoracion'],
            'seguimiento' => $data['seguimiento'],
            'observaciones' => $data['observaciones'],
            'citas_a_tomar' => $data['citas_a_tomar']
        ]);
        // dd($informacionMedica);
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

@extends('layout.app')

@section('title', "Detalles del Paciente: $pacientes->nombre")

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/pacientes-show.css') }}">
<div class="container bg-white rounded ">
<form>
        @csrf
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Información Personal -->
                    <h4>Información Personal</h4>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group row">
                                <label for="nombre">Nombre (completo)</label>
                                <span>{{ $pacientes->nombre }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group row">
                                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                                <span>{{ $pacientes->fecha_nacimiento }}</span>
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group row">
                                <label for="genero">Género</label>
                                <span>{{ $pacientes->genero }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group row">
                                <label for="direccion">Dirección</label>
                                <span>{{ $pacientes->direccion }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group row">
                                <label for="telefono">Teléfono</label>
                                <span>{{ $pacientes->telefono }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Información  -->
                    <h5>Informacion Médica</h5>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="documentosAdjuntos">Diagnóstico</label>
                                <textarea readonly class="form-control" id="alergias" name="observaciones" rows="3" placeholder="Escriba las observaciones">{{ $pacientes->diagnostico }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="alergias">Observaciones</label>
                                <textarea class="form-control" readonly  id="alergias" name="observaciones" rows="3" placeholder="Escriba las observaciones">{{ $pacientes->observaciones }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="alergias">Seguimiento</label>
                                <textarea class="form-control" readonly id="alergias" name="seguimiento" rows="2" placeholder="Seguimiento..."> {{ $pacientes->seguimiento }}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="historialMedico">Historial Médico</label>
                                <textarea readonly class="form-control" id="alergias" name="historial" rows="3" placeholder="Escriba el historial medico"> {{ $pacientes->historial }}</textarea>
                            </div>
                          
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group row">
                                <label for="fechaNacimiento">Fecha de Valoración</label>
                                <span>{{ $pacientes->fecha_valoracion }}</span>
                            </div>
                          
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group row">
                                <label for="fechaNacimiento">Citas a tomar (hasta nueva valoración)</label>
                                <span>0/{{$pacientes->citas_a_tomar}}</span>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <a href="{{ route('pacientes.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
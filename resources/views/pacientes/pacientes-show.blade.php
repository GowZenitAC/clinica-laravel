@extends('layout.app')

@section('title', "Detalles del Paciente: {$pacientes->nombre}")

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/pacientes-show.css') }}">
<div class="container bg-white rounded">
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

                    <!-- Información Médica -->
                    <h5>Información Médica</h5>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="diagnostico">Diagnóstico</label>
                                <textarea readonly class="form-control" id="diagnostico" name="diagnostico" rows="3" placeholder="Sin diagnóstico">{{ $pacientes->infoMedica->diagnostico ?? 'No disponible' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="observaciones">Observaciones</label>
                                <textarea readonly class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Sin observaciones">{{ $pacientes->infoMedica->observaciones ?? 'No disponible' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="seguimiento">Seguimiento</label>
                                <textarea readonly class="form-control" id="seguimiento" name="seguimiento" rows="2" placeholder="Sin seguimiento">{{ $pacientes->infoMedica->seguimiento ?? 'No disponible' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="historialMedico">Historial Médico</label>
                                <textarea readonly class="form-control" id="historial" name="historial" rows="3" placeholder="Sin historial médico">{{ $pacientes->infoMedica->historial ?? 'No disponible' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group row">
                                <label for="fechaValoracion">Fecha de Valoración</label>
                                <span>{{ $pacientes->infoMedica->primera_valoracion ?? 'No disponible' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            @include('components.edit-icon')
                            <label for="citasATomar">Citas a tomar (hasta nueva valoración)</label>
                            <p class="citasContainer">
                                <span id="citasTomadas">{{ $citas_paciente_hechas }}</span>/<span id="citasTotales">{{ $pacientes->infoMedica->citas_a_tomar }}</span>
                            </p>
                            @include('components.edit_cita_tomar')
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

@push('scripts')
<script src="{{ asset('assets/js/pacientes/pacientes-show.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endpush
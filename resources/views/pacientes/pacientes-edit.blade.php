@extends('layout.app')

@section('title', 'Editar Paciente')

@section('content')

<div class="row">
    <form action="{{ route('pacientes.update', $pacientes->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Información Personal -->
                    <h5>Información Personal</h5>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="nombre">Nombre (completo)</label>
                                <input type="text" class="form-control" value="{{ $pacientes->nombre }}" name="nombre" id="nombre" placeholder="Ingrese el nombre del paciente" />
                            </div>
                            @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                                <input type="date" value="{{ $pacientes->fecha_nacimiento }}" class="form-control" name="fecha_nacimiento" id="fechaNacimiento" />
                            </div>
                            @error('fechaNacimiento')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="genero">Género</label>
                                <select name="genero" class="form-control" id="genero">
                                    <option disabled value="">Seleccionar</option>
                                    <option value="masculino" {{ $pacientes->genero == 'masculino' ? 'selected' : ''}}>Masculino</option>
                                    <option value="femenino" {{ $pacientes->genero == 'femenino' ? 'selected' : ''}}>Femenino</option>
                                    <option value="otro" {{ $pacientes->genero == 'otro' ? 'selected' : ''}}>Otro</option>
                                </select>
                            </div>
                            @error('genero')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" value="{{ $pacientes->direccion }}" name="direccion" class="form-control" id="direccion" placeholder="Ingrese la dirección" />
                            </div>
                            @error('direccion')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" value="{{ $pacientes->telefono }}" name="telefono" class="form-control" id="telefono" placeholder="Ingrese el número de teléfono" />
                            </div>
                            @error('telefono')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="citasTomar">Citas a Tomar (hasta nueva valoracion)</label>
                                <input type="number" value="{{ $pacientes->citas_a_tomar }}" name="citas_a_tomar" class="form-control" id="citasTomar" placeholder="Ingrese el número de terapias a tomar" />
                            </div>
                            @error('telefono')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Información  -->
                    <h5>Informacion Médica</h5>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="documentosAdjuntos">Diagnóstico</label>
                                <input type="text" value="{{ $pacientes->diagnostico }}" name="diagnostico" class="form-control" id="direccion" placeholder="Diagnóstico" />
                            </div>
                            @error('diagnostico')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="alergias">Observaciones</label>
                                <textarea class="form-control" id="alergias" name="observaciones" rows="3" placeholder="Escriba las observaciones">{{ $pacientes->observaciones }}</textarea>
                            </div>
                            @error('observaciones')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="alergias">Seguimiento</label>
                                <textarea class="form-control"  id="alergias" name="seguimiento" rows="2" placeholder="Seguimiento...">{{ $pacientes->seguimiento }}</textarea>
                            </div>
                            @error('seguimiento')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="historialMedico">Historial Médico</label>
                                <textarea class="form-control" id="alergias" name="historial" rows="3" placeholder="Escriba el historial medico"> {{ $pacientes->historial }}</textarea>
                            </div>
                            @error('historial')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="fechaNacimiento">Fecha de Valoración</label>
                                <input type="date" value="{{ $pacientes->fecha_valoracion }}" name="fecha_valoracion" class="form-control" id="fechaValoracion" />
                            </div>
                            @error('fechaValoracion')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="nombre">Especialidad</label>
                                <input hidden type="text" class="form-control" name="id_especialidad" id="id_especialidad" value="{{ $especialidad_user->id }}" />
                                <input readonly type="text" class="form-control" id="especialidad" value="{{ $especialidad_user->nombre }}" />
                            </div>
                            @error('id_especialidad')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('pacientes.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

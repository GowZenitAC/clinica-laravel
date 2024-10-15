@extends('layout.app')

@section('title', 'Añadir Paciente')

@section('content')

<div class="row">
    <form action="{{ route('pacientes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Información Personal -->
                    <h5>Información Personal</h5>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="nombre">Nombre (completo)</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del paciente" />
                            </div>
                            @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nacimiento" id="fechaNacimiento" />
                            </div>
                            @error('fechaNacimiento')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="genero">Género</label>
                                <select name="genero" class="form-control" id="genero">
                                    <option value="">Seleccionar</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="otro">Otro</option>
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
                                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Ingrese la dirección" />
                            </div>
                            @error('direccion')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="Ingrese el número de teléfono" />
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
                                <input type="text" name="diagnostico" class="form-control" id="direccion" placeholder="Diagnóstico" />
                            </div>
                            @error('diagnostico')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="alergias">Observaciones</label>
                                <textarea class="form-control" id="alergias" name="observaciones" rows="3" placeholder="Escriba las observaciones"></textarea>
                            </div>
                            @error('observaciones')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="alergias">Seguimiento</label>
                                <textarea class="form-control" id="alergias" name="seguimiento" rows="2" placeholder="Seguimiento..."></textarea>
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
                                <textarea class="form-control" id="alergias" name="historial" rows="3" placeholder="Escriba el historial medico"></textarea>
                            </div>
                            @error('historial')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="fechaNacimiento">Fecha de Valoración</label>
                                <input type="date" name="fecha_valoracion" class="form-control" id="fechaValoracion" />
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
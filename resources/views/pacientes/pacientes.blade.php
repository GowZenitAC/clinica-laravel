@extends('layout.app')

@section('title', 'Mis Pacientes')

@section('content')
<div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Añadir Paciente</h4>
                      <a
                        href="{{ route('pacientes.create') }}"
                        class="btn btn-primary btn-round ms-auto"
                      >
                        <i class="fa fa-plus"></i>
                      Añadir Paciente
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                   

                    <div class="table-responsive">
                      <table
                        id="pacientes-table"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Paciente</th>
                            <th>Especialidad</th>
                            <th>Diagnostico</th>
                            <th style="width: 10%">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($pacientes as $paciente)
                          <tr>
                            <td>{{ $paciente->nombre }}</td>
                            <td>{{ $paciente->especialidades->nombre }}</td>
                            <td>{{ $paciente->diagnostico }}</td>
                            <td>
                              <div class="form-button-action">
                              <a
                                  type="button"
                                  href="{{ route('pacientes.show', $paciente->id) }}"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-success"
                                  data-original-title="Remove"
                                >
                                  <i class="fa fa-eye"></i>
                              </a>
                                <a
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  href="{{ route('pacientes.edit', $paciente->id) }}"
                                  class="btn btn-link btn-primary btn-lg"
                                  data-original-title="Edit Task"
                                >
                                  <i class="fa fa-edit"></i>
                                </a>
                                <form id="formDelete" action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline">
                                  @csrf
                                  @method('DELETE')
                                  <button
                                  type="submit"
                                  class="btn btn-link btn-danger"
                                >
                                  <i class="fa fa-times"></i>
                                </button>
                                </form>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
@endsection
@push('scripts')
<script src="{{asset('assets/js/pacientes.js')}}"></script>
@endpush


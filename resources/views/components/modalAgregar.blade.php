<div id="myModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Añadir Cita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="horarioPaciente">Horario de la cita: <span id="horario"></span></p>
        <p id="fechaPaciente">Fecha de la cita: <span id="fecha"></span></p>
        <label for="">Asunto</label>
        <input placeholder="Ingresa un asunto para la cita" class="form-control mb-4" type="text" name="paciente" id="pacienteInput">
          <select name="" id="selectPaciente">
            <option disabled selected value="">Seleccionar Paciente</option>
            @foreach($pacientes as $paciente)
            <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
            @endforeach
          </select>
          <input class="form-check-input mx-2 my-3" type="checkbox" name="" id="checkPaciente">
          <label class="my-2" for="">¿No esta registrado el paciente?</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" onclick="saveCita()" class="btn btn-primary">Guardar Cita</button>
      </div>
    </div>
  </div>
</div>
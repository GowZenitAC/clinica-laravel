<div id="modalEdit" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de la Cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="pacienteInputEditar">Paciente:</label>
                    <input type="text" class="form-control" id="pacienteInputEditar" disabled>
                </div>
                <div class="form-group">
                    <label for="titleInputEditar">Asunto:</label>
                    <input type="text" class="form-control" id="titleInputEditar">
                </div>
                <div class="form-group">
                    <label for="fechaInputEditar">Fecha:</label>
                    <input type="date" class="form-control" id="fechaInputEditar">
                </div>
                <div class="form-group">
                    <label for="horaInputEditar">Hora:</label>
                    <input type="time" class="form-control" id="horaInputEditar">
                </div>
            </div>
            <div class="modal-footer">
             <input type="checkbox" name="" class="form-check-input" id="">   
             <label for="">Confirmar asistencia</label>
            <button type="button" id="deleteCita" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="editCita()" class="btn btn-primary">Editar Cita</button>
            </div>
        </div>
    </div>
</div>
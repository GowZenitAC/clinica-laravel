<div class="filtroMes">
    <label id="label-mes" for="mes" class="me-2">Selecciona un mes:</label>
    <input type="month" class="form-control me-2" name="mes" id="input-mes">
    <button type="button" id="filtrar-mes" class="btn btn-primary">Filtrar</button>
</div>
<div class="filtroYear">
    <label id="label-year" for="mes" class="me-2">Selecciona un año:</label>
    <input type="number" id="input-year" name="year" min="2016" max="2100" placeholder="2024" class="form-control me-2" step="1">
    <button id="filtrar-year" type="button" class="btn btn-primary">Filtrar</button>
</div>
<div class="filtroDate">
    <label id="label-date" for="mes" class="me-2">Selecciona una fecha:</label>
    <input type="date" class="form-control me-2" name="year" id="input-date">
    <button id="filtrar-date" type="button" class="btn btn-primary">Filtrar</button>
</div>
<button class="btn btn-danger ms-4" id="limpiarFiltros">
    Limpiar
    <i class="
fas fa-window-close ms-2"></i>
</button>
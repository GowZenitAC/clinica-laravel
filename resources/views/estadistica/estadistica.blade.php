@extends('layout.app')
@section('title', 'Estadistica')
@section('content')
<div class="container-fluid bg-white rounded ">
    <section>
        <section id="filtros" class="d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center">
                <label for="mes" class="me-2">Filtrar por:</label>
                <select class="form-select me-2" name="" id="select-tipo">
                    <option selected disabled value="">Seleccione</option>
                    <option value="mes">Mes</option>
                    <option value="year">Año</option>
                    <option value="dia">Fecha Especifica</option>
                </select>
            <!-- @include('components.filtros.filtro-mes')
            @include('components.filtros.filtro-year')
            @include('components.filtros.filtro-date') -->
            @include('components.filtros.filtros')
            </div>
        </section>
    </section>
    <section>
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/plugin/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/js/estadistica/estadistica.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.5/dist/chart.umd.min.js"></script>
@endpush
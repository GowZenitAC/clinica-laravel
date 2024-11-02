@extends('layout.app')

@section('title', 'Citas')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/agenda.css')}}">
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

<!--  Modal Container -->
@include('components.modalAgregar')
@include('components.modalEditar')
    
<div id="calendar"></div>
@endsection
@push('scripts')
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('assets/js/plugin/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/moment/moment-timezone-with-data.min.js')}}"></script>
<script src="{{ asset('assets/js/plugin/moment/moment-with-locales.js')}}"></script>
<script src="{{asset('assets/js/agenda/agenda.js')}}"></script>
@endpush
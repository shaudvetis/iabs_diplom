@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.controlmodyl')
@section ('content')

<style>
 table {
  border: 1px solid #dee2e6;
 }
th {
border-radius: 0.25rem;
border: 1px solid #dee2e6;
text-align: center;
}
td {
border: 1px solid #dee2e6;
text-align: center;
}
thead {
color: #495057;
background-color: #e9ecef;
border-color: #dee2e6;
}
</style>
<div class="card card-info">
 <div class="card-header">
  <!-- Подключаются кнопки курсов и десятков -->
@include('admink.include.naprav_settings.course_select') 
   <div class="card-tools" >
    <a href="{{asset('gnoynay')}}">Назад</a>
   </div>
 </div>

@if (isset($_GET))
@include('admink.include.controlmodul.index_controlmodul')
@endisset

@endsection
@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.ballstartcont')
@section ('content')

<style>
 table {
 width: 100%;
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

<!-- Два блока в котором держатся две формы, один блок закрывается в самом конце -->
<div class="card card-info ">
<div class="card-header">
<!-- Подключаются кнопки курсов и десятков -->
@include('admink.include.naprav_settings.course_select') 
   <div class="card-tools" >
    <a href="{{asset('cherevna')}}">Назад</a>
      <p> <a href="{{asset('/admink.controlmodyl.model_cherevna')}}">Контроль модуля</a></p>
   </div>
 </div>
<!-- Два блока в котором держатся форма журнала закрывается в конце-->
<div style="padding: 0;" class="card-body">
<div class="card-info aside1 layer">


@if (isset($_GET))

@include('admink.include.clinichniobs.ball_startobs')
@foreach($results1 as $user_inf)
<form  method="post" action="{{route('allcherevna.store')}}">
 {{ csrf_field() }} 
@include('admink.include.clinichniobs.ball_startobsfor')
</form>

@endforeach
</table>
</div>
</div>
</div>
@endisset
@endsection
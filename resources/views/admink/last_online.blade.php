@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.ballstartcont')
@section ('content')

<style>
 table {
 width: 80%;
 border: 1px solid #dee2e6;
 border-collapse: separate; /* Способ отображения границы */ 
 width: 100%; /* Ширина таблицы */ 
 border-spacing: 7px 11px; /* Расстояние между ячейками */ 
 margin: auto;
 }
 
th {
border-radius: 0.25rem;
border: 2px solid #dee2e6;
text-align: center;
font-size: 1.3em;
padding: 5px;
}
td {
border: 2px solid #dee2e6;
text-align: center;
font-size: 1.1em;
padding: 5px;
}
thead {
color: #495057;
background-color: #e9ecef;
border-color: #dee2e6;
}
</style>
<div class="card card-info ">
<div class="card-header">
<!-- Подключаются кнопки курсов и десятков -->
@include('admink.include.naprav_settings.course') 
</div>
</div>
<button type="button" class="btn btn-primary" >АБ</button>
<button type="button" style="background-color: #6c757d"   class="btn btn-secondary">ТХ</button>
<button type="button" class="btn btn-success">УР</button>
<button type="button" class="btn btn-danger">СХ</button>
<button type="button" class="btn btn-warning">ГХ</button>
<button type="button" class="btn btn-info">КХ</button>
<button type="button" style="background-color: #e83e8c" class="btn btn-secondary">ПР</button>
<button type="button"  style="background-color: purple" class="btn btn-secondary">ОП</button>

<table class="table-responsive" align="center">
<tr>
    <th>#</th>
    <th>Призвище</th>
    <th>Дата входу</th>
    <th>Курация хворого</th>
    <th>Нічні чергування</th>
    <th>Засвоєні навички</th>
    <th>Література</th>
    
     
 </tr>
   <?php $y=1; ?>
  @foreach ($intern as $interns)
 <tr>
<td style="background:lightgreen"><?= $y  ?></td> 
  <td>{{$interns->surname}} {{$interns->name}} {{$interns->user_id}}</td>
 
  @if (empty($interns->last_post_created_at))
  <td>Немає запису</td>
  @else
  <td>  {!!  \Carbon\Carbon::parse($interns->last_post_created_at)->format('d/m/Y H:i') !!} </td>
  @endif
 
  @if (empty($interns->date_kyracia))
  <td>Немає запису</td>
  @else
  <td style="border-color: {{$interns->color_kyr}}"  >{!!  \Carbon\Carbon::parse($interns->date_kyracia)->format('d/m/Y H:i') !!}</td>
  @endif
 
  @if (empty($interns->date_night))
  <td>Немає запису</td>
  @else
  <td>{!!  \Carbon\Carbon::parse($interns->date_night)->format('d/m/Y H:i') !!}</td>
  @endif
  
  @if (empty($interns->date_practic))
  <td>Немає запису</td>
  @else
  <td  style="border-color:  {{$interns->color_practic}}"  >{!!  \Carbon\Carbon::parse($interns->date_practic)->format('d/m/Y H:i') !!}</td>
  @endif

  @if (empty($interns->date_literatyre))
  <td>Немає запису</td>
  @else
  <td style="border-color: {{$interns->color_lit}}" >{!!  \Carbon\Carbon::parse($interns->date_literatyre)->format('d/m/Y H:i') !!}  </td>
  @endif
 
 <?php  $y++;?>
 </tr>

@endforeach


@endsection
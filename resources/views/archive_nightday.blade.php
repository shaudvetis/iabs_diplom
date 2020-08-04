@extends('layouts.base')
@include('layouts.instruction.intern.archiv_night')
@section('content')
<h3>Нічні чергування у відділенні на очному циклі</h3>
<p>
</p>
<style> 
  table {
   width: 100%;
   border: 1px solid #dee2e6;
}  
th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  }
td { 
  border: 1px solid #dee2e6;
   } 
thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
  }
  .layer {
  overflow: scroll; /* Добавляем полосы прокрутки */
   }
</style>
<!-- <div class="table"> -->
 <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Звіти по Курації хворих</h3>
          <div class="card-tools">
            <a class="btn btn-tool"  href=" {{back()->getTargetUrl()}}">Назад</a>
            <a class="btn btn-tool"  href=" {{asset('archive_nightday_print')}}">Друк</a>
          </div>
       </div>
  </div>
  <div class="card card-body">
    <div class="row" style="margin-left: 10px">
      <form role="form" method="GET">
       
          <div class="form-row">
           <p><strong>Оберіть період</strong></p>
           <div class="col">
           c: <input type="date" name="calendars" class="form-control" value="@if(isset($calendars)) {{$calendars}} @else  @endif">
          </div>
          <div class="col">
          по: <input type="date" class="form-control" name="calendarpo">
          </div>
        <div class="col">
   <input type="submit" style="margin-top:24px" class="btn btn-outline-danger" value="Показати">
 </div>
</div>
  </form>

<form role="form" method="GET">
             
   <div class="form-row">
     <div class="col">
   <p style="margin-left: 100px"><strong>Фільтр</strong>

   <input type="hidden" name="calendarpo" value="{{date('Y-m-d')}}">
   <select type="text" name="calendars" class="form-control" style="width:100px;" value="@if(isset($calendars)) {{$calendars}} @else  @endif">
    <option>  </option>
        <option value="{{date('Y-m-d',strtotime('-14 days'))}}">За 14 днів</option>
        <option value="{{date('Y-m-d',strtotime('-30 days'))}}">За 30 днів</option>
        <option value="{{date('Y-m-d',strtotime('-365 days'))}}">За рік</option>

   </select></p>
 </div>


  <div class="col">
     <!-- <input type="date" name="calendarpo"> --> 
   <input type="submit" class="btn btn-outline-danger" style="margin-top:22px " value="Показати"></p>

  </form>
</div>
</div>
</div>
  <a style="padding: 0;" class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Чергування в стаціонарному відділенні</a>
<div class="collapse" id="collapseExample">
   <table class="table-xs" >
<tr text-align="left">
   <!--  <th>ФІО інтерна</th> -->
        <th>Дата чергування</th>
        <th>База чергування</th>
        <th>Тривалість чергування</th>
        <th >Місце чергування </th>
   <!--   <th>Відділення стационар</th> -->
    <!--   <th> ФІО хворого</th> -->
      <th>№ карти стац.хворого</th>
      <th>Діагноз</th>
      <th>Операція</th>
      <th>Вид участі</th>
      <th></th>
 </tr>
  @foreach ($getdate as $nightworkdaystat)
 <tr>
 @if ($nightworkdaystat->station_work==1)
        <td>{!!  \Carbon\Carbon::parse($nightworkdaystat->date_work)->format('d/m/Y') !!}</td>
        <td>{!! $nightworkdaystat->baza !!}</td>
        <td>{!! $nightworkdaystat->time_work !!}</td>
        <td>Стаціонарне відділення</td>
       <!--  <td>{!! $nightworkdaystat->fiostacionar !!}</td> -->
        <td>{!! $nightworkdaystat->num_cardstacionar !!}</td>
        <td>{!! $nightworkdaystat->diagnosesstac !!}</td>
        <td>{!! $nightworkdaystat->oper !!}</td>
        <td>{!! $nightworkdaystat->type_workstac !!}</td>
        <td></td>
 </tr>

@endif
 @endforeach
</table>
</div>
 <h5>Звіт про чергування у приймальному відділенні</h5>
  <div class="table-responsive" style="height: 40%">
<table class="layer" >
 <thead >
  <tr>
      	<!-- <th>ФІО інтерна</th> -->
        <th>Дата чергування</th>
        <th>База чергування</th>
        <th>Тривалість чергування</th>
        <th >Місце чергування </th>
        <!-- <th>ФІО хворого</th> -->
        <th>Діагноз</th>
        <th>Відмова в госпіталізації</th>
        <th>№ запису у журналі</th>
        <th>Причина відмови</th>
        <th>Виконані маніпуляції</th>
        <th>Вид участі</th>
        <th>Госпіталізація</th>
        <th> № карти стац.хворого</th>
        <th>Виконані маніпуляції</th>
        <th>Вид участі</th>
		</tr>
		</thead>
	<tbody>
		@foreach ($getdate as $nightworkdays)
			<tr>
   @if ($nightworkdays->station_work==2)
        <td>{!!  \Carbon\Carbon::parse($nightworkdays->date_work)->format('d/m/Y') !!}</td>
				<td>{!! $nightworkdays->baza !!}</td>
        <td>{!! $nightworkdays->time_work !!}</td>
        <td>Приймальне відділення</td>
        <!-- <td>{!! $nightworkdays->fio !!}</td> -->
        <td>{!! $nightworkdays->diagnosespriom !!}</td>
    @if ($nightworkdays->otkaz==1)
        <td>Відмова в госпіталізації</td>
        @else <td>  </td>
    @endif
        <td>{!! $nightworkdays->num_cardotkaz !!}</td>
        <td>{!! $nightworkdays->prichina !!}</td>
        <td>{!! $nightworkdays->manipulaciiotkaz !!}</td>
        <td>{!! $nightworkdays->type_workotkaz !!}</td>

    @if ($nightworkdays->gosp==2)
        <td>Госпіталізація</td>
    @else <td>  </td>
    @endif
        <td>{!! $nightworkdays->num_card !!}</td>
        <td>{!! $nightworkdays->work !!}</td>
        <td>{!! $nightworkdays->type_workgosp !!}</td>
		</tr>
   @else
   @endif
			@endforeach
		</tbody>
	</table>
</div>
@endsection
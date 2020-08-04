@extends('layouts.base')
@include('layouts.instruction.intern.archiv_input_print')
@section('content')
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
@media print {
    #printButton {
        display:none;
    }
@media print {
    #nav-tab {
        display:none;
    }
}
</style>
 <a class="btn btn-light" id="printButton" href="{{back()->getTargetUrl()}}" style="float: right;"> Повернутися</a>
 <button type="button" class="btn btn-primary"  onclick="printit()" id="printButton" style="float: right;">Друк</button>
  

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Чергування в стаціонарному відділенні</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Звіт про чергування у приймальному відділенні</a>
 </div>
</nav>

<h5>Облік роботи, яка виконувалась інтерном на заочному циклі. Невідкладні хірургічні захворювання </h5>
<div class="tab-content" id="nav-tabContent" id="printButton">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <h6 >База стажування: Очна</h6>
    <h6>ПІБ інтерна: {{$currentUser->name}}</h6>
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
 
        <td>{!!  \Carbon\Carbon::parse($nightworkdaystat->date_work)->format('d/m/Y') !!}</td>
        <td>{!! $nightworkdaystat->baza !!}</td>
        <td>{!! $nightworkdaystat->time_work !!}</td>
@if ($nightworkdaystat->station_work==1)
        <td>Стаціонарне відділення</td>
@else <td>  </td>
@endif
       <!--  <td>{!! $nightworkdaystat->fiostacionar !!}</td> -->
        <td>{!! $nightworkdaystat->num_cardstacionar !!}</td>
        <td>{!! $nightworkdaystat->diagnosesstac !!}</td>
        <td>{!! $nightworkdaystat->oper !!}</td>
        <td>{!! $nightworkdaystat->type_workstac !!}</td>
        <td></td>

 </tr>
 @endforeach
</table>
       </div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
   <h6>База стажування: Заочна</h6>
   <h6>ПІБ інтерна: {{$currentUser->name}}</h6>
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

        <td>{!!  \Carbon\Carbon::parse($nightworkdays->date_work)->format('d/m/Y') !!}</td>
				<td>{!! $nightworkdays->baza !!}</td>
        <td>{!! $nightworkdays->time_work !!}</td>
@if ($nightworkdays->station_work==2)
        <td>Приймальне відділення</td>
@else <td>  </td>
@endif
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
			@endforeach
		</tbody>
	</table>
      </div>
    
</div>
<script>
function printit(){
if (window.print) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2); 
}
}
</script>
@endsection
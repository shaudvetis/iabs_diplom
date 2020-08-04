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
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Очна частина</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Заочна частина</a>
 </div>
</nav>

<h5>Облік роботи, яка виконувалась інтерном на заочному циклі. Невідкладні хірургічні захворювання </h5>
<div class="tab-content" id="nav-tabContent" id="printButton">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <h6 >База стажування: Очна</h6>
    <h6>ПІБ інтерна: {{$currentUser->name}}</h6>
   <table >
      <tr>
        <th>№</th>
      <!--   <th style="width: 100px">ПІБ інтерна</th> -->
        <th>Хірургічні напрямки</th>
       <!--  <th style="width: 100px">База стажування</th> -->
        <th><center>Діагноз</center></th>
        <th>Номер карти</th>
        <th>Назва операції</th>
        <th>Вид участі</th>
        <th>№операції</th>
        <th>Початок курації</th>
        <th>Кінець курації</th>
      </tr>
      <?php $y=1; ?>
       @foreach($getdate as $getdateochs)
         <tr>
        <td style="width: 20px"><center><?= $y  ?></center></td>
       <!--  <td>{!! $getdateochs->surname !!} {!! $getdateochs->name !!}</td> -->
        <td>{!! $getdateochs->direction !!}</td>
        <!-- <td>{!! $getdateochs->fio !!}</td> -->
        <td>{!! $getdateochs->diagnoses !!}</td>
        <td>{!! $getdateochs->num_card !!}</td>
        <td>{!! $getdateochs->oper !!}</td>
        <td>{!! $getdateochs->type_work !!}</td>
        <td>{!! $getdateochs->comm !!}</td>
        <td>{!! \Carbon\Carbon::parse($getdateochs->apdate)->format('d/m/Y') !!}</td>
        <td>{!! \Carbon\Carbon::parse($getdateochs->apdate_end)->format('d/m/Y') !!}</td>
   <?php  $y++;?> 
      </tr>
         @endforeach
      </table>
       </div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
   <h6>База стажування: Заочна</h6>
   <h6>ПІБ інтерна: {{$currentUser->name}}</h6>
    <table >
      <tr>
        <th>№</th>
       <!--  <th style="width: 100px">ПІБ інтерна</th> -->
        <th>Хірургічні напрямки</th>
        <!-- <th style="width: 100px">База стажування</th> -->
        <th><center>Діагноз</center></th>
        <th>Номер карти</th>
        <th>Назва операції</th>
        <th>Вид участі</th>
        <th>№операції</th>
        <th>Початок курації</th>
        <th>Кінець курації</th>
      </tr>
       <?php $y=1; ?>
       @foreach($getdateoch as $lastTenDaysRecordoch)
      <tr>
        <td><center><?= $y  ?></center></td>
        <!-- <td>{!! $lastTenDaysRecordoch->surname !!} {!! $lastTenDaysRecordoch->name !!}</td> -->
        <td>{!! $lastTenDaysRecordoch->direction !!}</td>
        <!-- <td>{!! $lastTenDaysRecordoch->fio !!}</td> -->
        <td>{!! $lastTenDaysRecordoch->diagnoses !!}</td>
        <td>{!! $lastTenDaysRecordoch->num_card !!}</td>
        <td>{!! $lastTenDaysRecordoch->oper !!}</td>
        <td>{!! $lastTenDaysRecordoch->type_work !!}</td>
        <td>{!! $lastTenDaysRecordoch->comm !!}</td>
        <td>{!! \Carbon\Carbon::parse($lastTenDaysRecordoch->apdate)->format('d/m/Y') !!}</td>
        <td>{!! \Carbon\Carbon::parse($lastTenDaysRecordoch->apdate_end)->format('d/m/Y') !!}</td>
         <?php  $y++;?> 
     </tr>
          @endforeach
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
@extends ('admink.layouts.app_admink')
@section ('content')

<style>
  td { /* border: 1px solid #dee2e6;*/
border: 1px solid #dee2e6;
}
th {
 border: 1px solid #dee2e6;
  }
.data_rozklad{
width: 500px;
float: right;
margin-right: 10px;
font-size: 8pt;
}

.tab_tema{
margin-top: 10px;
float:center;
width: 900px;
font-size: 8pt;
margin-left: 10px;
}
.tab_ocenka{
margin-left: 10px;

}

@media print {
 .print {
      display:none;
 }
}
</style>

  <button type="button " class="btn btn-secondary printButton print" id="printButton" onclick="printit();">Друкувати</button>
<a class="btn btn-light print" href="{{back()->getTargetUrl()}}" style="float: right;"> Повернутися</a>
<h4 style="text-align: center;color: green">Дніпропетровський Державний <br> Медичний Університет </h4>
<h7 style="text-align: center;">Кафедра Хірургії №1  <br> <span style="text-align: center;font-size:9px;"> Затверджено ЦМК ДДМУ 21.05.2019р. Протокол 8  </span> </h7> 
<div class="info"><strong>Курс {{$c}}  Десяток {{$d}}</strong></div>
<div class="data_rozklad">
  @foreach($data_rozklad as $data)
Період проведення семінару   с <strong>{!!\Carbon\Carbon::parse($data->dates)->format('d-m-Y')!!} по {!!\Carbon\Carbon::parse ($data->datep)->format('d-m-Y')!!} року.</strong>
<br>
@endforeach
</div>
<!-- Начало таблицы -->  
<div class="all_table">
<div class=" tab_tema">

  <h5><strong>Учбові елементи з модулю 
   @foreach ($direction as $directions)
   "{!!$directions->direction!!}"</strong> </h5>
  @endforeach
  </li>
  </ul> 
  <table>
  <tr>  
 @foreach ($seminarse as $seminars)
 <td style="font-size: 8pt;"> {!! $seminars->npp !!}</td>
   <!--  Если нет вопросов не выводить кнопку с ? -->
 <td> {!! $seminars->lessons !!}</td>
 </tr>

  @endforeach
</table>
</div>
<p></p>
<div class="tab_ocenka" >
<!-- Таблица с журналом! Две таблицы в одной -->

<table  border="0" cellpadding="0" cellspacing="0">
  <div>
  <h3 style="text-align: left;">Журнал з оцінками по модулю @foreach ($direction as $directions)
   "{!!$directions->direction!!}"  @endforeach</h3>
 </div>
<tr>
@foreach($result1 as $user_inf)
<td colspan="4"><strong>
{!! $user_inf['surname'] !!}<br> {!! $user_inf['name'] !!}</strong>
<br>
@foreach($direction as $directions)
<?php if ($user_inf['suma1'] < $directions->min_bal) {$t="red";} 
else {$t="green";} ?>
<span style="color:<?php echo $t; ?>; padding-top: 50px">{!! $user_inf['suma1'] !!}/{!!$directions->min_bal!!}</span>
@endforeach

<table style="width: 100%" border="0" cellpadding="0" cellspacing="70">
 <tr>
   <th >#</th>
   <th >О </th>
   <th >С</th>
 </tr>
 </tr>
 <tr>
<?php foreach($res as $index => $value) : 
 //Формируем пустые ячейки для инпутов
  $lessons = '';
  $bal = '';
  $id = '';
  //$index это номер по порядку ключа, просто вывод
  //$id = $user_inf['id'][$index];говорим, если что то есть в єтой переменной то дай эти значения переменным
if(isset($user_inf['id'][$index])) {
   $id = $user_inf['id'][$index];
 }
  if(isset($user_inf['bal'][$index])) {
  $id = $user_inf['id'][$index];
  
  $bal = $user_inf['bal'][$index];
  $lessons = $user_inf['lessons'][$index];}
  if(isset($user_inf['lessons'][$index])){
  $bal = $user_inf['bal'][$index];
  $lessons = $user_inf['lessons'][$index];}
  ?>
  <!-- выводим по значению коротое в переменных -->
  <td style="font-size: 8pt;background:lightgrey;"><strong>{{ $value->npp }}</strong></td>
 
  <td style="font-size: 10pt;text-align: center;">@if($bal != 0){{$bal}} @endif </td>

 @if ($lessons == 0) 
<td  class="smol_td"></td>
  @elseif ($lessons == 1 && $bal < 2) 
<td  class="smol_td">З</td>
 @elseif($lessons == 2 && $bal < 2 ) 
<td  class="smol_td">Н\Б </td>  
@else 
<td  class="smol_td"></td>
  @endif
 </tr>
 <?php endforeach; ?>
 </table>
 </td>
@endforeach 

 <td style=" padding: 5px; vertical-align: top;"><div style="width: 100px;text-align: center;"><strong>Підпис<br>викладача</strong></div></td>

</tr>
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
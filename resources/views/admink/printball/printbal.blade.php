@extends ('admink.layouts.app_admink')
@section ('content')
@include('admink.include.naprav_settings.ball_start_settings') 
<style>
  .all_table{
display: block; 
}
.smol_td{
  text-align: center;
}
.data_rozklad{
width: 500px;
float: right;
margin-right: 10px;
}
.tab_ocenka{
width: 800px;
margin-left: 400px;
margin-top: 100px;
}
th{
  text-align: center;
}
@media print {
 .print {
      display:none;
 }
 .all_table{
display: block; 
margin: 0; 
margin-top: 150px;
width: 400mm; 
height: 570mm; 
transform: rotate(270deg) translate(-296mm, 0);
transform-origin: 0 0;

 }
 .data_rozklad{
width: 500px;
float: right;
margin-right: 260px;
}
}
</style>

@if($dir == '2')
@include('admink.printball.printbal_cherevna') 
@else 
 
<div class="all_table" >
  <button type="button " class="btn btn-secondary printButton print" id="printButton" onclick="printit();">Друкувати</button>
<a class="btn btn-light print" href="{{back()->getTargetUrl()}}" style="float: right;"> Повернутися</a>
Дата друку: {{Carbon\Carbon::now()->format('d-m-Y')}}
<h3 style="text-align: center;color: green">Дніпропетровський Державний <br> Медичний Університет </h3>
<h4 style="text-align: center;"> Кафедра Хірургії №1  </h4> 

<div class="data_rozklad">
  <strong>Курс {{$c}}  Десяток {{$d}}</strong><br>
 
  @php $datas=''; $datasp='';  @endphp

  @foreach($data_rozklad as $data)


@if($loop->first)
Період проведення семінару   с <strong>
  {!!\Carbon\Carbon::parse($data->dates)->format('d-m-Y')!!} по 
   @endif
   @if($loop->last)
   {!!\Carbon\Carbon::parse ($data->datep)->format('d-m-Y')!!} року.</strong>

  @endif

    @php $datas=$data->dates; $datasp=$data->datep;  @endphp

@endforeach
<h4><span style="text-align: right;font-size:9px;"> Затверджено ЦМК ДДМУ 21.05.2019р. Протокол 8  </span> </h4>
</div>
<!-- Начало таблицы -->  
<div class=" tab_tema" style="width: 370px; float: left;margin-left: 10px;">

  <h5><strong>Учбові елементи з модулю 
   @foreach ($direction as $directions)
   "{!!$directions->direction!!}"</strong> </h5>
  @endforeach
  </li>
  </ul> 
  <table style="width:100%;height: 100%;">
  <tr>  
 @foreach ($seminarse as $seminars)
 <td style="font-size: 8pt;"> {!! $seminars->npp !!}</td>
   <!--  Если нет вопросов не выводить кнопку с ? -->
 <td> {!! $seminars->lessons !!}</td>
 </tr>
</tr>
  @endforeach
</table>
</div>
<br>
<div class="tab_ocenka" >
<!-- Таблица с журналом! Две таблицы в одной -->
<h3 style="text-align: center;">Журнал з оцінками по модулю @foreach ($direction as $directions)
   "{!!$directions->direction!!}"  @endforeach</h3>
<table  border="0" cellpadding="0" cellspacing="0">
<tr>
@foreach($result1 as $user_inf)
<td colspan="4"><strong>
{!! $user_inf['surname'] !!}<br> {!! $user_inf['name'] !!}</strong><br>
@foreach($direction as $directions)
<?php if ($user_inf['suma1'] < $directions->min_bal) {$t="red";} 
else {$t="green";} ?>
<span style="color:<?php echo $t; ?>; padding-top: 50px">{!! $user_inf['suma1'] !!}/{!!$directions->min_bal!!}</span>
@endforeach

<table style="width: 100%" border="0" cellpadding="0" cellspacing="70">
 <tr>
   <th >№</th>
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
  if(isset($user_inf['bal'][$index])) {

  $bal = $user_inf['bal'][$index];
  $lessons = $user_inf['lessons'][$index];}
  if(isset($user_inf['lessons'][$index])){
  $bal = $user_inf['bal'][$index];
  $lessons = $user_inf['lessons'][$index];}
  ?>
  <!-- выводим по значению коротое в переменных -->
  <td style="width: 1px; height: 1px; font-size: small;background:lightgrey;">


    <strong>{{ $value->npp }}</strong></td>
 
  <td class="smol_td">@if($bal != 0){{$bal}} @endif </td>


@if ($lessons == 0) 
<td  class="smol_td"></td>
  @elseif ($lessons == 1 && $bal < 2) 
<td  class="smol_td">З</td>
 @elseif($lessons == 2 && $bal < 2 ) 
<td  class="smol_td">Н\Б </td>  
@else 
<td  class="smol_td"></td>
  @endif
  </td>
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

@endif
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
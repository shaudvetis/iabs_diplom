@extends ('admink.layouts.app_admink')
<!-- Кнопка для печати формы -->
 <button type="button" style="width: 30px;height:30px; float:right; margin:0 2px; " onclick="forma();">
<i class="fa fa-print" aria-hidden="true"></i></button>
@include('layouts.instruction.vukladach.ballstart')

@section ('content')

<style>
@media print {
#printButton {
display:none;
}
.card-tools {
display:none;
}
form {
  display:none;
}
#panel{
  display:none;
}
}
th {
  border-radius: 0.25rem;
  border: 5px solid #dee2e6;
   text-align: center;
  }
td { border: 1px solid #dee2e6;
   text-align: center;
   }  
table {
     text-align: center;
 }
.tablemilitary * {
   text-align: center;
}
</style>

<!-- Подключается настройка формы журнала -->
@include('admink.include.naprav_settings.ball_start_settings') 

<!-- Два блока в котором держатся две формы, один блок закрывается в самом конце -->
<div class="card card-info ">
<div class="card-header">
 
<!-- Подключаются кнопки курсов и десятков -->
@include('admink.include.naprav_settings.course_select') 

 <div class="card-tools" >
 <a href="{{asset('ball_startcont')}}">Практичні навички</a>
 <p> <a href="{{asset('admink.controlmodyl.control_modyl')}}">Контроль модуля</a></p>
 </div>
 </div>

<div id='forma' style='display: none;' >
 @include('admink.kerivnuk.include.military') 
</div>

<!-- Два блока в котором держатся форма журнала закрывается в конце-->
<div style="padding: 0;" class="card-body" id="card">
<div class="card-info aside1 layer">
 
@if (isset($_GET))
  @if (session('message-updated'))
                         @component('admink.components.alert')
                             @slot('type')
                                 success
                             @endslot
                             {!! session('message-updated') !!}
                         @endcomponent
                      @endif     

<a style="padding: 0;" class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Загальні оцінки</a>

<div class="collapse" id="collapseExample">
   <table class="table-xs" >
   <tr>
   <th colspan="4"></th>
   <th colspan="10" style="color:green"><i>С - скорочено Семінар</i></th>
   </tr>
<tr>
   <th style="width: 30px">Прізвище</th>
   <th style="height: 10px">С-1</th>
   <th style="height: 10px">С-2</th>
   <th style="height: 10px">С-3</th>
   <th style="height: 10px">С-4</th>
   <th style="height: 10px">С-5</th>
   <th style="height: 10px">С-6</th>
   <th style="height: 10px">С-7</th>
   <th style="height: 10px">С-8</th>
   <th style="height: 10px">С-9</th>
   <th style="height: 10px">С-10</th>
   <th style="height: 10px">С-11</th>
   <th style="height: 10px">Разом</th>
 </tr>
 
@foreach($suma as $sumas)
<tr>
<td>{!! $sumas['surname'] !!} {!! $sumas['name'] !!}</td>
  <?php foreach($sumas['suma'] as $index => $value) : 
 //Формируем пустые ячейки для инпутов
  $suma = '';
  $suma1 = '';
  //$index это номер по порядку ключа, просто вывод
  //$id = $user_inf['id'][$index];говорим, если что то есть в єтой переменной то дай эти значения переменным
if(isset($sumas['suma'][$index])) {
   $suma = $sumas['suma'][$index];
   $suma1 = $sumas['suma1'];
 }
?>
<td><center>{!!$suma!!}</td>

<?php endforeach; ?>

<td><center>{!! $sumas['suma1'] !!}<?php  $sum=$suma1; 

if (($sum<=64)&&($sum>=59))
{
echo " / 5";
}elseif (($sum<=59)&&($sum>=49)) {
echo " / 4";
}elseif (($sum<=48)&& ($sum>=42)) {
echo " / 3";
}elseif (($sum<42))  {
echo '<i style="color:red">'." / 2".'</i>';} ?> </td>

</strong>
</center>

</tr>
@endforeach
</table>
</div>
<!-- Таблица с оценками закончилась-->
<!-- Таблица с журналом! Две таблицы в одной -->
<table  class="toptable" border="0" cellpadding="0" cellspacing="0">
<tr>
@foreach($result1 as $user_inf)
<td colspan="4"> 
  <div class='topFixed'>
  <a href="<?= '/cherevna/?b2=test' . '&user_id=' . $user_inf['user_id'] ?>">
  {!! $user_inf['surname'] !!}<br> {!! $user_inf['name'] !!}</a>
  </div>
@foreach($direction as $directions)
  <?php if ($user_inf['suma1'] < $directions->min_bal) {$t="red";} 
  else {$t="green";} ?>
  <p style="color:<?php echo $t; ?>; padding-top: 50px">{!! $user_inf['suma1'] !!}/{!!$directions->min_bal!!}</p>
@endforeach
<table style="width: 100%" border="0" cellpadding="0" cellspacing="70" class="layer">
 <tr>
    <th >#</th>
    <th >О </th>
    <th >С</th>
  </tr>
  </tr>
  <tr>
 <form role="form" method="post"  action="{{route('military.store')}}">
               {{ csrf_field() }}  
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
  <td style="height: 1px; font-size: small;background:lightgrey;"><strong>{{ $value->npp }}</strong></td>
  <input type="hidden" name="id_seminarus" value="{{$value->teor_nav}}">

   <input type="hidden" name="id_auto[]" value="{{$id}}">

   <input type="hidden" name="id_seminar[]"  value="{!!$value->id_seminar!!}">
 

  <input class="smol_input" type="hidden" name="user_id[]"  value="{{$user_inf['user_id']}}"> 

  <input type="hidden"  name="tema[]" value="<?= $value->id ?>" >

  <td class="smol_td"><input class="smol_input" title="{{$user_inf['surname']}}"  type="text" name="bal[]"  value="<?= $bal ?>"> </td>

  <td><select class="smol_select" name="lessons[]">
  <option value="0" @if(isset($lessons)) @if($lessons == 0) selected @endif @endif> </option>
  <option value="1" @if(isset($lessons)) @if($lessons == 1)selected @endif @endif>З</option>
  <option value="2" @if(isset($lessons)) @if($lessons == 2)selected @endif @endif>Н\Б</option></select></td>
 </tr>
 <?php endforeach; ?>
 </table>
 </td>
@endforeach 
<button type="submit" onclick="cock()">Відправити <i class="fa fa-edit" aria-hidden="true"></i> </button>



<div class="progress progress-bar bg-success" role="progressbar" id="text" style="display:none; width: 80%;height: 50px;font-size: 2em" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Зачекайте... йде запис даних
</div>
</form>
</tr>
</table>
@endisset
</div>

 <div  style='float:left; /*margin-top:280px;*/'>
  <div style="margin-left: 0px!important; " id="collapseOne" class="bd-example-modal-lg" aria-labelledby="headingOne" data-parent="#accordion">
  <!-- <div class="card-body>  --> 
  <!-- Задает длинну узкую самого общего блока в котором находятся все темі  -->      
  <div class="tema">
  <!-- Задает блок кард на котором держаться все єлементі  --> 
  <div class="modal-content ">
  <ul class="nav nav-pills nav-fill">
  <li class="nav-item">
  <h5><strong>Учбові елементи з модулю <p> 
    @foreach ($direction as $directions)
    "{!!$directions->direction!!}"</strong> </h5></p>
  @endforeach
  </li>
  </ul> 
  <table>
  <tr>  
  @foreach ($seminar as $seminars)
  @if(stristr($seminars->tema, 'span') === FALSE)
  <td><button type="button" class="btn-sm btn-info"><input type="hidden" name="element[]" value="{{$seminars->element}}"> {!! $seminars->npp !!}</button></td>
   <!--  Если нет вопросов не выводить кнопку с ? -->
 @if (empty($seminars->pract_nav))
   <td>{!! $seminars->tema !!}</td>
 @else
  <td ><button type="button" class="btn-sm btn-primary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal{{ $seminars->id }}" data-whatever="@mdo"> <input type="hidden" value="{{$seminars->element}}">?</button>{!! $seminars->tema !!}</td>
   @endif
        </tr>
     @else
        <tr> <td></td>
        <td  style="size: 80px" >{!! $seminars->tema !!}</td>
     </tr>
     @endif

<div class="modal fade" id="exampleModal{{ $seminars->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Питання</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <textarea rows="10" cols="60" type="text"  >{!! $seminars->pract_nav !!}</textarea>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Вихід</button>
  </div>
  </div>
  </div>
  @endforeach
  </table>


</div>
</div>
</div>
</div>
</div>
</div>  
</div>
 
 <script>
  function cock() {
  document.getElementById("text").style.display='block';
}

function printit(){
if (window.print) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2); 

}
}

function forma() {
  document.getElementById("forma").style.display='block';
   document.getElementById("card").style.display='none';
}

</script>
 
@endsection




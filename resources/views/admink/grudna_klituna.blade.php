@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.ballstart')
@section ('content')
<!-- Подключается настройка формы журнала -->
@include('admink.include.naprav_settings.ball_start_settings') 

<!-- Два блока в котором держатся две формы, один блок закрывается в самом конце -->
<div class="card card-info ">
<div class="card-header">
<!-- Подключаются кнопки курсов и десятков -->
@include('admink.include.naprav_settings.course_select') 
<div class="card-tools" >
<a href="{{asset('grudnaclinobs')}}">Клінічне обстеження хворого</a>
<p> <a href="{{asset('admink.controlmodyl.model_grudna')}}">Контроль модуля</a></p>
</div>
</div>
<!-- Два блока в котором держатся форма журнала закрывается в конце-->
<div style="padding: 0;" class="card-body">
<div class="card-info aside1 layer">
 
 @if (isset($_GET))
 <!-- Вывод сообщения о удачном сохранении в базу данных -->
 @include('admink.include.massage')
<a style="padding: 0;" class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Загальні оцінки</a>
<div class="collapse" id="collapseExample">
   <table class="table-xs" >
<tr>
  <th style="height: 3px">Прізвище</th>
  <th style="height: 10px">Семінар1</th>
  <th style="height: 10px">Семнар2</th>
  <th style="height: 10px">Семнар3</th>
  <th style="height: 10px">Семнар4</th>
  <th style="height: 10px">Семнар5</th>
</tr>
   @foreach($suma as $user_inf)
     <tr>
<td>{!! $user_inf['surname'] !!} {!! $user_inf['name'] !!}</td>
@if(isset($user_inf['0']) )
<td>{!!$user_inf['0']!!}</td>
@else  <td>  </td>
@endif   
@if(isset($user_inf['1']) )
<td>{!!$user_inf['1']!!}</td>
@else  <td>  </td>
@endif       
@if(isset($user_inf['2']))
<td>{!! $user_inf['2'] !!}</td>
@else <td>{!!$user_inf['2']  = '' !!}</td>
@endif
@if(isset($user_inf['3']))
<td> {!! $user_inf['3'] !!}</td>
@else <td>{!!$user_inf['3'] = '' !!}</td>
@endif
@if(isset($user_inf['4']))
<td> {!! $user_inf['4'] !!}</td>
@else <td>{!!$user_inf['4'] = '' !!}</td>
@endif
@if(isset($user_inf['5']))
<td> {!! $user_inf['5'] !!}</td>
@else {!!$user_inf['5'] = '' !!}
@endif
</tr>
@endforeach
</table>
</div>
<!-- Таблица с оценками закончилась-->
<!-- Таблица с журналом! Две таблицы в одной -->
<table  class="toptable" border="0" cellpadding="0" cellspacing="0">
<tr>
@foreach($result1 as $user_inf)
<td colspan="4" > 
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
    <th >О</th>
    <th >С</th>
 <!--    <th >K</th> -->
  </tr>
  </tr>
  <tr>
      <form role="form" method="post"  action="{{route('grudna_klituna.store')}}">
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
  <td style="height: 1px; font-size: small;background:lightgrey;">{{$value->npp}}</td>
   <input type="hidden" name="id_seminarus[]" value="{{$value->teor_nav}}">

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
<button type="submit" onclick="cock()" >Відправити <i class="fa fa-edit" aria-hidden="true"></i> </button>
 <div class="progress progress-bar bg-success" role="progressbar" id="text" style="display:none; width: 80%;height: 50px;font-size: 2em" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Зачекайте... йде запис даних
</div>
</tr>
</table>
 </form>
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
</script>
@endsection
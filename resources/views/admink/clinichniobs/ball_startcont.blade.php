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
    <a href="{{asset('admink.ball_start')}}">Назад</a>
      <p> <a href="{{asset('/admink.controlmodyl.control_modyl')}}">Контроль модуля</a></p>
   </div>
 </div>
<!-- Два блока в котором держатся форма журнала закрывается в конце-->
<div style="padding: 0;" class="card-body">
<div class="card-info aside1 layer">


@if (isset($_GET))


  <table style="text-align:center;" class="table table-sm">
  <thead class="thead-light table-success">
  <tr>
  <th >ID</th>
  <th >Призвище</th>
  <th style="width: 80px;">1</th>
  <th style="width: 90px; ">2</th>
  <th style="width: 90px;">3</th>
  <th style="width: 100px;">4</th>
  <th style="width: 120px;">5</th>
  <th style="width: 120px;">6</th>
  <th style="width: 80px;">7</th>
  <th style="width: 110px;">8</th>
  <th style="width: 110px;">9</th>
  <th style="width: 1px;"></th>
  <th style="width: 120px;">Разом</th>
  </tr>
  </thead>
  <tr>
  <th></th>
  <th></th>
  <td >1-0</td>
  <td >1-0</td>
  <td >1-0</td>
  <td>1-0</td>
  <td >1-0</td>
  <td >1-0</td>
  <td >1-0</td>
  <td >1-0</td>
  <td >1-0</td>
  <th></th>
  <td >9-0</td>
 </tr>
@foreach($results1 as $user_inf)
<form  method="post" action="{{route('ball_startcont.store')}}">
                 {{ csrf_field() }}  

<tr> 
  <tbody>

  <input type="hidden" name="id_seminarus" value="{{$direction->id}}">

<input class="smol_input" type="hidden" name="user_id"  value="{{$user_inf->user_id}}"> 

<td>{!! $user_inf->user_id !!}</td>
<td>{!! $user_inf->surname !!} {!! $user_inf->name !!}</td>

<td ><input size="1px" type="text" title="{{$user_inf->surname}}"  name="one" value="{{$user_inf->one}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="two" value="{{$user_inf->two}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="three" value="{{$user_inf->three}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="four" value="{{$user_inf->four}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="five" value="{{$user_inf->five}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="six" value="{{$user_inf->six}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="seven" value="{{$user_inf->seven}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="eight" value="{{$user_inf->eight}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="nine" value="{{$user_inf->nine}}"></td>
<td style="width:5px;" class="col-md-6 col-sm-6 col-xs-6  widthbutton"> <button  type="submit" ><i class="fa fa-edit" aria-hidden="true"></i> </button></td>
<td <?php if ($user_inf->suma1 < 18) {$t="red";} 
  else {$t="green";} ?>
   style="color:<?php echo $t; ?>;">{!! $user_inf->suma1 !!}</td>
</tr>
</tbody>

</form>
@endforeach
<tr>
<td colspan="13" style="font-size: small;font-style:italic;color:green;text-align:left;">1 - Вимоги до написання та заповнення щоденника хворого та протоколу операції (оцінка записів в медичній карти стаціонарного хворого та  представлених зразків протоколів операції).<br>
2 - Написання посмертного епікризу на хірургічного хворого (за наданою медичною картою померлого).<br>
3 - Заповнення медичної документації на ЛКК та МСЕК.<br>
4 - Підготовка відеоендоскопічного комплексу до роботи.<br>
5 - Техніка маніпулювання основними хірургічними інструментами з переміщення дрібних предметів (норматив 20 горошин за 70 сек).<br>
6 - Техніка роботи з відеокамерою (контроль введення інструментів, утримання «горизонту», демонстрація об’єкту спостереження під різними кутами й утримання його у центрі монітору.<br>
7 - Виконання хірургічної антисептичної обробки рук.<br>
8 - Виконання антисептичної обробки операційного поля.<br>
9 - Виконання прошивання та зав’язування трьох вузлів.<br>
</td>
    </tr>
</table>

@endisset

@endsection
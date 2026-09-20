@extends ('admink.layouts.app_admink')
 <button type="button" class="print" style="width: 30px;height:30px; float:right; margin:0 2px; " onclick="printit();">
<i class="fa fa-print" aria-hidden="true"></i></button>
@include('layouts.instruction.vukladach.controlmodyl')
@section ('content')
<style>
  @media print{
.print{
  display: none;
}
#panel{
  display: none;
}
.card-tools{
  display: none;
}
.card-body{
width: 900px; 
margin-left: 10px;
}
.all_table{
  margin-left: 10px;
}
}
</style>
  <!-- Подключаются стили -->
@include('admink.controlmodyl.control_modyl_print')

<div class="card card-info">
 <div class="card-header">

@include('admink.include.naprav_settings.course_select') 
   <div class="card-tools" >
    <a href="{{route('ocenki',[$id])}}">Назад</a>
     <p> <a href="{{route('practnavuchka', ['id'=>$id])}}">Практичні навички</a></p>
   </div>
 </div>
</div>
 <!-- Форма вывода печати на принтер-->
<div class="all_table" style="display:none">
  Дата друку: {{Carbon\Carbon::now()->format('d-m-Y')}}
 <h3 style="text-align: center;color: green">Дніпропетровський Державний <br> Медичний Університет</h3>
<h4 style="text-align: center;">Кафедра Хірургії №1  <br> <span style="text-align: center;font-size:9px;"> Затверджено ЦМК ДДМУ 21.05.2019р. Протокол 8  </span> </h4>
<h5>Контроль по модулю "Введення в хірургію"</h5>
<div style="float: right;margin-right: 200px;">
  <p style="  border-bottom: 2px solid maroon;"><strong>Курс @if(isset($_GET['course'])) {{$_GET['course']}} @endif / Десяток @if(isset($_GET['decatki'])) {{$_GET['decatki']}} @endif </strong> </p>
</div>
</div>
<!-- Конец форма вывода печати на принтер-->

 <!-- Два блока в котором держатся форма журнала закрывается в конце-->
<!-- Два блока в котором держатся форма журнала закрывается в конце-->
<div style="padding: 0;" class="cards-body">
<div class="card-info aside1 layer">
   
<!-- <h3 class="card-title">Сумарні бали за всіма видами контролю та ранжування за системою ЕСТS</h3> -->

 

@if (isset($_GET))


<table class="table table-sm">
   <thead class="thead-light">
     <tr>
   <th style="width: 10px; font-size:small;padding-bottom:25px">№</th>
   <th style=" font-size:small;padding-bottom:25px">Призвище</th>
   <th style=" font-size:small;">Всі поточні контролі  <p>по семінарам</p></th>
   <th style="font-size:small;padding-bottom:25px">Курація хворого</th>
   <th style="font-size:small;padding-bottom:25px">Тестування</th>
   <th style="font-size:small;padding-bottom:25px">Разом</th>
   <th style="font-size:small;padding-bottom:25px">ЕСТS</th>
   <th style=" font-size:small;padding-bottom:25px">Оцінка</th>
    </tr>
   </thead>
     <tr>
   <th></th>
   <th></th>

      @foreach($direction as $user_inf)

   <th style=" font-size:small;padding-top:50px">{!!$user_inf->all_control1 !!}</th>
   <th style=" font-size:small;padding-top:50px">{!!$user_inf->all_control2 !!}</th>
   <th style=" font-size:small;padding-top:50px">{!!$user_inf->test !!}</th>
   <th style=" font-size:small;padding-top:50px">{!!$user_inf->all_control3 !!}</th>
   <th style=" font-size:small;">
   
   @if($id==21)

    <table width="100%" class="table-striped" cellspacing="0" cellpadding="4"><tr valign=middle><td id="col1" style="height: 5px;padding:0px;padding-left: 0px;margin-left: 5px;" > {!!$user_inf->all_control5!!}-{!!$user_inf->all_control6!!} A 
      @php  $str = substr($user_inf->all_control4,0,-1); @endphp  ({!! $str !!})% </td></tr>
  <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px"> {!!$user_inf->all_control8!!}-{!!$user_inf->all_control9!!} B 
    @php  $str = substr($user_inf->all_control7,0,-1); @endphp  ({!! $str !!})%</td>
   </tr>
   <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control11 !!}-{!!$user_inf->all_control12 !!} C 
    @php  $str = substr($user_inf->all_control10,0,-1); @endphp ({!! $str !!})% </td></tr>
   <tr> 
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px"> {!!$user_inf->all_control14 !!}-{!!$user_inf->all_control15 !!} D 
   @php  $str = substr($user_inf->all_control13,0,-1); @endphp ({!! $str !!}) %</td>  
   </tr>
   <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control17 !!}-{!!$user_inf->all_control18 !!} E 
    @php  $str = substr($user_inf->all_control16,0,-1); @endphp ({!! $str !!})%</td></tr>
   <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px"> <{!!$user_inf->all_control20 !!} FX 
    @php  $str = substr($user_inf->all_control19,0,-2); @endphp ({!! $str !!})%</td>
   </tr>
   </table>
 @else

  <table width="100%" class="table-striped" cellspacing="0" cellpadding="4"><tr valign=middle><td id="col1" style="height: 5px;padding:0px;padding-left: 0px;margin-left: 5px;" >{!!$user_inf->all_control4!!} ({!!$user_inf->all_control5!!}-{!!$user_inf->all_control6!!}%)</td></tr>
      <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control7!!}  ({!!$user_inf->all_control8!!}-{!!$user_inf->all_control9!!}%)</td>
   </tr>
   <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control10 !!} ({!!$user_inf->all_control11 !!}-{!!$user_inf->all_control12 !!}%)</td></tr>
   <tr> 
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control13 !!} ({!!$user_inf->all_control14 !!}-{!!$user_inf->all_control15 !!}%)</td>  
   </tr>
   <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control16 !!} ({!!$user_inf->all_control17 !!}-{!!$user_inf->all_control18 !!}%)</td></tr>
   <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control19 !!} ({!!$user_inf->all_control20 !!}-%)</td>
   </tr>
   </table>
 @endif
</th>
   <th style=" font-size:small;padding-top:50px">{!!$user_inf->all_control21 !!}</th>
   </tr>
   @endforeach
    <?php  $i=1; ?>


   <form action="{{url('control_modyls')}}" method="POST">
         {{ csrf_field() }}

   <input type="hidden" name="direction_id" value="{{$id}}">

   @foreach($results1 as $user_inf)
   <tr> 
  <tbody>
  <td>{{$i}}</td>
  <td><input type="hidden" name="user_id[]" value="{{$user_inf->user_id}}">

    {!! $user_inf->surname !!} {!! $user_inf->name !!}</td>

  <td>  <?php if ($user_inf->suma1 < 22) {$t="red";} 
  else {$t="green";} ?>
  <p style="color:<?php echo $t; ?>;">{!! $user_inf->suma1 !!}</td>


<?php $pract = '';
if ($user_inf->suma >= 7) { $pract = $user_inf->suma;} else { $pract = 0;} ?>
  <td>  <?php if ($user_inf->suma < 27) {$t="red";} 
  else {$t="green";} ?>
  <p style="color:<?php echo $t; ?>;">{{$user_inf->suma}}</td>
  <td>{{$user_inf->suma3}}</td>

  <td><!-- <input type="text" class="form-control"value="@if(isset($user_inf->suma1)){{$user_inf->suma1+$user_inf->suma}} @else  @endif"> -->{{$user_inf->suma1+$user_inf->suma+$user_inf->suma3}}</td>
 
@foreach($direction as $user_inf1)
  <td><?php $y=($user_inf->suma1+$user_inf->suma+$user_inf->suma3); $x=ceil($y*100/$user_inf1->max); 


   if (($x<=$user_inf1->all_control5)&&($x>=$user_inf1->all_control6))
 {
 echo ceil($x).'%'.' '.'A';
 }elseif (($x<=$user_inf1->all_control8)&&($x>=$user_inf1->all_control9)) {
   echo ceil($x).'%'.' '.'B';
 }elseif (($x<=$user_inf1->all_control11)&& ($x>=$user_inf1->all_control12)) {
   echo ceil($x).'%'.' '.'C';
 }
 elseif (($x<=$user_inf1->all_control14)&& ($x>=$user_inf1->all_control15)) {
   echo ceil($x).'%'.' '.'D';
 }
  elseif (($x<=$user_inf1->all_control17)&& ($x>=$user_inf1->all_control18)) {
   echo ceil($x).'%'.' '.'E';
 }
elseif ($x<=$user_inf1->all_control20) {
   echo ceil($x).'%'.' '.'FX';
 }
  ?> </td>


@if ($pract < 1) 

  <td>Не здано  <input type="hidden" name="ball[]" value="0"> </td>

@else 

 <td> @php 
 $y=($user_inf->suma1+$user_inf->suma+$user_inf->suma3); $x=ceil($y*100/$user_inf1->max);@endphp

@if (($x<=$user_inf1->all_control5)&&($x>=$user_inf1->all_control6))

  5
<input type="hidden" name="ball[]" value="5">

@elseif (($x<=$user_inf1->all_control8)&&($x>=$user_inf1->all_control9)) 
    4
  <input type="hidden" name="ball[]" value="4">
 
@elseif (($x<=$user_inf1->all_control11)&& ($x>=$user_inf1->all_control12)) 
    4
<input type="hidden" name="ball[]" value="4">

 @elseif (($x<=$user_inf1->all_control14)&& ($x>=$user_inf1->all_control15)) 
    3
  <input type="hidden" name="ball[]" value="3">

  @elseif (($x<=$user_inf1->all_control17)&& ($x>=$user_inf1->all_control18)) 
   3
   <input type="hidden" name="ball[]" value="3">
@elseif ($x<=$user_inf1->all_control20) 
   2
  <input type="hidden" name="ball[]" value="2">
@endif
</td>

@endif
<?php  $i++; ?>
  </tr>
  </tbody>
</div>
</div>

   @endforeach
 @endforeach
 <!--    <button type="submit">ok</button> -->
</form>

@endisset


 <script>
function printit(){
   $('.all_table').css('display','block');
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
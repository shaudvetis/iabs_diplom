@extends ('admink.layouts.app_admink')
 <button type="button" class="print" style="width: 30px;height:30px; float:right; margin:0 2px; " onclick="printit();">
<i class="fa fa-print" aria-hidden="true"></i></button>
@include('layouts.instruction.vukladach.ballstartcont')
<!-- Файл с настройками стилей -->
@include('admink.clinichniobs.clinichniobs_print')

@section ('content')

<!-- Два блока в котором держатся две формы, один блок закрывается в самом конце -->
<div class="card card-info ">
 <div class="card-header">
<!-- Подключаются кнопки курсов и десятков -->
@include('admink.include.naprav_settings.course_select') 
   <div class="card-tools" >
    <a href="{{route('ocenki',['id'=>$id])}}">Назад</a>
    @if($id !=10)
 <a href="{{route('control_modyl',['id'=>$id])}}">Контроль модуля</a>
 @endif
   </div>
 </div>
</div>
<!-- Два блока в котором держатся форма журнала закрывается в конце-->
<div style="padding: 0;" class="cards-body">
   <h5 class="name_table">Практичні навички по модулю {!!$directions->direction!!}</h5>
  <!-- Форма вывода печати на принтер-->
<div class="all_table" style="display:none">
  Дата друку: {{Carbon\Carbon::now()->format('d-m-Y')}}
  <h3 style="text-align: center;color: green">Дніпропетровський Державний <br> Медичний Університет</h3>
  <h4 style="text-align: center;">Кафедра Хірургії №1   <br> <span style="text-align: center;font-size:9px;"> Затверджено ЦМК ДДМУ 21.05.2019р. Протокол 8  </span> </h4>
  <hr>
    Курс @if(isset($_GET['course'])) {{$_GET['course']}} @endif / Десяток @if(isset($_GET['decatki'])) {{$_GET['decatki']}} @endif 
    <br>
  Практичні навички по модулю <strong>{!!$directions->direction!!}</strong>


</div>

<!-- Конец форма вывода печати на принтер-->

@if($id==10)
@include('admink.clinichniobs.military-brick')
@endif


@if($id !=1 and $id !=10 and $id !=21)
  @include('admink.clinichniobs.brick-standart')
  @endif


 @if($id == 21)
   @include('admink.clinichniobs.brick-standart1')
@endif



</div>

@endsection

<script>

 $(document).ready(function(){
  var f = window.screen.availWidth;
if(f<800)
  $('.brick').css('width','50%');
      });
  //alert(window.screen.availWidth);
function printit(){
    $('.all_table').css('display','block');  
    $('.name_table').css('display','none');  
    
if (window.print) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2); 
}
}
</script>
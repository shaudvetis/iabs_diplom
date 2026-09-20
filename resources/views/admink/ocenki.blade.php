@extends ('admink.layouts.app_admink')
@php
$course = '';
$decatki = '';
if (!empty($_GET['course']))
$course = $_GET['course'];
else $course='1';
if (!empty($_GET['decatki']))
$decatki = $_GET['decatki'];
else $decatki='1';
if (!empty($_GET['courses']))
$courses = $_GET['courses'];
else $courses='';
if (!empty($_GET['ordinator']))
$ordinator = $_GET['ordinator'];
else $ordinator='';

@endphp

<!-- Форма печати, одельній роут -->
<a href="{{route('printbal', [$ids, 'course' => $course, 'decatki'=>$decatki, 'courses'=>$courses, 'ordinator'=>$ordinator])}}" > <button type="button" class="print" style="width: 30px;height:30px; float:right; margin:0 2px; " value1="{{$ids}}">
<i class="fa fa-print" aria-hidden="true"></i></button></a>

@include('layouts.instruction.vukladach.ballstart')
@section ('content')
<!-- Подключается настройка формы журнала -->
@include('admink.include.naprav_settings.ball_start_settings') 

<!-- Сообщения об отправке оценок -->
<div class="progress progress-bar bg-success" role="progressbar" id="text" style="display:none; width: 80%;height: 50px;font-size: 2em" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Зачекайте... йде запис даних
</div>

<!-- Два блока в котором держатся две формы, один блок закрывается в самом конце -->
<div class="card card-info ">
<div class="card-header">
<!-- Подключаются кнопки курсов и десятков -->
@include('admink.include.naprav_settings.course_select') 
 <div class="card-tools" >
  <!-- Если это не военная кафедра -->
  @if ($ids !=10 )

@if($ids ==21)
  <a href="{{route('practnavuchka', ['id'=>$ids])}}"> Практичні знання </a>
@else 
 <a href="{{route('practnavuchka', ['id'=>$ids])}}"> Клінічне обстеження хворого  </a>
@endif

<p> <a href="{{route('control_modyl',['id'=>$ids])}}">Контроль модуля</a> <br>
<a href="{{route('practtema', ['id'=>$ids])}}">   Практичні навички  </a> </p>
  <!-- Если военная кафедра -->
  @else
   <a href="{{route('practnavuchka', ['id'=>$ids])}}">  Практичні навички  </a>
  @endif
 


 </div>
 </div>
</div>
<!-- Два блока в котором держатся форма журнала закрывается в конце-->
<div style="padding: 0;" class="card-body" id="card">
<div class="card-info aside1 layer">
@if (isset($_GET))
<!-- Вывод сообщения о удачном сохранении в базу данных -->
@include('admink.include.massage')


<!-- <a style="padding: 0;" class="btn btn-primary summaseminar" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Загальні оцінки</a>
Форма с общими оценками по аджаксу 
<div class="collapse" id="collapseExample">
  @if(isset($suma))
   @include ('admink.summaseminar')
  @endif
</div> -->




<!-- Таблица с оценками закончилась-->
<!-- Таблица с журналом! Две таблицы в одной -->
<table  class="toptable" border="0" cellpadding="0" cellspacing="0">
  <tr>
@foreach($result1 as $user_inf)
<td colspan="4" title="{!! $user_inf['user_id'] !!}"> 
 <div class='topFixed'>
  <span style="color:blue;" >  
  {!! $user_inf['surname'] !!}<br> {!! $user_inf['name'] !!}</span>
  </div>
@foreach($direction as $directions)
  <?php if ($user_inf['suma1'] < $directions->min_bal) {$t="red";} 
  else {$t="green";} ?>
@endforeach
<p style="height: 50px;"> </p>
<table style="width: 100%;" border="0" cellpadding="0" cellspacing="70" class="layer">
  <tr>
    <th >#</th>
    <th >О</th>
    <th >С</th>
 <!--    <th >K</th> -->
  </tr>
  </tr>
  <tr>
 <form role="form" method="post"  action="{{route('postocenki')}}">
               {{ csrf_field() }}  
  <?php foreach($res as $index => $value) : 
  //Формируем пустые ячейки для инпутов
  $lessons = '';
  $bal = '';
  $id = '';
  $element ='';
   //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
  if(isset($user_inf['id'][$index])) {
   $id = $user_inf['id'][$index];
 }
  if(isset($user_inf['element'][$index])){
    $element = $user_inf['element'][$index];
 }
  if(isset($user_inf['bal'][$index])) {
  $bal = $user_inf['bal'][$index];
  $lessons = $user_inf['lessons'][$index];}
  if(isset($user_inf['lessons'][$index])){
  $bal = $user_inf['bal'][$index];
  $lessons = $user_inf['lessons'][$index];}
  ?>
  <!-- выводим по значению коротое в переменных -->
    <!-- Вывод цвета у тем где есть семинар -->
  @php
  if(!empty($value->tema)){

  $main_str = $value->tema;
if (strpos($main_str, 'Тестування') !== false) {
  $ts="green";
} else {
  $ts="lightgrey";
}
}
else {
  $ts="lightgrey";
}
 @endphp

  <td style="height: 1px; font-size: small;background:{{$ts}}">
 
    {{ $value->npp }} </td>
   <input type="hidden" name="id_seminarus" value="{{$value->teor_nav}}">

   <input type="hidden" name="id_auto[]" value="{{$id}}">

   <input type="hidden" name="id_seminar[]"  value="{!!$value->id_seminar!!}">
 

  <input class="smol_input" type="hidden" name="user_id[]"  value="{{$user_inf['user_id']}}"> 

  <input type="hidden"  name="tema[]" value="<?= $value->id ?>" >

  <input type="hidden" name="element[]"  value="{!!$element!!}">
 
  <td class="smol_td">
  <?php if(!empty($element)) {$t="red";} 
  else {$t="white";}
  ?>

  <select class="smol_select" name="bal[]" style="background-color: {{$t}};"  >
    <!-- Если в єту тему не нужно ставить оценку -->
  @if(isset($value->morning) && $value->morning == 'Disabled input')
   <option selected>0 </option>
    <td><select class="smol_select" name="lessons[]">
  <option value="0" @if(isset($lessons)) @if($lessons == 0) selected @endif @endif> </option>
  <option value="1" @if(isset($lessons)) @if($lessons == 1)selected @endif @endif>З</option>
  <option value="2" @if(isset($lessons)) @if($lessons == 2)selected @endif @endif>Н\Б</option></select></td>
   </tr>
  @else

  <option  value="0" @if(isset($bal)) @if($bal == 0) selected @endif @endif> </option>
  <option value="2" @if(isset($bal)) @if($bal == 2) selected @endif @endif><span style="color:red;" >2</span></option>
  <option value="3" @if(isset($bal)) @if($bal == 3)selected @endif @endif>З</option>
  <option value="4" @if(isset($bal)) @if($bal == 4)selected @endif @endif>4</option>
  <option value="5" @if(isset($bal)) @if($bal == 5)selected @endif @endif>5</option></select>
</td>
  <td><select class="smol_select" name="lessons[]">
  <option value="0" @if(isset($lessons)) @if($lessons == 0) selected @endif @endif> </option>
  <option value="1" @if(isset($lessons)) @if($lessons == 1)selected @endif @endif>З</option>
  <option value="2" @if(isset($lessons)) @if($lessons == 2)selected @endif @endif>Н\Б</option></select></td>
 </tr>
  @endif
 <?php endforeach; ?>
 </table>
 </td>

@endforeach 
<button type="submit" onclick="cock()" >Відправити <i class="fa fa-edit" aria-hidden="true"></i> </button>
</tr>
</table>

</form>
@endisset
</div>


 <div  style='float:left; /*margin-top:280px;*/'>
  <div style="margin-left: 0px!important; " id="collapseOne" class="bd-example-modal-lg" aria-labelledby="headingOne" data-parent="#accordion">
  <!-- <div class="card-body>  --> 
  <!-- Задает длинну узкую самого общего блока в котором находятся все темі  -->      
  <div class="tema" >
  <!-- Задает блок кард на котором держаться все єлементі  --> 
  <div class="modal-content ">
  <ul class="nav nav-pills nav-fill">
  <li class="nav-item">
  <h5><strong>Учбові елементи з модулю <p> 
   @foreach ($direction_ocenki as $it)
    @if ($it->id==$ids)
    "{!!$it->direction!!}"</strong> </h5></p>
    @endif
   
  @endforeach

  </li>
  </ul> 
  <table>
  <tr>  
  <!--   Объявляем переменную пустую -->
  <?php  $dubl=null;  ?>
  @foreach ($seminarse as $seminars)
<!--   Если переменная не равна названию семинара -->
  @if ($dubl != $seminars->title)
<!--   То показать название роздела и темы -->
   <td  style="size: 80px" >{!! $seminars->title !!}</td>
     </tr>
     <tr>
     <td  style="size: 80px" ><button type="button" class="btn-sm btn-info"><input type="hidden" name="element[]" value="{{$seminars->element}}"> {!! $seminars->npp !!}</button>
   <!-- Кнопка с вопросами  -->
      <button type="button" class="btn-sm btn-primary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal{{ $seminars->id }}" data-whatever="@mdo"> <input type="hidden" value="{{$seminars->element}}">? </button>
      <button type="button" class="btn-sm btn-secondary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal2{{ $seminars->id }}" data-whatever="@mdo"> <i class="bi bi-book-half"></i> </button>
     

      {!! $seminars->tema !!}</td>
    </tr>
<!-- Если dubl равна seminars->title (название роздела повторяется) то показать только название предметов -->
  @else
   <td  style="size: 80px" ><button type="button" class="btn-sm btn-info"><input type="hidden" name="element[]" value="{{$seminars->element}}"> {!! $seminars->npp !!}</button>
 <!-- Кнопка с вопросами  -->
    <button type="button" class="btn-sm btn-primary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal{{ $seminars->id }}" data-whatever="@mdo"> <input type="hidden" value="{{$seminars->element}}">?</button>
  <button type="button" class="btn-sm btn-secondary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal2{{ $seminars->id }}" data-whatever="@mdo"> <i class="bi bi-book-half"></i> </button>
    {!! $seminars->tema !!}  </td>
   </tr>
   @endif
<!--   Перед концом перебора записываем в переменную название роздела -->
      <?php  $dubl=$seminars->title;  ?>
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
       {!! $seminars->pract_nav !!}
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Вихід</button>
     </div>
   </div>
 </div>
</div>

<div class="modal fade" id="exampleModal2{{ $seminars->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Література</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      {!! $seminars->morning !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Вихід</button>
      </div>
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

@endsection

  @section('js')
<script>


$(document).ready(function(){
  $(".summaseminar").click(function(){
    BaseRecord.summaseminar($('.print').attr('value1'), $('.courses').val(), $('.decatki').val());  
  });
});       

  $('body').on('click',  '.practnav', function() {
    BaseRecord.practnav($('.print').attr('value1'));  
    $('.toptable').hide();
    $('.tema').hide();
  });

 $('body').on('click',  '.practclose', function() {
    // Отправляю класс, для вставки в нужный селект запроса;
    $(".closepract").hide();
    $('.toptable').css('display', 'block');
    $('.tema').css('display', 'block');
  });


 function cock() {
  document.getElementById("text").style.display='block';
}


var BaseRecord={

summaseminar: function(direction, courses, decatki){

   var ajaxSetting={
      method: 'post',
      url: '/summaseminar', //because Route::name('home')->get('/', 'ProductController@index');
      data: {
       direction:direction,
       courses:courses,
       decatki:decatki,
       hook:'summaseminar',
    "_token": "{{ csrf_token() }}",
      },
      success: function(data){
      // alert(data.table);
        $('.collapse').html(data.table);
      },
  error: (error) => {
                     console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting); 
},
practnav: function(direction){
   var ajaxSetting={
      method: 'post',
      url: '/summaseminar', //because Route::name('home')->get('/', 'ProductController@index');
      data: {
       direction:direction,
       hook:'temapractnav',
       "_token": "{{ csrf_token() }}",
      },
      success: function(data){
        $('.practnavtema').html(data.table);
      },
  error: (error) => {
                     console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting); 
},
};
</script>
@endsection








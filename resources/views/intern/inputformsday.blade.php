@extends('layouts.base')
@include('layouts.instruction.intern.inputday')
@section('content')
<style>
  .cursor-pointer{
  cursor: pointer;
 }
}
</style>

 <form role="form" method="post" action="{{route('kuraciyapost')}}" >
     {{ csrf_field() }}
   
     @if (session('message-updated'))
      @component('admink.components.alert')
      @slot('type')
      success
      @endslot
      {!! session('message-updated') !!}
      @endcomponent
    @endif    
 
<!-- Перебор ошибок если ввели пустое поле -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
             @if (isset($errors))
               <li>{{ $error }}</li>
             @endif
            @endforeach
        </ul>
    </div>
@endif


 <h4 class="texthead_ukr pt-3 pb-3" >Облік роботи, яка виконувалась інтерном на очному циклі</h4>
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title texthead_ukr">Курація хворих</h3>
          <div class="card-tools">
            <a class="btn btn-tool texthead_ukr"  href="{{asset('archive_inputday')}}">Архів</a>
          </div>
      </div>
        <!-- /.card-header -->
        <div class="card-body">
          <label style="color:red;font-size: 23px">База навчання</label>
            <div class="col-sm-6">
             <div class="was-validated">
              <div class="custom-control custom-radio">
               <input id="myRadioButton1" type="radio" required="" name="fio" value="очна" class="custom-control-input">
                <label class="custom-control-label" for="myRadioButton1" style="font-size: 18px;">Очна</label>
              </div>
              <div class="custom-control custom-radio">
               <input id="myRadioButton2" type="radio" name="fio" value="заочна" class="custom-control-input">
                <label class="custom-control-label" value="заочна" for="myRadioButton2" style="font-size: 18px">Заочна</label>
              </div>
             </div>
            </div>
            <p></p>



           <div class="was-validated">
         <div class="was-validated">
 <div class="row">
  <label>Хірургічні напрямки</label>
   <select name="direction"  class="custom-select" required style="width: 300px;"class="custom-select"onChange="Selected(this)" >
     <option value="">Відкрийте меню</option>
     @foreach($direction as $dir)

    
     <option value="{{$dir->id}}">{!!$dir->direction!!}</option>
    

     @endforeach
   </select>
 <div class="invalid-feedback">Оберіть хірургічний напрямок</div>
  </div>
</div>

           </div>

 <div class="row" >
  <div style="width:200px;  margin-left: 20px;">
   <label>№ карти хворого</label>
   <input type="text" class="form-control" name="num_card" value="@if(old('num_card')) {{ old('num_card') }} @endif">
  </div>
 <div style="width:200px; margin-left: 20px;">
  <label>№операції</label>
  <input type="text" id="comm" class="form-control" name="comm" onkeyup='saveValue(this);' / value="@if(old('comm')) {{ old('comm') }} @endif">
 </div>
 <div style="width:200px; margin-left: 20px;">
 <label>Початок курації</label>
 <input type="date" class="form-control" required="" name="apdate">
 </div>
</div>
 
 <div style="margin-left: 5px;" class="row form-inline">
  <label>Діагноз </label>  <button class="btn btn-primary btn-sm mkbstart mt-2 mb-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="margin-left: 100px;"> Діагноз МКБ </button>  
  <span style="padding-left: 10px;">
   <input type="search" name="namemkb" class="form-control namemkb bg-light mt-2 mb-2" placeholder="Пошук по назві діагноза" style="width: 200px;"> 
   <input type="button" class="btn-sm btn-outline-success  q mb-2" value="Знайти">
  </span>
  @include('layouts.mkbsearch')
<!-- Подключаем работу по МКБ -->
 <div class="collapse" id="collapseExample">
  <div class="card card-body">
    @include('layouts.mkbstart')
  </div>
 </div>
</div>

<div style="width:300px; margin-left: 5px;">
 <textarea class="form-control mkb" name="diagnoses" rows="4">@if(old('diagnoses')) {{ old('diagnoses') }} @endif
 </textarea>
</div>

<div style="width:300px; margin-left: 10px;">
 <label>Назва операції</label>
 <textarea class="form-control" name="oper" rows="4">@if(old('oper')) {{ old('oper') }} @endif</textarea>
</div>

<div class="row" >
  <div style="width:200px; margin-left: 20px;">
    <label>Вид участі</label>
      <select name="type_work" class="form-control select2 mb-2 " style="width: 100%;">
        <option>Курація</option>
        <option>Асистенція</option>
        <option>Самостійно</option>
        <option>Етапи операції</option>
      </select>
  </div>
  <div style="width:300px; margin-left: 20px;">
    <label class="ss">Кінець курації</label>   
      <!-- <input type="date" class="form-control" name="apdate_end"> --> 
        <p style="color:red">Дата кінця курації вводиться в архів  </p>
  </div>
 </div>
</div>
<p></p>
{!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
{{ Form::close() }}

</div>

</form>

</div>

@endsection

@section('js')
<script>
  $('body').on('click', '.ur1', function(){
   BaseRecord.ur1($(this).attr('id'));
  });
 $('body').on('click', '.q', function(){
  //alert($('.namemkb').val());
   BaseRecord.searchmkb($('.namemkb').val());
   $('.mkbsearch').css('display','block');
  });

  $("body").change(function () {
  $("textarea.mkb").text($("input[name='mkb']:checked").val())
 });      
 

$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
})

var BaseRecord={

ur1: function(ur1){
   var ajaxSetting={
   method: 'get',
   url: '/inputformsdaymkb', 
   data: {
   ur1:ur1
  },
  success: function(data){
   //alert(data.table);
  $('.mkbur2').html(data.table);
      //return false;
 },
  error: (error) => {
  console.log(JSON.stringify(error));
 },
};
 $.ajax(ajaxSetting); 
},
ur2: function(ur2){
 var ajaxSetting={
 method: 'get',
 url: '/inputformsdaymkb', 
 data: {
 ur2:ur2
},
success: function(data){
 //alert(data.table);
$('.mkbur4').html(data.table);
//return false;
},
error: (error) => {
console.log(JSON.stringify(error));
},
};
$.ajax(ajaxSetting); 
},
ur3:function(ur3){
 var ajaxSetting={
  method: 'get',
  url: '/inputformsdaymkb', 
  data: {
  ur3:ur3
},
 success: function(data){
 //alert(data.table);
 $('.mkbur5').html(data.table);
 //return false;
},
error: (error) => {
 console.log(JSON.stringify(error));
 },
};
$.ajax(ajaxSetting); 
},
searchmkb: function(namemkb){
var ajaxSetting={
method: 'get',
url: '/inputformsdaymkb', 
data: {
namemkb:namemkb
},
success: function(data){
 //alert(data.table);
$('.mkbsearch').html(data.table);

$('.namemkb').val('');
  //return false;
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




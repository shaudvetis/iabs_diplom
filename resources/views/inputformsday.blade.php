@extends('layouts.base')
@include('layouts.instruction.intern.inputday')
@section('content')
<style>
  .cursor-pointer{
  cursor: pointer;
}
.preloader {
position: fixed;
width: 100%;
height: 25%;
top:0;
left: 0;
background: green;
color: #fff;
z-index: 9999999;
padding-left: 50px;
padding-top: 30px;
font-size: 2em;
}
</style>
<div class="preloader">Зачекайте...йде зарузка сторінки</div>
 <form role="form" method="post" action="{{asset('inputformsday')}}" >
  {{ csrf_field() }}

   @if (session('message-updated'))
                         @component('admink.components.alert')
                             @slot('type')
                                 success
                             @endslot
                             {!! session('message-updated') !!}
                         @endcomponent
                      @endif    

                      
    <h4>Облік роботи, яка виконувалась інтерном на очному циклі</h4>
    <p>
    </p>
   
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Курація хворих</h3>
          <div class="card-tools">
            <a class="btn btn-tool"  href="{{asset('archive_inputday')}}">Архів</a>
             <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
             <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
         <div class="card-body">
          <div class="row" >
           <label style="color:red;font-size: 23px">База навчання</label>
           </div>
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
            @component('layouts.napravleniya')
           <div class="was-validated">
           @endcomponent      
           </div>
 <div class="row" >
 <div style="width:200px;  margin-left: 20px;">
 <label>№ карти хворого</label>
 <input type="text" class="form-control" name="num_card">
 </div>
 <div style="width:200px; margin-left: 20px;">
 <label>№операції</label>
 <input type="text" id="comm" class="form-control" name="comm" onkeyup='saveValue(this);' />
 </div>
 <div style="width:200px; margin-left: 20px;">
 <label>Початок курації</label>
 <input type="date" class="form-control" required="" name="apdate">
 </div>
 </div>
 <div class="row">
 <div style="width:400px; margin-left: 20px;">

 <label>Діагноз 
  <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="margin-left: 100px;"> Діагноз МКБ </button> </label>

 <textarea class="form-control mkb" name="diagnoses" rows="4">
 </textarea>
 </div>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    @include('layouts.modal')
   </div>
    </div> 
 <div style="width:400px; margin-left: 20px;">
 <label>Назва операції</label>
 <textarea class="form-control" name="oper" rows="4"></textarea>
 </div>
 
</div>
      <div class="row" >
         <div style="width:200px; margin-left: 20px;">
          <label>Вид участі</label>
          <select name="type_work" class="form-control select2" style="width: 100%;">
          <option> </option>
          <option>Асистенція</option>
          <option>Самостійно</option>
          <option>Етапи операції</option>
          </select>
         </div>
         <div style="width:300px; margin-left: 20px;">
          <label>Кінець курації</label>   
          <!-- <input type="date" class="form-control" name="apdate_end"> --> 
          <p style="color:red">Дата кінця курації вводиться в архів  </p>                          
         </div>
      </div>
    </div>
          <p></p>
{!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                    {{ Form::close() }}
               
                </form>

   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script type="text/javascript">
$('button.otpr').click(function(){
  // определим значение атрибута data-content
  var class1 = $(this).val();
  // запросим данные из файла, с использованием значения атрибута data-content, и выведем их в элемент id="result"
  if (class1) {
    $('#datar').load('modal', 'class1='+class1);  
  }
});
$("body").change(function () {
  $("textarea.mkb").text($("input[name='mkb']:checked").val())
})
$(document).ready(function() {
$('.preloader').fadeOut();
});
</script>              



            @endsection





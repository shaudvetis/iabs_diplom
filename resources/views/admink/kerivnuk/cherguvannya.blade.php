@extends('layouts.baseteacher')

@section('content')
<style>
	#calendar{
 max-width: 400px;
 height: 400px;
 margin-left: 5px;
}
#calendar .fc-today{
 background: #ccc;
}
#calendar .fc-day{
 transition: all .5s;
}
#calendar .fc-day:hover{
 background: #ccc;
}
.row {
	padding-top:20px;
}
</style>

 <h3><center><mark> Формування нічних чергувань для лікарів-інтернів </mark></center></h3>
 
<div class="row">
 <div id='calendar'>
 </div>

<div class="col" style="padding-left: 25px;">
<label>Відділення </label>
<select name="" class="vid form-control" required >
	<option>......</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
</select>

<label>Приймальне ПІБ </label>
<select class="priompib form-control" required>
	<option value="0">......</option>
	@foreach ($teacher as $item)
	@if($item->personaly==1)
	<option  value="{{$item->id}}">{{$item->nameshort}}</option>
	@endif
	@endforeach
</select>

<label>Відповідальній ПІБ </label>
<select class="vidpib form-control">
	<option value="0">......</option>
	@foreach ($teacher as $item)
	@if($item->comm==1)
	<option  value="{{$item->id}}">{{$item->nameshort}}</option>
	@endif
	@endforeach
</select>

<label>Бригада ПІБ </label>
<select name="" class="brigada  form-control">
	<option value="0">......</option>
	@foreach ($teacher as $item)
	@if($item->brigada==1)
	<option  value="{{$item->id}}">{{$item->nameshort}}</option>
	@endif
	@endforeach
</select>

<label>Інтерни </label>
<select name="" class="intern  form-control">
	<option>......</option>
  <option value="333333">Нет</option>
	@foreach ($intern as $item)
	<option  value="{{$item->user_id}}">{{$item->surname}} {{$item->name}}</option>
	@endforeach
</select>

<hr>
<button class="zapus btn btn-success" >Записати</button> 
</div>
</div>

<div class="col">
  <form >
  <input type="month" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="month" style="width: 200px;">
 <button type="submit" class="givroz  btn btn-success" >Список чергувань по місяцю</button>
</form>
</div>

@if (!empty($eventsmonth))
<div class="internduty">
   <div class="alert  alert-dismissible fade show" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><strong>&times;</strong></span>
   </button>
<table class="table  table-responsive">
<tr>
  <th>#</th>
  <th>Дата</th>
  <th>Відділення</th>
  <th>Приймальне</th>
  <th>Відповідальній</th>
  <th>Бригада</th>
  <th>Інтерни</th>
</tr>
@foreach($eventsmonth as $item)
<tr>
  <td class="center widthbutton"><a class="btn btn-danger listbuttonremove" id="{{$item->id}}" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
  <td>{!!\Carbon\Carbon::parse($item->start)->format('d-m-Y')!!}</td>
  <td>{{$item->vid}}</td>
  <td>{{$item->priom_id}}</td>
  <td>{{$item->vid_id}}</td>
  <td>{{$item->nameshort}}</td>
  <td>{{$item->surname}} {{$item->name}}</td>
</tr>
@endforeach
</table>
</div>
</div>
@endif



@include('admink.kerivnuk.include.calendarduty')

@endsection

@section('js')
<script>
 document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:'uk',
          dateClick: function(info) {
          var c = info.dateStr;
          // change the day's background color just for fun
           info.dayEl.style.backgroundColor = 'red';
    }
  });
       calendar.render();
});
//Берем текущую дату для вычесления месяца
$(document).ready(function(){
 $('body').on('click', 'td.fc-day', function(){
 	var dd = $(this).attr('data-date');
 	BaseRecord.data = dd;
 	//alert(BaseRecord.data);
  });
//Записываем в БД
 $("body").on("click", ".zapus", function(){
 if(BaseRecord.data == ''){
 	alert('Не обрана дата!');
 }else {
  BaseRecord.create(BaseRecord.data,$('.vid').val(),$('.priompib').val(),$('.vidpib').val(),$('.brigada').val(),$('.intern').val());
 }
});
//Удаление одной записи
$('body').on('click', '.listbuttonremove', function(){
 	var c = $(this).attr('id');
  BaseRecord.delete($(this).attr('id'));
  return false;
});
});

var BaseRecord={
 	data: '',
  //Получаем месяц и по месяцу делаем выборку и подгружаем в форму
givDuty: function(data){
//alert('data');
   var ajaxSetting={
     method: 'GET',
      url: "{{route('cherguvannya.index')}}",
      data: { 
        month:data,
      	type:'start'
      },
       success: function(data){
      //  alert(data);
     $('.internduty').html(data.table);
   },
     error: (error) => {
      console.log(JSON.stringify(error));
   },
};
   $.ajax(ajaxSetting);	
},

create: function(data,vid,priom,vidpib,brigada,intern){
//alert(data);
   var ajaxSetting={
     method: 'POST',
      url: "{{route('cherguvannya.store')}}",
      data: {
           data:this.data,
           vid:vid,
           priom:priom,
           vidpib:vidpib,
           brigada:brigada,
           intern:intern,
           type: 'add',
         '_token': $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(data){
     //   alert(data);
   // $('.internduty').html(data.table);
   //ВЫзываем вывод за месяц интернов
   BaseRecord.givDuty(BaseRecord.data);
  },
     error: (error) => {
      console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting);	
},

delete: function(id){
   var ajaxSetting={
      method: 'POST',
      url: "{{route('cherguvannya.store')}}",
      data: { 
      	type:'delete',
      	id:id,
      	 '_token': $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(data){
        //alert(data); 
         //$('.back-pannel').html(data.table); //!!!.back-pannel
           BaseRecord.givDuty();
     },
  };
   $.ajax(ajaxSetting);
},
};
</script>
@endsection
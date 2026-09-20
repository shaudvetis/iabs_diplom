@extends('layouts.baseteacher')
@include('layouts.instruction.kerivnuk.pract')
@section('content')
<style> 
 .settings table {
  width: 40%;
  border: 1px solid #dee2e6;
  border-collapse: separate;
  border-width: 1px 1px 1px 1px;
  margin: 3px auto;
  margin-left: 1px;
 /* font-size: 20px;*/
  }
  .settings th {
 /* border-radius: 0.25rem;*/
  border: 1px solid #dee2e6;
  /*font-weight: bold;*/
  font-size: 15px;
  text-align: left;
  vertical-align: middle;
  }
  .settings td { border: 1px solid #dee2e6;
  text-align: left;
  vertical-align: middle;
  font-size: 14px;
   } /**/
  .settings thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
  /*font-size: 20px;*/
  }
  * {
  /* old-style reset here :) */
  border: 0px;
  padding: 0px;
}
.settings select {
font-size: 20px;
width:100%;
}
.settings_t {
  width: 40%;
  margin-right: 1px;
  margin-top: 1px;
  position: relative;
  margin-left: 1px;
}
table {
  width: 100%;
  border: 1px solid #dee2e6;
  border-collapse: separate;
  border-width: 1px 1px 1px 1px;
  margin: 3px auto;
  font-size:20px;
  }
  th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  /*font-weight: bold;*/
  /*font-size: 14px;*/
  text-align: left;
  vertical-align: middle;
  }
td { border: 1px solid #dee2e6;
  text-align: left;
  vertical-align: middle;
   } /**/
   .calendar {
    width: 100%;
   }
      .size {
    width: 100%;
   }
   .otvet {
    color:green;
    font-size: 20pt;
    background-color:lightgrey;
   }
</style>


<p style="font-size: 30px;color: green">Формування розкладу напрямків</p>
<div class="otvet">
 @if (session('message-updated'))
                         @component('admink.components.alert')
                             @slot('type')
                                 success
                             @endslot
                             {!! session('message-updated') !!}
                         @endcomponent
                      @endif     

</div>


<div class="card card-info ">
<div class="card-header">
<input type="button"  class="btn btn-outline-danger" id="buttom_year" value="Показати year">
  <input type="button"  class="btn btn-outline-danger" id="zapros_table" value="Показати">
 </div>
 </div> 

<h3> Формирование рассписания </h3>
<form name="form_start" class="form_start">
  <div class="row">
  <div class="col" style="width: 350px;">
      <label>Оберіть період с:</label>
      <input type="month" id="month" name="calendars" class="form-control" value="@if(isset($shift))  {!!\Carbon\Carbon::parse($shift)->format('d.m.Y')!!} @else  @endif" required style="width: 200px;">

<div  id="answer" style="margin-left: 10px;">
 <!-- тут подключался файл calendar-->

<!-- тут подключался файл calendar ajaxcalendar-->

  </div>
   <label>№ Тем</label>

    @//include('admink.kerivnuk.ajaxnpp')
 </div>
 
    <div class="col">
      <label>Рік вступу</label>
      <input type="year" name="teach_year"  id="teach_year"  class="form-control" required>

      <label>Курс</label>
      <select name="course"  id="course"  class="form-control" required>
     <option selected >....</option>
     <option  value="1">1</option>
     <option  value="2">2</option>
     <option  value="3">3</option>
      </select>
   
      <label>Десяток</label>
      <select name="decatki"  id="decatki"  class="form-control" required>
     <option selected >....</option>
     <option  value="1">1</option>
     <option  value="2">2</option>
     <option  value="3">3</option>
     <option  value="4">4</option>
      </select>
   
    <label>Викладач</label>
    <select name="teacher" id="teacher" class="form-control" style="width: auto" required>
    <option selected >.....</option>
    @foreach($teacher as $teachers)
    <option  value="{!!$teachers->id!!} ">{!!$teachers->nameshort!!}</option>
    @endforeach
    </select>

    <label >Напрямок</label>
    
<select name="predmet" id="predmet" style="width:200px;" class="form-control"  required>

</select>

<button type="submit" style="margin-top:30px" class="xu btn btn-success" name="enter" value="1">Записати</button>

</div>
 
 
<p class="model"></p>
</form>
<!-- <input type="hidden" name="start_year" value="@if(!empty($_GET['start_year']))  {{$_GET['start_year']}} @else  @endif "> -->
<!--   <div class="calendar"> -->
  <div class="otvet progress progress-bar bg-success" role="progressbar"  style="display:none; width: 80%;height: 50px;font-size: 2em" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

</div>

</div>

<p style="font-size: 30px;color: green">Завантаженість напрямків avto</p>

  @include('admink.kerivnuk.ajaxtablerozklad')

<p style="font-size: 30px;color: green">Таблица за год</p>

  @include('admink.kerivnuk.tablerozkladyear')

    @endsection

@section('js')
<script>
$('.form_start').on('submit',function (e) {
 e.preventDefault();

 // alert($('#predmet').attr('data'));
   var cBox = [];
   // в цикле собираем значения всех установленных чекбоксов и записываем их в массив cBox
   $('.calendars_t input[type="checkbox"]:checked').each(function(){
  cBox.push($(this).val());
        });
   
  var decatki = $("select", [name=decatki]).val();
  var teacher = $('#teacher',(this)).val();
  var predmet = $('#predmet',(this)).val();
  var teach_year = $('#teach_year',(this)).val();
  var course = $('#course',(this)).val();
  var decatki = $('#decatki',(this)).val();

 // console.log(cBox);
 // console.log(cNpp);
  if  ($('.calendars_t input[type="checkbox"]:checked').length === 0){
      alert( 'Оберіть дату!!!' );
      e.preventDefault();
          return false; 
   }
  if  ($('.calendars_t input[type="checkbox"]:checked').length > 2){
      alert( 'Не верное количество дат!!!!' );
      e.preventDefault();
          return false; 
   }
  // if  ($('.calendars_t input[type="checkbox"]:checked').length !== $("input[name='npptema']:checked").length){
  //     alert( 'Количество Дата не совпадает с количеством выбранных тем!!!' );
  //     e.preventDefault();
  //         return false; 
  //  }

BaseRecord.rozkladpost(cBox,$('#teacher',(this)).val(),$('#teach_year').val(),$('#decatki').val(),$('#course').val(),$('#predmet').val());


 $('body input:checkbox').prop('checked', false);
   myvaluetable.name($('#month').val(),$('#teach_year').val(),$('#decatki').val());
 });


var BaseRecord={
//Запись в БД данных с формы
rozkladpost: function(data,ticher_id,teach_year,decatki,course,id_modul){
   var ajaxSetting={
     method: 'POST',
      url: "{{route('sprav_rozklad.store')}}",
      data: {
           data:data,
           ticher_id:ticher_id,
           teach_year:teach_year,
           decatki:decatki,
           course:course,
           id_modul:id_modul,
           name:"store",
         '_token': $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(data){
     alert(data);
  },
     error: (error) => {
      console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting); 
},
};


//СОбират данные о месяце и запускает его
$(document).ready(function(){
$('#month').change ([name="calendars"],function(){
  mycalendars.month();
  mycalendars.func_ajaxmonth();
 return false;
});
});

$('#buttom_year').click([name="start_year"],function(){
  //alert($('#start_year').val());
myvaluetable.tablestartyear($('#teach_year').val());
});



//СОбират данные о месяце по клику вперед
$(document).ready(function(){
$('body').on('click', '.yestr', function(){
buttonmonth.giv();
//alert(buttonmonth.giv);
buttonmonth.func_ajaxbutton();
});
});


//СОбират данные о месяце по клику назад
$(document).ready(function(){
$('body').on('click', '.next', function(){
buttonmonthnext.next();
//alert($('.next').val());
buttonmonthnext.func_ajaxbuttonnext();
});
});

//СОбират данные о месяце и запускает его
var mycalendars = {
  month:function () {
  mycalendars.giv =$('#month').val();
  mycalendars.dec=decatki.options
  },
  func_ajaxmonth:function(){
  var ajaxsetting = {
    method:'get',
    url:'ajaxcalendar',
    data:'month='+mycalendars.giv,
   success:function(data){
  $("#answer").load('ajaxcalendar','month='+mycalendars.giv);
      initCheckbox();  
},
error:function(data){
 $('#answer').html(data.responseText);
  },
};

$.ajax(ajaxsetting);
},

}  
//СОбират данные о месяце по нажатию на вперед
var buttonmonthnext = {
next:function() {
buttonmonthnext.givb = ($('.next').val());
//console.log(buttonmonthnext.givb);
//alert(buttonmonth.givb);
},
func_ajaxbuttonnext:function(){
  var ajaxsetting = {
    method:'get',
    url:'ajaxcalendar',
    data:'yestr='+buttonmonthnext.givb,
    //data:'decatki=' + myvalue.giv&'start_year='+var c,
   success:function(data){
    $("#answer").load('ajaxcalendar','yestr='+buttonmonthnext.givb);
      
},
error:function(data){
 $('#answer').html(data.responseText);
  },
};

$.ajax(ajaxsetting);
},

}  
//СОбират данные о месяце по нажатию на назад
var buttonmonth = {
giv:function() {
buttonmonth.givb = ($('.yestr').val());
//console.log(buttonmonth.givb);
//alert(buttonmonth.givb);
},
func_ajaxbutton:function(){
  var ajaxsetting = {
    method:'get',
    url:'ajaxcalendar',
    data:'yestr='+buttonmonth.givb,
    //data:'decatki=' + myvalue.giv&'start_year='+var c,
   success:function(data){
    $("#answer").load('ajaxcalendar','yestr='+buttonmonth.givb);
},
error:function(data){
 $('#answer').html(data.responseText);
  },
};
$.ajax(ajaxsetting);
},
}  

//Запрос отображение направлений по году и десятку
$('#decatki').change ([name="decatki"],function(){
  // alert('dd');
 myvalue.name();
 myvalue.func_ajax();
 });

//Запрос отображение npp по году и десятку
$('#predmet').change ([name="predmet"],function(){
myvaluenpp.npp($('option:selected', this).attr('id'),$('#teach_year').val(),$('#decatki').val(),$('#month').val());

 });

$(document).on('click','#deletrozklad', function(){
myvaluetable.delete($(this).val());
    });


//
var myvalue ={
name:function(){
myvalue.giv=decatki.options
  [decatki.selectedIndex].value;
 //alert(myvalue.giv);
 myvalue.year = $('#teach_year').val();
 // alert(myvalue.year);
},

func_ajax:function(){
  var ajaxsetting = {
    method:'get',
  url:"{{route('sprav_rozklad.create')}}",
     data: {
         decatki:myvalue.giv,
         year:myvalue.year,
         hook:'napravlenie'
      },
  success:function(response){

  //console.log(response);
 var data_json=JSON.parse(response);
  var str_json="";
  var str_json="<option>"+"Оберіть..."+"</option>";
       for(var i in data_json) {
       str_json+="<option id='"+data_json[i]['modul']+"' value='"+data_json[i]['id']+"'>"+data_json[i]['name_napravlenie']+"\\"+data_json[i]['days']+"\\"+data_json[i]['min']+"</option>";     
         }
$("#predmet").html(str_json);
 
},
error:function(data){
 $('#predmet').html(data.responseText);
  },
};

$.ajax(ajaxsetting);
},
}
//Запрос на поиск по нпп
var myvaluenpp ={
  npp:function(npp,teach_year,decatki,month){
    //alert(npp);
  var ajaxsetting = {
    method:'get',
  url:"{{route('sprav_rozklad.create')}}",
     data: {
         npp:npp,
         teach_year:teach_year,
         decatki:decatki,
         month:month,
         hook:"npp"
      },
  success:function(data){

  //console.log(data.table);
 
$(".enternpp").html(data.table);
 
},
error:function(data){
 $('.enternpp').html(data.responseText);
  },
};

$.ajax(ajaxsetting);
},
}

//ПОиск по форме вверху п огоду десятку и месяцу ждя просмотра и корректировки
$(document).ready(function(){
$("#zapros_table").click(function() {
myvaluetable.name($('#month').val(),$('#teach_year').val(),$('#decatki').val());
    });
});


var myvaluetable ={
name:function(month,teach_year,decatki){
   var ajaxsetting = {
    method:'get',
    url:"{{route('sprav_rozklad.index')}}",
    data: {
      month:month,
      teach_year:teach_year,
      decatki:decatki,
      hook:'tablemonth'    
      },
  success:function(data){
$(".ajaxtablerozklad").html(data.table);
},
error:function(data){
 $('.model').html(data.responseText);
  },
};

$.ajax(ajaxsetting);
},
tablestartyear:function(teach_year){
   var ajaxsetting = {
    method:'get',
    url:"{{route('sprav_rozklad.index')}}",
    data: {
      teach_year:teach_year,
      hook:'tableyear'    
      },
  success:function(data){
    //console.log(response);
$(".ajaxtablerozklad").html(data.table);
},
error:function(data){
 $('.model').html(data.responseText);
  },
};

$.ajax(ajaxsetting);
},
delete:function(id){
   var ajaxsetting = {
      method: 'delete',
      url: '/sprav_rozklad/'+id,
    data: {
      id:id,
      hook:'delete',
      '_token': $('meta[name="csrf-token"]').attr('content'),    
      },
  success:function(data){
alert(data);
myvaluetable.name($('#month').val(),$('#teach_year').val(),$('#decatki').val());
},
error:function(data){
 $('.model').html(data.responseText);
  },
};

$.ajax(ajaxsetting);
},
}
</script>

    @endsection


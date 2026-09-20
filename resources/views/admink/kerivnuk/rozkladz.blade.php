@extends('layouts.baseteacher')
@section('content')

<!-- <hr style="color: orange"> -->
<!-- <h2 style="color: orange;text-align: center;"> Формування заочного розкладу </h2> -->


<hr style="color: orange">

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Створення розкладу</a>
    <a class="nav-link getallrozklad" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="color: orange;">Таблиця усіх інтернів заочного розкладу</a>
    
    <!-- <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a> -->
  </div>
</nav>


<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <div class="card card-body list mt-4">
    <!-- ViewComposer -->
     <div class="form-inline">
    <label  for="user_id">База</label>
      <select style="width: 400px;" class="custom-select selectbaza ml-2" id="user_id" name="user_id">
       <option selected>Choose...</option>
      @foreach($baza as $item)
       <option value="{{$item->id}}"  @if(isset($m1) && $item->id==$m1) selected  @endif>{{$item->name_baza}} 
       </option>
       @endforeach
      </select>

<a class="btn btn-primary ml-3 mr-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Додати план
  </a>
<div class="collapse" id="collapseExample">
      <label  for="user_id" class="ml-3 mr-2">Інтерн</label>
      <select style="width: 400px;" class="custom-select user_id" name="user_id">
       <option selected>Choose...</option>
       @foreach($user as $item)
       <option id="{{$item->startyear}}" value="{{$item->user_id}}">{{$item->user_id}} \ {{$item->surname}} {{$item->name}} \  курс {{$item->course}}</option>
       @endforeach
      </select>
     <label  for="user_id">Отделение</label>
     <!--  Сюда вставляется с query выборка -->
      <select style="width: 400px;" class="custom-select user_id selectvid" id="user_id" name="user_id">
   
      </select>
      <label  for="user_id" class="ml-3 mr-2">Month</label>
      <input type="month" name="month" class="form-control col-5 month">

      <button class="btn btn-info getpoisk"> Записати </button>
</div>
</div>
      <div id="pannel">
         @include('admink.kerivnuk.include.brick-getrozkladzuser')
      </div>
   </div>

  </div>

<div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
    <div id="allpannel">
      @include('admink.kerivnuk.include.brick-getallrozklad')
    </div>
 

</div>
  
  <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div> -->
</div>


    
      </div>




@endsection

@section('js')

<script>
$(document).ready(function(){
$("#nav-profile-tab").click();

$(".selectbaza").change();
  });
//Получаем отделения выбрав базу и вест список интерно
 $("body").on("change", ".selectbaza", function(){
 BaseRecord.getbazauser($(".selectbaza").val());
 BaseRecord.getotdeleniya($(".selectbaza").val());
  });

//Получаем всехинтернов по расписанию всех курсов
 $("body").on("click", ".getallrozklad", function(){
 BaseRecord.getallrozklad();
  });

//Получаем всехинтернов по расписанию всех курсов
 $("body").on("click", ".editrozklad", function(){
 alert($(".editmonth").val());
  });


//ПОст запись расписания в базу данных
 $("body").on("click", ".getpoisk", function(){

BaseRecord.postrozkladz($('.user_id').val(), $('.selectbaza').val(), $('.selectvid').val(), $(".month").val(), $('.user_id option:selected').attr('id') );
  });

//Удаление одной записи
$("body").on("click", ".listbuttonremove", function(){
   BaseRecord.deleteone($(this).attr('id'));
             return false;
  });

//Запуск страницы заочное расписание у руководителя
var BaseRecord={
getbazauser: function(id){
   var ajaxSetting={
      method: 'get',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         id:id,
         name:'getbazaintern',
      },
      success:function(data){
   // alert(data.table);
     $('#pannel').html(data.table);
  },
  error: (error) => {
    console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting); 
},

getallrozklad:function(){
   var ajaxSetting={
      method: 'get',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         name:'getallrozklad',
      },
      success:function(data){
   $("#allpannel").html(data.table);
    },
  error: (error) => {
    console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting); 
},

getotdeleniya:function(baza_id){
   var ajaxSetting={
      method: 'get',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         otdeleniya:baza_id,
         name:'otdeleniya',
      },
      success:function(response){
   // alert(response);
     var data_json=JSON.parse(response);
      var str_json="";
        str_json+="<option>"+"Оберіть..."+"</option>";
      for(var i in data_json) {
    str_json+="<option value='"+data_json[i]['id']+"'>"+data_json[i]['name_otdeleniya']+"</option>";
    }
   $(".selectvid").html(str_json);
    },
  error: (error) => {
    console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting); 
},

postrozkladz:function(user_id,bazainternatyr_id, selectvid, month, yearstart){
 var ajaxSetting={
      method: 'post',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         yearstart:yearstart,
         user_id:user_id,
         bazainternatyr_id:bazainternatyr_id,
         selectvid:selectvid,
         month:month,
         name:'new',
         '_token': $('meta[name="csrf-token"]').attr('content'),
      },
      success:function(response){
   alert(response);
 BaseRecord.getbazauser($('.selectbaza').val());
    },
  error: (error) => {
    console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting); 
},

deleteone:function(id){ 
   var ajaxSetting={
     method: 'post',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         id:id,
         name:'delete',
         '_token': $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(data){
         //alert(data);

       $('.listbuttonremove').click(function(){ 
         BaseRecord.deleteone($(this).attr('id'));
          return false;
         }); 

        BaseRecord.getbazauser($('.selectbaza').val());        
      },
   };
   $.ajax(ajaxSetting); 
},


getrozkladz: function(yearstart, month,user_id){
   var ajaxSetting={
      method: 'get',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         yearstart:yearstart,
         month:month,
         user_id:user_id,
         name:'getrozklad',
      },
      success:function(data){
//console.log(data.table);
   $('.getrozkladz').html(data.table);
  },
  error: (error) => {
    console.log(JSON.stringify(error));
   },
   };
   $.ajax(ajaxSetting); 
},


getrozkladzyear:function(yearstart){ 
   var ajaxSetting={
     method: 'post',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         yearstart:yearstart,
         name:'rozkladyear',
         '_token': $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(data){
      //console.log(data.table);
     $('.getrozkladyears').html(data.table);
      },
   };
   $.ajax(ajaxSetting); 
},
getrozkladzmonth: function(yearstart, month,user_id){
  //alert(month);
   var ajaxSetting={
      method: 'get',
      url: '/admink.kerivnuk.rozkladz', 
      data: {
         yearstart:yearstart,
         month:month,
         user_id:user_id,
         name:'getrozkladzmonth',
      },
      success:function(data){
        //console.log(data.table);
   $('.getrozkladzmonth').html(data.table);
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




@extends('layouts.baseteacher')
@section('content')
<style> 
 table {
border: 1px solid #dee2e6;
}
th {
border-radius: 0.25rem;
border: 1px solid #dee2e6;
}
td {
border: 1px solid #dee2e6;
}
thead {
color: #495057;
background-color: #e9ecef;
border-color: #dee2e6;
}
.otvet {
    color:green;
    font-size: 20pt;
    background-color:lightgrey;
   }
.k{
	border: 4px solid #dee2e6;
  width: 100%;
}
.td_vopros{
     font-size: 1.5pt;
     /*display: none;*/
     width: 300px;
     overflow: scroll;
     overflow:hidden;

}
@media print {
   .btn-group{
      display:none;
 }
   .card-header {
      display:none;
 }
 .td_voprosv{
  display:none;
 }
 .cr_temasem  {
   display:none;
 }
 .del_temasem
 {
   display:none;
 }
 .print {
      display:none;
 }
 .td_vopros{
 display: none;   
}
.btn{
 display: none;   
}
}

</style>
  <div class="card card-info">
      <div class="card-header">
  
<label style="font-size: 15pt;">Панель налаштування Тем та назв Семінарів</label>
 <label style="margin-left: 60px;font-size: 15pt">Оберіть напрямок</label>
  <select  name="napr" class="napr" style="width: 250px;height: 25px;margin-left: 10px;">
   <option selected></option>
    @foreach($direction as $direct)
    <option value="{!!$direct->id!!}" @if(isset($d)) @if($d == $direct->id) selected @endif @endif> {!!$direct->direction!!}  </option>
    @endforeach
    </select>
   <!-- <button type="button" class="btn-light obratu" style="margin-left: 10px;width: 80px;">Обрати</button> -->

</div>

<p class="otvet"></p> 
<div class="btn-group" >
<button type="button" class="new btn btn-success mr-2" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Довідник  семінарів</button>

<button type="button" class="create_tema btn btn-success mr-2" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">Розділи та Теми</button>

</div>
<!-- Ответ успеха от добавления роздела -->
<p class="otvet3"></p> 

<!-- Форма добавить новую запись seminar -->
<!-- Держится весь блок с добовлением и просмотром семинаров -->
<div class="form_wrap card-body  collapse" id="collapseExample">
<!-- ответ аждакса по записи в бд новой темі -->
<p class="otvet1 otvet"></p>
<!-- кнопка в которой блок с полями для ввода новой темі -->
<button type="button" class="new btn btn-success mr-2" data-toggle="collapse" data-target="#collapseExamplenew" aria-expanded="false" aria-controls="collapseExample">Додати Ррозділ</button>

<div class="form_wrap card-body  collapse" id="collapseExamplenew">  
 <form class="form_new">
 <div class="form-group" >
  <label for="namelong" class="col-form-label">Нова назва семінару:</label>
  <textarea class="new_seminar form-control " name="new_seminar" required></textarea>
  </div>
  <div class="form-group">
  <label class="col-form-label">№ п\н:</label>
  <input type="number" class="npp" name="npp" required>
  </div>
 <button type="button" class="btn btn-success save" name="hook" value="new">Записати</button>
</form>
</div>

<p style="font-size: 40px;text-align: center;color:red" ><caption>Існуючі назви Семінарів</caption> </p>
<!-- Вывод таблицы с уже существующими темами -->
<table class="table_seminar k">

</table>
<!-- Кнопка корректировки тем  -->
<div class="aptable modal-body" style="display: none;">
<textarea class="appendtema form-control">  </textarea>
<button type="button" class="btn btn-primary save_changesem">Зберегти</button>  
</div>

</div> 

<!-- Форма вівода существующей семинара и новая тема -->
<div class="show_tema card card-body  collapse" id="collapseExample1">
<!--   Печать документа -->
<button type="button" class="print" style="width: 30px;height:30px; float:right;margin-left: 98%;" onclick="printit();">
<i class="fa fa-print" aria-hidden="true"></i></button>
 
<!-- Кнопка добавить тему раскрівает раздел -->
<button style="width: 200px;float: left;" type="button" class="btn btn-success mr-2" data-toggle="collapse" data-target="#collapseExampletema" aria-expanded="false" aria-controls="collapseExample">Додати Ррозділ</button>

<div class="show_tema card card-body  collapse" id="collapseExampletema">
<p style="font-size: 40px;text-align: center;color:green" ><caption>Створення тем Семінарів</caption> </p>
<form class="form_create">
 <div> 
 	<label>Назва сeмінару</label>
 	<select class="select_tema form-control">

 	</select>
 </div>  
 <div class="form-group">
 	<label class="col-form-label">№ п\н:</label>
 	<input type="number" class="npp_tema form-control" style="width: 100px;" name="npp" required>
 </div>
<div>
<label for="position" class="col-form-label">Теми семінару:</label>
<textarea class="form-control  ckeditor tema" id="tema" required></textarea>
</div>

<div>
<label for="nameshort" class="col-form-label">Питання к семінару:</label>
<textarea class="form-control ckeditor vopros"  id="vopros"></textarea>
</div>

<div>
<label for="nameshort" class="col-form-label">Перелік літератури:</label>
<textarea class="form-control ckeditor listliterature"  id="listliterature"></textarea>
</div>

<button type="button" class="btn btn-success save_tema" name="hook" value="new">Записати</button>
</form>
<p  class="otvet_tema otvet"></p> 
</div>
<!-- Виввод итого таблици с темами -->
<p style="font-size: 40px;text-align: center;color:blue" ><caption>Зв'язок Семінарів з темами</caption> </p>
<table class="creates">
	
</table>
</div>

  

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Форма коригування тем семінару</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form_news">
      <div class="modal-body">
        
     <label>н\п Теми</label>
     <input class="form-control ckeditor cr_npp"  id="cr_temasem">
     <label>Корригування теми</label>
     <textarea class="form-control ckeditor cr_temasem"  id="cr_temasem"></textarea>
     <label>Коригування питання</label>
     <textarea class="form-control ckeditor cr_vopros"  id="cr_vopros"></textarea>
      </div>

     <div>
      <label for="nameshort" class="col-form-label">Перелік літератури:</label>
      <textarea class="form-control ckeditor cr_listliterature"  id="cr_listliterature"></textarea>
     </div>


      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Відміна</button>
        <button type="button" class="btn btn-primary zberegtu"  data-dismiss="modal">Зберегти</button>
      </div>
    </div>
  </div>
</div>



<p class="otvet5 "></p> 


</div>



<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
<script>
function printit(){

if (window.print) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2); 

}
}

$(document).ready(function(){
$('.zberegtu').click(function () {
obratu.funct_createtem();
obratu.funajaxcrtema();

});
 });

$(document).ready(function(){
$('.del_tema').click(function () {
//var p= $('.appendtema').val();
 alert('p');

});
 });
// Клик по кнопке Зберегти при корректировке роздела 1 кнопка
$(document).ready(function(){
$('.save_changesem').click(function () {
//var p= $('.appendtema').val();
// alert(p);
obratu.fun_clicktema();
obratu.fun_click();

});
 });

//Створення нового роздела первая кнопка
$(document).ready(function(){
$('.new').click(function () {
 obratu.table_seminar();
 obratu.func_ajaxtabsem();
 // $(".aptable").hide();
});
 });

//Кнопка внутри первой кнопки зписьновой темі
$(document).ready(function(){
$('.save').click(function () {
 obratu.new_temacreate();
 obratu.func_ajaxnew();
});
 });


$(document).ready(function(){
$('.kors').click(function () {
obratu.fun_click();

});
 });


//Щелчек по кнопке 2 кнопке Роздел и тема открытие формы
$(document).ready(function(){
$('.create_tema').click(function () {
  obratu.table_seminar();
  obratu.func_ajaxselect();
   obratu.napr();
 obratu.func_ajaxobratu();
});
 });

//Сохранение новой темы
$(document).ready(function(){
$('.save_tema').click(function () {
  obratu.save_newtema();
  obratu.func_ajaxsemtema();
});
 });

var obratu = {
  napr:function () {
  obratu.giv =$('.napr').val();
  obratu.two ='obratu';
  },
func_ajaxobratu:function(){
  var ajaxsetting = {
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
  method:'post',
  url:'/admink.kerivnuk.name_seminar',
  data:'napr='+obratu.giv+'&'+'hook='+obratu.two,
  success:function(response){
  var data_json=JSON.parse(response);
   var str_json="";
   str_json+="<tr>"+'<th colspan="4">'+"Теми практичних занять"+"</th>"+"</tr>";
    var dubl=null;
     for(var i in data_json) {
      if ( dubl !== data_json[i]['title'])
      str_json+="<tr>"+"<th>"+"#"+"</th>"+"<th>"+data_json[i]['title']+"</th>"+"<th class='td_vopros'>"+"Питання"+"</th>"+"<th class='td_voprosv'>"+"K"+"</th>"+"<th class='td_voprosv'>"+"D"+"</th>"+"</tr>";
       dubl=data_json[i]['title'];
       str_json+="<tr>"+"<td>"+data_json[i]['npp']+"<input type='hidden' value='"+data_json[i]['id']+"'>"+"</td>"
        +"<td>"+data_json[i]['tema']+"<input class='tdtema' type='hidden' value='"+data_json[i]['tema']+"'>"+"</td>"+"<td class='td_vopros'>"+data_json[i]['pract_nav']+"<input  class='td_vopros' type='hidden' value='"+data_json[i]['pract_nav']+"'>"+"</td>"+"<input  class='td_listliterature' type='hidden' value='"+data_json[i]['morning']+"'>"+"</td>"+"<td>"+'<button class="cr_temasem" data-toggle="modal" data-target="#exampleModal">'+'<i class="fa fa-edit cr_temasem">'+"</i>"+"</button>"+"</td>"+"<td>"+'<i class="fa fa-trash del_temasem">'+"</i>"+"</td>"+"</tr>"; //ПРИ ПЕРЕБОРЕ МАССИВА ФОРМИРУЕМ ВЕРСТКУ
   }
  $(".creates").html(str_json);
 $('.td_vopros').click(function () {
  $('.td_vopros').css('font-size','10pt');
   $( '.td_vopros').mouseup(function( event ){ // задаем функцию при отпускании кнопки мыши на элементе <div>
      event.preventDefault();
       if(event.button == 2){
          $('.td_vopros').css('font-size','1.5pt');
      }
    });
 });

//Modal view tema
  $('.cr_temasem').click(function () {
  var row = $(this).parents('tr');
  var w = $('.nps').val(npp);
  obratu.id_temacrs=row.find("input").eq(0).val();   

  var temacr=row.find("input").eq(1).val();   
  var voproscr=row.find("input").eq(2).val();    
  var listliterature=row.find("input").eq(3).val();    
  var npp=row.find('td').eq(0).text();
  $('.nps').val(obratu.id_temacrs);
 //alert(voproscr);
  $('.cr_npp').val(npp);
  //alert(temacr);
CKEDITOR.instances.cr_temasem.setData(temacr);
CKEDITOR.instances.cr_vopros.setData(voproscr);
CKEDITOR.instances.cr_listliterature.setData(listliterature);

});
$('.del_temasem').css('cursor','pointer').click(function () {
    obratu.fun_deltemaseminar(this);
   });
},
error:function(data){
 $('.creates').html(response.responseText);
  },
};

$.ajax(ajaxsetting);
},


funct_createtem:function(){
//obratu.id_temacrs = id_temacr;
obratu.temacrs=encodeURIComponent(CKEDITOR.instances.cr_temasem.getData())
obratu.voproscr=encodeURIComponent(CKEDITOR.instances.cr_vopros.getData())
obratu.listliterature=encodeURIComponent(CKEDITOR.instances.cr_listliterature.getData())
obratu.npps=  $('.cr_npp').val();
obratu.hookcr='create_temaseminar';
//alert(obratu.voproscr);
},

funajaxcrtema:function(){
  var ajaxsetting = {
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
  method:'post',
  url:'/admink.kerivnuk.name_seminar',
  data:'napr='+obratu.giv+'&'+'hook='+obratu.hookcr+'&'+'id='+obratu.id_temacrs+'&'+'tema='+obratu.temacrs+'&'+'vopros='+obratu.voproscr+'&'+'npps='+obratu.npps+'&'+'listliterature='+obratu.listliterature,
   success:function(response){
   $(".otvet5").html(response);
   setTimeout(function() { $(".otvet5").hide('slow'); }, 5000);
   obratu.napr();
   obratu.func_ajaxobratu();

     // $(".form_news").trigger("reset");
 },
error:function(response){
 $('.otvet5').html(response.responseText);
  },
};

$.ajax(ajaxsetting);
},

fun_deltemaseminar:function(el){
question =  'Ви дійсно бажаете видалити тему семінару?';
const result = confirm(question);
if (result) {
var rows = $(el).parents('tr');
obratu.id_deltema=rows.find('input:nth-child(1)').val();
obratu.giv =$('.napr').val();
obratu.hookdelsem='del_temaseminar';
obratu.func_deltemaseminar();
} else {
$('.otvet5').text('Обрано відміна!');
setTimeout(function() { $(".otvet5").hide('slow'); }, 2000);
return false;
}

},

func_deltemaseminar:function(){
  var ajaxsetting = {
     headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    method:'post',
    url:'/admink.kerivnuk.name_seminar',
    data:'napr='+obratu.giv+'&'+'hook='+obratu.hookdelsem+'&'+'del_temas='+obratu.id_deltema,
    //data:'decatki=' + myvalue.giv&'start_year='+var c,
   success:function(response){
  //console.log(response);
    //$('.otvet1').html(response);

   $(".otvet5").html(response);
   setTimeout(function() { $(".otvet5").hide('slow'); }, 2000);
    obratu.napr();
   obratu.func_ajaxobratu();
},
error:function(response){
 $('.otvet5').html(response.responseText);
  },
};

$.ajax(ajaxsetting);
},


  table_seminar:function () {
  obratu.table_sem =$('.napr').val();
  obratu.table_name ='table_seminar';
  },

  func_ajaxtabsem:function(){
  var ajaxsetting = {
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  method:'post',
  url:'/admink.kerivnuk.name_seminar',
  data:'napr='+obratu.table_sem+'&'+'hook='+obratu.table_name,
  success:function(response){
  var data_json=JSON.parse(response);
   var str_json="";
    str_json+="<tr>"+"<th>"+"#"+"</th>"+"<th>"+"Назва"+"</th>"+"<th>"+"D"+"</th>"+"</tr>";
      for(var i in data_json) {
    str_json+="<tr>"+"<td class='tr_tema'>"+data_json[i]['npp_main']+"<input type='hidden' value='"+data_json[i]['id']+"'>"+"</td>"+"<td class='tr_tema'>"+data_json[i]['seminar_title']+"</td>"+"<td>"+'<button>'+'<i class="fa fa-trash del_tema">'+"</i>"+"</button>"+"</td>"+"</tr>"; 
      //ПРИ ПЕРЕБОРЕ МАССИВА ФОРМИРУЕМ ВЕРСТКУ
     }
   $(".table_seminar").html(str_json);
   $('.tr_tema ').css('cursor','pointer').click(function(){
   var row = $(this).parents('tr');
   var texto = row.find('input:nth-child(1)').val();
   obratu.table_names=texto;
   var g=($(this).text());
   $(".appendtema").val(g);
   $(".aptable").css('display','block');
	});
  $('.del_tema ').css('cursor','pointer').click(function(){
     obratu.fun_deltema(this);
   });
},
error:function(data){
 $('.table_seminar').html(response.responseText);
  },
};

$.ajax(ajaxsetting);
},


 fun_clicktema:function () {
 obratu.giv =$('.napr').val();
 obratu.new_temas =$('.appendtema').val();
 //alert(obratu.new_temas);
 obratu.hook = 'create_tema';
 },

fun_click:function(){
  var ajaxsetting = {
  	 headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    method:'post',
    url:'/admink.kerivnuk.name_seminar',
    data:'napr='+obratu.giv+'&'+'hook='+obratu.hook+'&'+'new_tema='+obratu.new_temas+'&'+'new_temaid='+obratu.table_names,
    //data:'decatki=' + myvalue.giv&'start_year='+var c,
   success:function(response){
        
   $(".otvet3").html(response);
    
  obratu.table_seminar();
  obratu.func_ajaxtabsem();
  $(".appendtema").trigger("reset");
  $(".aptable").hide();
  setTimeout(function() { $(".otvet3").hide('slow'); }, 2000);
},
error:function(data){
 $('.appendtema').html(response.responseText);
  },
};

$.ajax(ajaxsetting);
},


fun_deltema:function (el) {
  
  question =  'Ви дійсно бажаете видалити назву семінару з її темами?';
const result = confirm(question);
if (result) {
var row = $(el).parents('tr');
obratu.id_tema = row.find('input:nth-child(1)').val();
obratu.del_text = 'del_tema';
obratu.giv =$('.napr').val();
obratu.func_ajaxdeltema();
//alert('OK');
} else {
$('.otvet3').text('Обрано відміна!');
setTimeout(function() { $(".otvet3").hide('slow'); }, 2000);
return false;
}
 // obratu.giv =$('.napr').val();
 // obratu.new_temas =$('.appendtema').val();
 // obratu.hook = 'create_tema';
},

 func_ajaxdeltema:function(){
  var ajaxsetting = {
     headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    method:'post',
    url:'/admink.kerivnuk.name_seminar',
    data:'napr='+obratu.giv+'&'+'hook='+obratu.del_text+'&'+'del_tema='+obratu.id_tema,
    //data:'decatki=' + myvalue.giv&'start_year='+var c,
   success:function(response){
  //console.log(response);
    //$('.otvet1').html(response);

   $(".otvet3").html(response);
   setTimeout(function() { $(".otvet3").hide('slow'); }, 2000);
      obratu.table_seminar();
  obratu.func_ajaxtabsem();
},
error:function(response){
 $('.otvet3').html(response.responseText);
  },
};

$.ajax(ajaxsetting);
},

func_ajaxselect:function(){
  var ajaxsetting = {
  	 headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    method:'post',
    url:'/admink.kerivnuk.name_seminar',
  data:'napr='+obratu.table_sem+'&'+'hook='+obratu.table_name,
    //data:'decatki=' + myvalue.giv&'start_year='+var c,
   success:function(response){
  //  console.log(response);
    //$('.otvet1').html(response);
     var data_json=JSON.parse(response);
    var str_json="";
    str_json+="<option>"+"Оберіть..."+"</option>";
    for(var i in data_json) {
       
     str_json+="<option value='"+data_json[i]['id']+"'>"+data_json[i]['seminar_title']+"</option>";
      //ПРИ ПЕРЕБОРЕ МАССИВА ФОРМИРУЕМ ВЕРСТКУ
         }

          // $(".table_seminar:td:eq(2)").css("class","k");
   $(".select_tema").html(str_json);
},
error:function(response){
 $('.select_tema').html(response.responseText);
  },
};

$.ajax(ajaxsetting);
},

save_newtema:function () {
obratu.save_name =$('.select_tema').val();
obratu.save_dir =$('.napr').val();
obratu.save_tem = CKEDITOR.instances.tema.getData();
//alert(obratu.save_tem);
obratu.save_vopros=CKEDITOR.instances.vopros.getData()
obratu.save_npp =$('.npp_tema').val();
obratu.save_zapros ='seminar_tema';
if (obratu.save_tem == ''){
 alert( 'Заповніть назву теми семінару!!!' );
 e.preventDefault();
 return false; 
 }
if (obratu.save_npp == ''){
alert( 'Заповніть номер п/н!!!' );
e.preventDefault();
return false; 
}
//alert(obratu.save_npp);
  //    return false;
},

func_ajaxsemtema:function(){
  var ajaxsetting = {
  headers: {
 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
 method:'post',
 url:'/admink.kerivnuk.name_seminar',
 data:'name='+obratu.save_name+'&'+'napr='+obratu.save_dir+'&'+'hook='+obratu.save_zapros+'&'+'tema='+obratu.save_tem+'&'+'vopros='+obratu.save_vopros+'&'+'npp='+obratu.save_npp,
   success:function(response){
   $(".otvet_tema").html(response);
   setTimeout(function() { $(".otvet").hide('slow'); }, 2000);
   $(".form_create").trigger("reset");
   obratu.napr();
   obratu.func_ajaxobratu();
  },
error:function(response){
 $('.otvet_tema').html(response.responseText);
  },
};

$.ajax(ajaxsetting);
},


new_temacreate:function () {
obratu.create_dir =$('.napr').val();
obratu.create_name =$('.new_seminar').val();
obratu.create_npp = $('.npp').val();
obratu.create_hook = 'new'
 if (obratu.create_name == ''){
      alert( 'Заповніть назву семінару!!!' );
      e.preventDefault();
          return false; 
   }
     if (obratu.create_npp == ''){
      alert( 'Заповніть номер семінару!!!' );
      e.preventDefault();
          return false; 
   }
//alert(obratu.save_npp);
  //    return false;
  },

func_ajaxnew:function(){
  var ajaxsetting = {
  	 headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    method:'post',
    url:'/admink.kerivnuk.name_seminar',
  data:'name='+obratu.create_name+'&'+'napr='+obratu.create_dir+'&'+'hook='+obratu.create_hook+'&'+'npp='+obratu.create_npp,
    //data:'decatki=' + myvalue.giv&'start_year='+var c,
   success:function(response){
  //s  console.log(response);
   $(".otvet1").html(response);
   setTimeout(function() { $(".otvet1").hide('slow'); }, 2000);
   $(".form_new").trigger("reset");

 obratu.table_seminar();
 obratu.func_ajaxtabsem();
},
error:function(response){
 $('.otvet1').html(response.responseText);
  },
};

$.ajax(ajaxsetting);
},




}
</script>



@endsection
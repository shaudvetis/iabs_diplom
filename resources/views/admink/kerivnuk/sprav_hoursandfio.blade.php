@extends('layouts.baseteacher')
@include('layouts.instruction.kerivnuk.pract')
@section('content')
<style> 
 table {
  width: 75%;
  border: 1px solid #dee2e6;
  border-collapse: separate;
  border-width: 1px 1px 1px 1px;
  margin: 3px auto;
  font-size: 20px;
  }
  th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  /*font-weight: bold;*/
  font-size: 14px;
  text-align: left;
  vertical-align: middle;
  }
  td { border: 1px solid #dee2e6;
  text-align: left;
  vertical-align: middle;
   } /**/
   * {
  /* old-style reset here :) */
  border: 0px;
  padding: 0px;
}
input {
font-size: 20px;
width: 500px;
}
input[type=text] {
border: none;
border-bottom: 1px solid grey;
}
.fa.fa-edit{
  color: darkgrey !important;
  font-size: 20px !important;
}
.fa.fa-trash
{
  color: darkgrey !important;
  font-size: 20px !important;
}
</style>

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link btn btn-success"> Учбові бази</a>
    <a class="nav-link" href="{{asset('sprav_modul')}}">Список напрямків</a>
    <a class="nav-item nav-link" href="{{asset('sprav_teacher')}}" >Викладачі</a>
  </div>
</nav>
     
<p style="font-size: 40px;text-align: center;color:green" ><caption>Довідник  баз </caption> </p>
<table style="width: 75%">
<tr>
 <th>База</th>
 <th>Локація</th>
 <th>K</th>
 <th>D</th>
</tr>
@foreach($baza_otd as $modul)
<form method="post" action="{{route('sprav_hoursandfio.store')}}">
   {{ csrf_field() }} 
<tr>
<input type="hidden" name="id" value="{{$modul->id}}">
<td style=width="500px;"><input type="text" name="name_baza" value="{{$modul->name_baza}}">  </td>
<td><input type="text" name="name_town" value="{!!$modul->name_town!!}"> </td>
<td><button type="submit" name="create" value="1"><i class="fa fa-edit"></i></button></td>
<td><button type="submit"  name="delete" value="2" class="btn icons"><i class="fa fa-trash"></i></td>
</tr>
</form>
@endforeach
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+ Додати</button>
</table>
  <!-- Начало модального окна для новой записи базі -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <div class="modal-body">
        <form method="post" action="{{route('sprav_hoursandfio.store')}}">
            {{ csrf_field() }} 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Назва бази:</label>
            <input type="text" class="form-control" id="recipient-name" name="name_baza">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Адреса бази:</label>
            <textarea class="form-control" id="message-text" name="name_town" required=""></textarea>
          </div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary" name="save" value="1">Відправити</button>
         </form>
      </div>
    </div>
  </div>
</div>
<p></p>
<br>

<p style="font-size: 40px;text-align: center;color:green" ><caption>Коригування довіднику зв'язку баз з відділенням</caption> </p>
    
   <table style="width: 80%">
 <tr style="background-color:lightgrey">
    <th>База \ відділення \ Локація бази</th>
    <th>Новий</th>
    <th>К</th>
    <th>Д</th>
</tr>
@foreach($baza1 as $moduls)

<tr>
 
 <td style="color:green" > {!!$moduls['name_baza']!!} \ {!!$moduls['name_town']!!}</td>
</tr>
@foreach($moduls['name_otdeleniya'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $name_otdeleniya = '';
  $direction = '';
  $id_otdelenie = '';
  $id_direction = '';
   //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($moduls['name_baza']))
 {
 $name_otdeleniya =  $moduls['name_otdeleniya'][$index];
 $direction =  $moduls['name_napravlenie'][$index]; 
 $id_otdelenie = $moduls['id_otdelenie'][$index]; 
 $id_direction =  $moduls['id_direction'][$index]; 
 } ?>
 <tr>
  <form method="post" action="{{route('sprav_hoursandfio.store')}}">
   {{ csrf_field() }} 
   <input type="hidden" name="id_baza" value="{!!$moduls['id']!!}">
  <input type="hidden" name="id_otdelenie" value="{!!$id_otdelenie!!}">
  <td><input type="text" name="name_otdeleniya" value="{!!$name_otdeleniya!!} " width="500px">  </td>
  <td>
    <select name="direction" class="form-control">
     <option value="{!! $id_direction!!}" selected>{{$direction}} </option>
     @foreach($napr as $direct)
     <option value="{!!$direct->id!!}">{!!$direct->name_napravlenie!!}</option>
  @endforeach
 </select>
  </td>
  <td><button type="submit" name="create1" value="1"><i class="fa fa-edit"></i></button></td>
  <td><button type="submit" name="delete1"><i class="fa fa-trash"></i></button></td>
 </tr>
 </form>
 @endforeach
 @endforeach
<button type="button" class="btn btn-success" onclick='openForm()'>+ Додати</button>
<div id='form-wrap' style="display: none;">
  <form role="form" action="{{route('sprav_hoursandfio.store')}}" autocomplete="off" method="POST">
   {{ csrf_field() }} 
   <div class="form-group">
   <label for="recipient-name" class="col-form-label">Назва бази:</label>
   <select name="name_baza" class="form-control">
   <option selected>Оберіть ..</option>
   @foreach($baza_otd as $baza)
   <option value="{!!$baza->id!!}">{!!$baza->name_baza!!}</option>
   @endforeach
   </select>
  <input type="hidden" name="id" value="{{$baza->id}}">
 </div>
<div class="form-group">
<label for="message-text" class="col-form-label">Назва відділення:</label>
 <textarea class="form-control" id="message-text" name="name_otdeleniya"></textarea>
 <div class="form-group">
 <label for="message-text-" class="col-form-label">Назва напрямку:</label>
 <select name="direction" class="form-control">
 <option selected>Оберіть ..</option>
 @foreach($napr as $direct)
 <option value="{!!$direct->id!!}" >{!!$direct->name_napravlenie!!}</option>
  @endforeach
 </select>
 </div>
 <button type="submit" class="btn btn-success" name="save1">Отправить</button>
 </div> 
 </form>
 </table>
<script type="text/javascript"></script>
<script>
function openForm() {
 document.getElementById("form-wrap").style.display='block';
}

</script>
  </div>
 
@endsection
@extends('layouts.baseteacher')
@include('layouts.instruction.kerivnuk.pract')
@section('content')
<style> 
 table {
  width: 90%;
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
  td { 
  border: 1px solid #dee2e6;
  text-align: left;
  vertical-align: middle;
   } /**/
  * {
  /* old-style reset here :) */
  border: 0px;
  padding: 0px;
}
input {
border: none;

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
    <a class="nav-link ">Учбові бази</a>
    <a class="nav-link btn btn-success" href="{{asset('sprav_modul')}}">Список напрямків</a>
    <a class="nav-item nav-link" href="{{asset('sprav_teacher')}}" >Викладачі</a>
  </div>
</nav>


 <table style="width: 75%">
   <tr>
   <th>№</th>
   <th style="text-align: center;">Напрямок</th>
   <th style="text-align: center;">Модуль</th>
   <th style="text-align: center;">Кількість групп</th>
   <th style="text-align: center;">Кількість днів</th>
   <th style="text-align: center;">К</th>
   <th style="text-align: center;">D</th>
</tr>
<?php  $i=1  ?>
@foreach($napr as $naprs)
<form role="form" action="{{route('sprav_modul.store')}}" method="POST">
   {{ csrf_field() }} 
<tr>
  <input type="hidden" name="id" value="{!!$naprs->id!!}">
    <td style="text-align: center;">{!!$i!!} </td>
    <td style="text-align: center;"><input type="text" name="name" value="{!!$naprs->name_napravlenie!!}" size="80px"> </td>
    <td style="text-align: center;"><input type="text" name="modul" value="{!!$naprs->modul!!}" size="5px"> </td>
    <td style="text-align: center;"><input type="text" name="max_group" value="{!!$naprs->max_group!!}" size="5px"> </td>
    <td style="text-align: center;"><input type="text" name="days" value="{!!$naprs->days!!}" size="5px"> </td>
    <td><button type="submit" name="create1" value="1"><i class="fa fa-edit"></i></button></td>
  <td><button type="submit" name="delete1"><i class="fa fa-trash"></i></button></td>
<?php  $i++ ?>
</tr>
</form>
@endforeach


<button type="button" class="btn btn-success" onclick='openForm()'>+ Додати</button>

<div id='form-wrap' style="display: none;">
  <form role="form" action="{{route('sprav_modul.store')}}" autocomplete="off" method="POST">
   {{ csrf_field() }} 
 <div class="form-group">
   <label for="recipient-name" class="col-form-label">Назва модуля:</label>
   <textarea class="form-control" id="message-text" name="name"></textarea>
 </div>
<div class="form-group">
<label for="message-text" class="col-form-label">Номер модуля:</label>
 <textarea class="form-control" id="message-text" name="modul"></textarea>
 <div class="form-group">
 <label for="message-text-" class="col-form-label">Кількість груп: 9999 - якщо усі групи разом</label>
 <textarea class="form-control" name="max_group"></textarea> 
 </div>
<div class="form-group">
 <label for="message-text-" class="col-form-label">Кількість днів:</label>
 <input type="text" name="days" class="form-control">
 </div>

 <button type="submit" class="btn btn-success" name="save1">Отправить</button>
 </div> 
 </form>
 </table>

</table>

 


 <script type="text/javascript"></script>
<script>
function openForm() {
 document.getElementById("form-wrap").style.display='block';
}

</script>
@endsection

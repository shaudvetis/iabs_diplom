@extends('layouts.baseteacher')
@include('layouts.instruction.kerivnuk.pract')
@section('content')
<style> 
 table {
  /*width: 100%;*/
  border: 1px solid #dee2e6;
  border-collapse: separate;
  border-width: 1px 1px 1px 1px;
  margin: 3px auto;
 /* font-size: 15px;*/
  }
  th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  /*font-weight: bold;*/
/*  font-size: 14px;*/
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
  <div class="nav nav-tabs">
    <a class="nav-link" href="{{asset('sprav_hoursandfio')}}"> Учбові бази</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Список напрямків</a>
    <a class="nav-link btn btn-success">Викладачі</a>
  </div>
</nav>
                 
<p style="font-size: 40px;text-align: center;color:green"><caption>Довідник вікладачів</caption> </p>
 
<button type="button" class="btn btn-success" onclick='openForm()'>+ Додати</button>

<div id='form-wrap' style="display: none;">
  <form role="form" action="{{route('sprav_teacher.store')}}" method="POST">
   {{ csrf_field() }} 
   <div class="form-group">
   <label for="namelong" class="col-form-label">Прізвище повне:</label>
    <textarea class="form-control" id="namelong" name="namelong"></textarea>
   </div>
  <div class="form-group">
  <label for="position" class="col-form-label">Назва посада:</label>
 <textarea class="form-control" id="position" name="position"></textarea>
</div>
 <div class="form-group">
 <label for="nameshort" class="col-form-label">ПІБ скорочено:</label>
 <textarea class="form-control" id="nameshort" name="nameshort"></textarea>
 </div>
 <button type="submit" class="btn btn-success" name="save" value="1">Отправить</button>
 </div> 
 </form>

<table style="width: 90%">
 <tr>
   <th>№</th>
   <th>ПІБ</th>
   <th>Посада</th>
   <th>ПІБ скорочено</th>
   <th>K</th>
   <th>D</th>
</tr>
<?php  $i=1  ?>
@foreach($teacher as $teachers)
<form method="post" action="{{route('sprav_teacher.store')}}">
   {{ csrf_field() }}
<tr>
 <td>{!!$i!!} </td>
 <td><input type="text" name="namelong" value="{!!$teachers->namelong!!}" class="form-control"> </td>
 <td><input type="text" name="position" value="{!!$teachers->position!!}" size="20px" class="form-control"> </td>
 <td><input type="text" name="nameshort" value="{!!$teachers->nameshort!!}" class="form-control"></td>
 <td><button type="submit" name="create" value="1"><i class="fa fa-edit"></i></button></td>
<td><button type="submit"  name="delete" value="2"><i class="fa fa-trash"></i></button></td>
<?php  $i++ ?>
</tr>
</form>
@endforeach
</table>
<br>
<p style="font-size: 40px;text-align: center;color:green" ><caption>Коригування вікладач - напрямок</caption> </p>
<table style="width: 90%">
   <tr>
   <th>№</th>
   <th>ПІБ</th>
   <th>Напрямок</th>
   <th></th>
   <th></th>
</tr>
<?php  $i=1  ?>
@foreach($dostypnost as $dostyp)
 <form role="form" action="{{route('sprav_teacher.store')}}" autocomplete="off" method="POST">
   {{ csrf_field() }}
<tr>
    <td>{!!$i!!} </td>
    <td>{!!$dostyp->namelong!!} </td>
    <input type="hidden" name="id" value="{!!$dostyp->id_teacher!!}">
    <td>
    <select name="direction" class="form-control">
     <option selected value="{{$dostyp->id_direction}}">{!!$dostyp->name_napravlenie!!}</option>
     @foreach($napr as $direct)
     <option  value="{!!$direct->id!!} " >{!!$direct->name_napravlenie!!}</option>
     @endforeach
     </select>
     </td>
     <td>
     <button type="submit" name="create1" value="1"><i class="fa fa-edit" style="background:lightblue" title="Коригувати"></i></button></td>
<td><button type="submit"  name="delete1" value="2" style="margin-left:15px;" title="Видалити"><i class="fa fa-trash" style="background:lightgrey"></i></button></td>
<?php  $i++ ?>
</tr>
</form>
@endforeach
<button type="button" class="btn btn-success" onclick='openForm()'>+ Додати</button>
<div id='form-wrap1' style="display: none;">
  <form role="form" action="{{route('sprav_teacher.store')}}" autocomplete="off" method="POST">
   {{ csrf_field() }} 
   <div class="form-group">
   <label for="recipient-name" class="col-form-label">ПІБ:</label>
   <select name="nameshort" class="form-control">
   <option selected>Оберіть ..</option>
   @foreach($teacher as $t)
   <option value="{!!$t->id!!}">{!!$t->nameshort!!}</option>
   @endforeach
   </select>
   </div>
<div class="form-group">
<label for="message-text" class="col-form-label">Напрямок:</label>
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
 document.getElementById("form-wrap1").style.display='block';
}

</script>

@endsection
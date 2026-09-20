@extends('layouts.baseteacher')
@include('layouts.instruction.kerivnuk.teather')
@section('content')

<style> 
table {
 width: 100%;
 border: 1px solid #dee2e6;
 text-align: center;
}
th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
}
td { border: 1px solid #dee2e6;
} /**/
  thead {
    color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
}
.layer {
 overflow: scroll; /* Добавляем полосы прокрутки */
}
input[type=text] {
    border: none;
    border-bottom: 1px solid grey;
}
</style>

<div class="card card-info ">
<div class="card-header">
<!-- Подключаются кнопки курсов и десятков -->
<form method="GET"  action="">
  <div id="panel" style="width: 100%">
<label style="font-size: 15pt;">Панель налаштування журналу оцінок</label>
        <label style="margin-left: 60px;font-size: 15pt">Курс</label>
          <select  name="course" style="width: 50px;height: 25px;margin-left: 10px;">
           <option selected></option>
            <option  value="1"  @if(isset($c)) @if($c == 1) selected @endif @endif >1</option>
            <option value="2" @if(isset($c)) @if($c == 2) selected @endif @endif>2</option>
            <option value="3"  @if(isset($c)) @if($c == 3) selected @endif @endif>3</option>
            <option value="100"  @if(isset($c)) @if($c == 100) selected @endif @endif> Усі</option>
          </select>

      <button type="submit" class="btn-light" style="margin-left: 10px;width: 80px;">Обрати</button>
   </form>
</div>
</div>
</div>
  @if (session('message-updated'))
                         @component('admink.components.alert')
                             @slot('type')
                                 success
                             @endslot
                             {!! session('message-updated') !!}
                         @endcomponent
                      @endif          
<form method="post" action="{{asset('students_course')}}">
      {{ csrf_field() }}
<ul class="nav nav-tabs">
<!--   <li class="nav-item">
    <a class="nav-link active" href="#">Зареєстровані</a></li>
 <li > -->
  <a  class="nav-link btn-outline-success"  href="#"><button type="submit" name="last" value="1"  style = "
  @if(isset($_GET['course']) && $_GET['course'] == '100') display:block @else  display:none @endif"> Перехід +1 курс (УСІ)</button></a>
  </li>
<!--    <li >
    <a class="nav-link btn-outline-danger" name="del" href="#"><button type="submit" name="del" value="2"> Видалити</button></a>
  </li> -->
 
  <!-- <li class="nav-item">
    <a class="nav-link" href="{{asset('admink.timetableone')}}">Розклад</a>
  </li> -->
</ul>
 

<div class="table-responsive" style="height: 600px;width: 70%">
    <table >
     <thead>
       <tr>
<th><input class=" btn-danger" type=button  value="№" onclick="selectAll(this)" id="all"></th>
          
            <th >Прізвище</th>
            <th >Курс</th>
            <th >Десяток</th>
            <th >Комментар</th>
            <th ><i class="bi bi-pencil"></i></th>
            <!-- <th ><input class=" btn-danger" type=button  value="№" onclick="selectAll(this)" id="all">Комментар</th> -->
             </tr>
      </thead>
   <tbody>

<!--   Убрать чек только на юзера -->
    <?php  $i=1;?>
        @foreach ($profiles as $student)
       <tr>
<td><?= $i   ?> <br><input type=checkbox  data = "{{$student->user_id}}"   onclick="this.nextSibling.style.display=this.checked?'':'none';"><input type="hidden" name="user_id[]"  value="{{$student->user_id}}"> 
</td>
<td title="{{$student->user_id}}">{{$student->surname}} {{$student->name}}<!-- <input type="hidden"  value="{{$student->user_id}}">  --></td>
<td>{{$student->course}} <input type="hidden" name=course[] value="{{$student->course}}"> </td>
<td>{{$student->decatki}}</td>

<td width="60px"><input type="text" id="comments" width="60px" placeholder="Причина отчисления"></td>

<td style="width: 5%"> <button class="btn btn-info " id="korect" type="button" style="margin-left: 0px;margin-right: 0px;padding-left: 0px;padding-right: 0px;" > Корригувати </button> </td>
</tr>
               <?php $i++;  ?>
        @endforeach
        </tbody>
    </table>
    </form>

@endsection


@section('js')
<script>
      alert('ok');
    $(document).ready(function () {
  alert('ok');

   function selectAll(btn) {
  btn.checkValue = (btn.checkValue != "on")? "on" : "off";
  var value = btn.checkValue == "on";
  
  var boxes = document.querySelectorAll("table input[type='checkbox']");
  for (var i = 0; i < boxes.length; i++) {
    boxes[i].checked = value;
  }
}


 $('body').on('click', '#korect', function() {
  alert('ok');
});

}

 </script>
@endsection
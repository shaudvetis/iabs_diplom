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
@include('admink.include.naprav_settings.course') 
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
  <li class="nav-item">
    <a class="nav-link active" href="#">Зареєстровані</a></li>
 <li >
  <a  class="nav-link btn-outline-success"  href="#"><button type="submit" name="last" value="1"> Перехід +1 курс</button></a>
  </li>
   <li >
    <a class="nav-link btn-outline-danger" name="del" href="#"><button type="submit" name="del" value="2"> Видалити</button></a>
  </li>
 
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
            <!-- <th ><input class=" btn-danger" type=button  value="№" onclick="selectAll(this)" id="all">Комментар</th> -->
             </tr>
      </thead>
   <tbody>

<!--   Убрать чек только на юзера -->
    <?php  $i=1;?>
        @foreach ($profiles as $student)
       <tr>
<td><?= $i   ?> <br><input type=checkbox name=id_intern1[] value="{{$student->user_id}}"   onclick="this.nextSibling.style.display=this.checked?'':'none';"><input type="text" style="display: none" name="comments[]"  placeholder="Причина отчисления"> 
</td>
<td title="{{$student->user_id}}">{{$student->surname}} {{$student->name}}<!-- <input type="hidden"  value="{{$student->user_id}}">  --></td>
<td>{{$student->course}} <input type="hidden" name=course[] value="{{$student->course+1}}"> </td>
<td>{{$student->decatki}}</td>

<td width="60px"><input type="text" name="commentss[]" width="60px" placeholder="Причина отчисления"></td>

  </tr>
               <?php $i++;  ?>
        @endforeach
        </tbody>
    </table>
    </form>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script type="text/javascript">
   function selectAll(btn) {
  btn.checkValue = (btn.checkValue != "on")? "on" : "off";
  var value = btn.checkValue == "on";
  
  var boxes = document.querySelectorAll("table input[type='checkbox']");
  for (var i = 0; i < boxes.length; i++) {
    boxes[i].checked = value;
  }
}

           </script>
@endsection
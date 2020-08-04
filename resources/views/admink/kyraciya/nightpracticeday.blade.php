@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.zvitnichni')
@section ('content')

<style> 
  table {
    width: 100%;
   border: 1px solid #dee2e6;
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
     fieldset.scheduler-border {
   border: solid 1px #DDD !important;
   padding: 0 10px 10px 10px;
   border-bottom: none;
}
legend.scheduler-border {
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
}
</style>

<div class="alert alert-info" role="alert">
<h5>Звіти Інтернів</h5>
</div>

<!-- Участие в операциях -->
    <form method="POST"  action="{{asset('admink.kyraciya.nightpracticeday')}}">
         {{ csrf_field() }}  
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Панель налаштування звіту</legend>
<div style="margin-left: 10px;" class="row">
  <div class="form-group col-md-2">
      <label >Курс</label>
      <select  name="course" class="form-control">
        <option @if(isset($a)) @if($a == 0) selected @endif @endif>Оберіть...</option>
        <option name="1" value="1"  @if(isset($a)) @if($a == 1) selected @endif @endif >1</option>
        <option value="2" @if(isset($a)) @if($a == 2) selected @endif @endif>2</option>
        <option value="3"  @if(isset($a)) @if($a == 3) selected @endif @endif>3</option>
      </select>
    </div>
    <div class="form-group col-md-2">
        <label >Десяток</label>
      <select name="decatki" class="form-control">
        <option selected>Оберіть...</option>
        <option  name="1" value="1"  @if(isset($b)) @if($b == 1) selected @endif @endif>1</option>
        <option value="2"  @if(isset($b)) @if($b == 2) selected @endif @endif>2</option>
        <option value="3"  @if(isset($b)) @if($b == 3) selected @endif @endif>3</option>
        <option value="4"  @if(isset($b)) @if($b == 4) selected @endif @endif>4</option>
      </select>
</div>
<div class="form-group col-md-3">
    <label >Навичка</label>
      <select name="navuchka" class="form-control">
        <option selected>Оберіть...</option>
        
        <option value="5" @if(isset($c)) @if($c == 5) selected @endif @endif>Чергування у стационарі</option>
        <option value="6" @if(isset($c)) @if($c == 6) selected @endif @endif>Чергування у приймальному відділенні</option>
      </select>
</div>
<div class="form-group col-md-2">
   <label>Фільтр кількість днів</label>
   <input type="hidden" name="calendarpo" value="{{date('Y-m-d')}}">
   <select type="text" name="calendars" class="form-control" style="width:150px;" value="@if(isset($calendars)) {{$calendars}} @else  @endif">
    <option>  </option>
    <option value="{{date('Y-m-d',strtotime('-7 days'))}}">За 7 днів</option>
    <option value="{{date('Y-m-d',strtotime('-30 days'))}}">За 30 днів</option>
    <option value="{{date('Y-m-d',strtotime('-90 days'))}}">За 3 місяця</option>
    <option value="{{date('Y-m-d',strtotime('-180 days'))}}">За 6 місяця</option>
    <option value="{{date('Y-m-d',strtotime('-365 days'))}}">За 1 рік</option>
    <option value="{{date('Y-m-d',strtotime('-730 days'))}}">За 2 роки</option>
    <option value="{{date('Y-m-d',strtotime('-1095 days'))}}">За 3 роки</option>
   </select>
 </div>
 <div class="form-group">
  <button type="submit"  style="margin-top: 31px;margin-left: 1px;" class="btn btn-primary">Показати</button>
 </div>
 </div>
</fieldset>
</form>


@isset($c)

@if($c==6)
<div style="width: 100%;height: 30%;" class="layer">
<table style="width: 100%;height: 30%;" class="table-xs layer">
<tr>
@foreach($result6 as $user_inf)
<td  colspan="5" style = "font-size:15pt;border: none;background:silver"><strong>{{ $user_inf['surname'] }} {{ $user_inf['name'] }} <!-- {{ $user_inf['user_id'] }} --></strong></td>
</tr> 

<tr>
<th style="color:#17a2b8;text-align:center;">#</th>
        <th>Дата</th>
        <th>База</th>
        <th>Тривалість чергування</th>
        <th >Місце чергування </th>

        <!-- <th>ФІО хворого</th> -->
        <th>Діагноз</th>

        <th>Відмова в госпіталізації</th>
        <th>№ запису </th>
        <th>Причина відмови</th>
        <th>Виконані маніпуляції при відмові</th>
        <th>Вид участі</th>

        <th>Госпіталізація</th>
        <th> № карти стац.хворого</th>
        <th>Виконані маніпуляції при госп.</th>
        <th>Вид участі</th>
</tr> 
<?php $i=1 ?>
 @foreach($user_inf['station_work'] as $index => $value)

<?php  
//Формируем пустые ячейки для таблицы
  $date_work = '';
  $baza = '';
  $time_work_as = '';
  $station_work = '';
$fio = '';
  $diagnosespriom = '';
  $otkaz = '';
  $num_cardotkaz = '';
   $prichina= '';
  $manipulaciiotkaz='';
  $type_workotkaz='';
  $gosp='';
  $num_card = '';
    $work = '';
      $type_workgosp = '';

  //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
      if(isset($user_inf['date_work']))
 {
  $date_work = $user_inf['date_work'][$index];
}
 if(isset($user_inf['diagnosespriom']))
 {
  
 $baza = $user_inf['baza'][$index];
 $num_card = $user_inf['num_card'][$index];
 
 $time_work_as = $user_inf['time_work'][$index];
 $station_work = $user_inf['station_work'][$index];
 $fio = $user_inf['fio'][$index];
 $diagnosespriom = $user_inf['diagnosespriom'][$index];
 $prichina = $user_inf['prichina'][$index];
 $otkaz = $user_inf['otkaz'][$index];
  $gosp = $user_inf['gosp'][$index];
 $num_cardotkaz = $user_inf['num_cardotkaz'][$index];
 $manipulaciiotkaz = $user_inf['manipulaciiotkaz'][$index];
 $type_workotkaz = $user_inf['type_workotkaz'][$index];
  $num_card = $user_inf['num_card'][$index];
 $work = $user_inf['work'][$index];
 $type_workgosp = $user_inf['type_workgosp'][$index];
 } ?>

<tr>
  <td><?= $i ?></td>
  <td>{!!\Carbon\Carbon::parse($date_work)->format('d/m/Y')!!}</td>
  <td>{!!$baza!!}</td>
 <td>{{$time_work_as}}</td>
@if ($user_inf['station_work']==2)
        <td>Приймальне відділення</td>
@else <td>  </td>
@endif
  <!-- <td>{!!$fio!!}</td> -->
  <td>{!!$diagnosespriom!!}</td>
@if ($user_inf['otkaz']==1)
        <td>Відмова</td>
@else <td>  </td>
@endif

  <td>{!!$num_cardotkaz!!}</td>
   <td>{!!$prichina!!}</td>
<td>{!!$manipulaciiotkaz!!}</td> 
   <td>{!!$type_workotkaz!!}</td>

@if ($user_inf['gosp']==2)
        <td>Госпіталізація</td>
@else <td>  </td>
@endif

  <td>{!!$num_card!!}</td> 
   <td>{!!$work!!}</td>

  <td>{!!$type_workgosp!!}</td> 
  <?php $i++;  ?>
  </tr> 


@endforeach
 </tr>
@endforeach

</table>
</div>
@endif

@endisset



@isset($c)

@if($c==5)

<table class="table-sm">
<tr>
@foreach($result5 as $user_inf)


<td colspan="7" style = "font-size:15pt;border: none;background:silver"><strong>{{ $user_inf['surname'] }} {{ $user_inf['name'] }}<!-- {{ $user_inf['user_id'] }} --></strong></td>

</tr> 

<tr>
<td>#</td>
 <th style="color:#17a2b8;text-align:center;">Дата чергування</th>
        <th>База чергування</th>
        <th>Тривалість чергування</th>
        <th >Місце чергування </th>
      <th> ФІО хворого</th>
      <th>№ карти стац.хворого</th>
      <th>Диагноз</th>
      <th>Операція</th>
      <th>Вид участі</th>
</tr> 
<?php $i=1; ?>
 @foreach($user_inf['date_work'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $date_work = '';
  $baza = '';
  $time_work_as = '';
  $station_work = '';
  $fiostacionar = '';
  $num_cardstacionar = '';
  $diagnosesstac = '';
  $oper = '';
  $type_workstac= '';
  //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['date_work']))
 {
  $date_work = $user_inf['date_work'][$index];
 $baza = $user_inf['baza'][$index];
  
 $time_work_as = $user_inf['time_work'][$index];
 $station_work = $user_inf['station_work'][$index];

 $fiostacionar= $user_inf['fiostacionar'][$index];
 $num_cardstacionar = $user_inf['num_cardstacionar'][$index];
 $diagnosesstac = $user_inf['diagnosesstac'][$index];
 $oper = $user_inf['oper'][$index];
 $type_workstac = $user_inf['type_workstac'][$index];
} ?>

<tr>
   <td><?= $i ?></td>
  <td>{!!\Carbon\Carbon::parse($date_work)->format('d/m/Y')!!}</td>
  <td>{!!$baza!!}</td>
 <td>{{$time_work_as}}</td>
@if ($user_inf['station_work']==1)
        <td>Стационар</td>
@else <td>  </td>
@endif
  <td>{!!$fiostacionar!!}</td>
  <td>{!!$num_cardstacionar!!}</td>
  <td>{!!$diagnosesstac!!}</td>
  <td>{!!$oper!!}</td>
  <td>{!!$type_workstac!!}</td>
 

   </tr> 
     <?php $i++;  ?>

 @endforeach
</tr>
@endforeach
 </tr>
</table>
@endif

@endisset




@endsection
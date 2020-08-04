@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.zvitkyraciya')
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
head {
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
    <form method="POST"  action="{{asset('admink.kyraciya.cherevna')}}">
         {{ csrf_field() }}  
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Панель налаштування звіту</legend>
<div style="margin-left: 10px;" class="row">
  <div class="form-group col-md-1">
      <label >Курс</label>
      <select  name="course" class="form-control">
        <option @if(isset($a)) @if($a == 0) selected @endif @endif>Оберіть...</option>
        <option name="1" value="1"  @if(isset($a)) @if($a == 1) selected @endif @endif >1</option>
        <option value="2" @if(isset($a)) @if($a == 2) selected @endif @endif>2</option>
        <option value="3"  @if(isset($a)) @if($a == 3) selected @endif @endif>3</option>
      </select>
    </div>
    <div class="form-group col-md-1">
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
        <!-- <option value="1"  @if(isset($c)) @if($c == 1) selected @endif @endif>Участь в операціях</option> -->
        <option value="2" @if(isset($c)) @if($c == 2) selected @endif @endif>Курація хворих</option>
        <option value="3" @if(isset($c)) @if($c == 3) selected @endif @endif>Засвоєні навички</option>
        <option value="4" @if(isset($c)) @if($c == 4) selected @endif @endif>Засвоєна література</option>
        </select>
</div>
   <div class="form-group col-md-3">
    <label >Напрямок</label>
      <select name="direction" class="form-control">
        <option selected>Оберіть...</option>
        @foreach($direction as $direct)
        <option value="{!!$direct->id!!}" @if(isset($d)) @if($d == $direct->id) selected @endif @endif> {!!$direct->direction!!}  </option>
        @endforeach
        </select>
    </div>
 <div class="form-group col-md-2">
   <label>Фільтр кількість днів</label>
   <input type="hidden" name="calendarpo" value="{{date('Y-m-d')}}">
   <select type="text" name="calendars" class="form-control" style="width:150px;" value="@if(isset($calendars)) {{$calendars}} @else  @endif">
    <option>  </option>
     <option value="{{date('Y-m-d',strtotime('-7 days'))}}"> За 7 днів</option>
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
@if($c==2)
<table style="text-align:center;">
   <tr>
     <td colspan="4"></td>
     <th colspan="6">Участь в операціях</th>
    </tr>
  <tr>
  <th>#</th>  
<th> ФІО інтерна</th>
<th>Курація хворих</th>
<th >Прооперував</th>
<th>Асистенція</th>
<th>Самостійно</th>
<th>Етапи операції</th>
<td>user_id</th>

   <?php $y=1; ?>
@foreach($opers as $value)
<tr>

<td><?= $y  ?></td> 
<td> {!!$value->surname!!} {!!$value->name!!}</td>
<td>{!!$value->diagnoses!!}</td>
<td>{!!$value->oper!!}</td>
<td>{!!$value->asistent!!}</td>
<td>{!!$value->samost!!}</td>
<td>{!!$value->etap!!}</td>
<td>{!!$value->user_id!!}</td>

<?php  $y++;?>
</tr>
@endforeach
</table>
<div class="table-responsive">
<table style="width: 100%">
<tr>
@foreach($result2 as $user_inf)
<td colspan="7" style = "font-size:15pt;border: none;background:silver"><strong>{{ $user_inf['surname'] }} {{ $user_inf['name'] }}</strong></td>
</tr> 
<tr>
<th style="color:#17a2b8;width: 20px;">Місце роботи</th>
<th style="color:#17a2b8;width: 400px;">Діагноз</th>
<th style="color:#17a2b8;width: 100px;">№ карти</th>
<th style="color:#17a2b8;width: 40px;">№операції</th>
<th style="color:#17a2b8;width: 300px;" >Назва операції</th>
<th style="color:#17a2b8;width: 200px;">Вид участі</th>
<th style="color:#17a2b8;width: 100px;">Початок курації</th>
<th style="color:#17a2b8;width: 100px;">Кінець курації</th>
 </tr> 
@foreach($user_inf['fio'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $fio = '';
  $diagnoses = '';
  $num_card = '';
  $apdate = '';
  $comm = '';
  $apdate_end = '';
   $oper = '';
  $type_work = '';
  //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['fio']))
 {
 $fio = $user_inf['fio'][$index];
 $diagnoses = $user_inf['diagnoses'][$index];
 $num_card = $user_inf['num_card'][$index];
 $apdate = $user_inf['apdate'][$index];
 $comm = $user_inf['comm'][$index];
 $apdate_end = $user_inf['apdate_end'][$index]; 
 $oper = $user_inf['oper'][$index];
 $type_work = $user_inf['type_work'][$index];
 } ?>
 <tr>
<td>{!!$fio!!}</td>
<td>{!!$diagnoses!!}</td>
<td>{!!$num_card!!}</td>
<td>{!!$comm!!}</td>
<td>{!!$oper!!}</td>
<td>{!!$type_work!!}</td>
<td>{!!\Carbon\Carbon::parse($apdate)->format('d/m/Y')!!}</td>

<td>{!!\Carbon\Carbon::parse($apdate_end)->format('d/m/Y')!!}</td>
 </tr>
@endforeach
@endforeach
 </tr>
</table>
</div>
@endif

@endisset

@isset($c)

@if($c==3)
<table class="table-sm">
<tr>
@foreach($result4 as $user_inf)
<td colspan="3" style = "font-size:15pt;border: none;background:silver"><strong>{{ $user_inf['surname'] }} {{ $user_inf['name'] }}</strong></td>
</tr> 

<tr>
<th style="color:#17a2b8;">Назва навички</th>
<th style="color:#17a2b8;">Інше</th>
<th style="color:#17a2b8;">Кількість</th>
</tr> 
 @foreach($user_inf['created_at'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $get_skills = '';
  $sum_number = '';
  $pract_cherevna = '';
  $pract_grudna = '';
  $pract_proct = '';
  $pract_urolog = '';
  $pract_vascular = '';
  $pract_gnoynaya = '';
  $pract_kardio = '';
  $pract_opiku = '';
   //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['created_at']))
 {
 $get_skills = $user_inf['get_skills'][$index];
 $sum_number = $user_inf['sum_number'][$index];
 $created_at = $user_inf['created_at'][$index];
 $pract_cherevna = $user_inf['pract_cherevna'][$index];
 $pract_grudna = $user_inf['pract_grudna'][$index];
 $pract_proct = $user_inf['pract_proct'][$index];
 $pract_urolog = $user_inf['pract_urolog'][$index];
 $pract_vascular = $user_inf['pract_vascular'][$index];
 $pract_gnoynaya = $user_inf['pract_gnoynaya'][$index];
 $pract_kardio = $user_inf['pract_kardio'][$index];
 $pract_opiku = $user_inf['pract_opiku'][$index];
 } ?>
<tr>


@if(!empty($pract_cherevna) )
<td>{!! $pract_cherevna !!}</td>
@endif

@if(!empty($pract_grudna) )
<td>{!! $pract_grudna !!}</td>
@endif
       
@if(!empty( $pract_proct) )
<td>{!! $pract_proct !!}</td>
@endif

@if(!empty($pract_urolog) )
<td>{!! $pract_urolog !!}</td>
@endif

@if(!empty($pract_vascular) )
<td>{!! $pract_vascular !!}</td>
@endif

@if(!empty($pract_gnoynaya) )
<td>{!! $pract_gnoynaya !!}</td>
@endif

@if(!empty($pract_kardio) )
<td>{!!$pract_kardio !!}</td>
@endif

@if(!empty($pract_opiku) )
<td>{!! $pract_opiku !!}</td>
@endif
<td></td>
@if(!empty($get_skills) )
<td>{!!$get_skills!!}</td>
@endif 

@if(!empty($sum_number) )
<td>{!! $sum_number!!}</td>
@endif 


</tr>
@endforeach
@endforeach
 </tr>
</table>
@endif

@endisset

@isset($c)

@if($c==4)

<table class="table-sm">
<tr>
@foreach($result3 as $user_inf)
<td  colspan="2" style = "font-size:15pt;border: none;background:silver"><strong> {{ $user_inf['surname'] }} {{ $user_inf['name'] }}</strong></td>
</tr> 

<tr>
<th style="color:#17a2b8;">Список прочитаної літератури:</th>
</tr> 
 @foreach($user_inf['literatyre'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $literatyre = '';

   //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['literatyre']))
 {
 $literatyre = $user_inf['literatyre'][$index];
 } ?>
<tr>
<td>{!!$literatyre!!}</td>
</tr>
@endforeach
@endforeach
 </tr>
</table>
@endif

@endisset



@endsection
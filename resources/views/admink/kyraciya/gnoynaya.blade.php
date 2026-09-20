@extends ('admink.layouts.app_admink')

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
    <form method="POST"  action="{{asset('admink.kyraciya.gnoynaya')}}">
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
        <option value="1"  @if(isset($c)) @if($c == 1) selected @endif @endif>Участь в операціях</option>
        <option value="2" @if(isset($c)) @if($c == 2) selected @endif @endif>Курація хворих</option>
        <option value="3" @if(isset($c)) @if($c == 3) selected @endif @endif>Засвоєні навички</option>
        <option value="4" @if(isset($c)) @if($c == 4) selected @endif @endif>Засвоєна література</option>
        
      </select>
</div>

 <div class="form-group">
  <button type="submit"  style="margin-top: 31px;" class="btn btn-primary">Показати</button>
 
</div>
 </div>
</fieldset>
</form>




@isset($c)

@if($c==1)

<table class="table-sm">
<tr>
@foreach($result1 as $user_inf)
<td  colspan="5" style = "font-size:15pt;border: none;background:silver"><strong>{{ $user_inf['surname'] }} {{ $user_inf['name'] }}</strong></td>
</tr> 

<tr>
<th style="color:#17a2b8;">Що зроблено</th>
<th style="color:#17a2b8">Асистенція</th>
<th style="color:#17a2b8">№ операції</th>
<th style="width:100px;color:#17a2b8" >Дата</th>
<th style="width:200px;color:#17a2b8">Дата вводу</th>
 </tr> 
 @foreach($user_inf['viewsurgery'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $viewsurgery = '';
  $type_work = '';
  $num_surgery = '';
  $apdate = '';
  $created_at = '';
  //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['viewsurgery']))
 {
 $viewsurgery = $user_inf['viewsurgery'][$index];
 $type_work = $user_inf['type_work'][$index];
 $num_surgery = $user_inf['num_surgery'][$index];
 $apdate = $user_inf['apdate'][$index];
 $created_at = $user_inf['created_at'][$index];
 } ?>
<tr>
<td>{!!$viewsurgery!!}</td>
<td>{!!$type_work!!}</td>
<td>{!!$num_surgery!!}</td>
<td>{!!\Carbon\Carbon::parse($apdate)->format('d/m/Y')!!}</td>
<td>{!!\Carbon\Carbon::parse($created_at)->format('d/m/Y H:i:s')!!}</td>
   </tr> 

 @endforeach

@endforeach
 </tr>
</table>
@endif

@endisset



@isset($c)

@if($c==2)

<table class="table-sm">
<tr>
@foreach($result2 as $user_inf)


<td colspan="7" style = "font-size:15pt;border: none;background:silver"><strong>{{ $user_inf['surname'] }} {{ $user_inf['name'] }}</strong></td>

</tr> 

<tr>
<th style="color:#17a2b8;">ФІО хворого</th>
<th style="color:#17a2b8;">Діагноз</th>
<th style="color:#17a2b8;">№ карти</th>
<th style="color:#17a2b8;">Початок курації</th>
<th style="color:#17a2b8;">Коментар</th>
<th style="color:#17a2b8;">Кінець курації</th>
<th style="width:200px;color:#17a2b8;">Дата вводу</th>

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
  $created_at = '';
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
 $created_at = $user_inf['created_at'][$index];
 } ?>
 <tr>
<td>{!!$fio!!}</td>
<td>{!!$diagnoses!!}</td>
<td>{!!$num_card!!}</td>
<td>{!!\Carbon\Carbon::parse($apdate)->format('d/m/Y')!!}</td>
<td>{!!$comm!!}</td>
<td>{!!\Carbon\Carbon::parse($apdate_end)->format('d/m/Y')!!}</td>
<td>{!!\Carbon\Carbon::parse($created_at)->format('d/m/Y H:i:s')!!}</td>
   </tr>

 @endforeach

@endforeach
 </tr>
</table>
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
<th style="color:#17a2b8;">Кількість</th>
<th style="color:#17a2b8;">Дата вводу</th>
 </tr> 
 @foreach($user_inf['get_skills'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $get_skills = '';
  $sum_number = '';
  $created_at = '';

   //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['get_skills']))
 {
 $get_skills = $user_inf['get_skills'][$index];
 $sum_number = $user_inf['sum_number'][$index];
 $created_at = $user_inf['created_at'][$index];
 } ?>
<tr>
<td>{!!$get_skills!!}</td>
<td>{!!$sum_number!!}</td>
<td style="width: 200px;">{!!\Carbon\Carbon::parse($created_at)->format('d/m/Y H:i:s')!!}</td>
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
<th style="color:#17a2b8;">Дата вводу</th>
 </tr> 
 @foreach($user_inf['literatyre'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $literatyre = '';
  $created_at = '';

   //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['literatyre']))
 {
 $literatyre = $user_inf['literatyre'][$index];
 $created_at = $user_inf['created_at'][$index];
 } ?>
<tr>
<td>{!!$literatyre!!}</td>
<td style="width: 200px;">{!!\Carbon\Carbon::parse($created_at)->format('d/m/Y H:i:s')!!}</td>
</tr>
@endforeach
@endforeach
 </tr>
</table>
@endif

@endisset

@isset($c)

@if($c==5)

<table class="table-sm">
<tr>
@foreach($result5 as $user_inf)
<td  colspan="2" style = "font-size:15pt;border: none;background:silver"><strong> {{ $user_inf['surname'] }} {{ $user_inf['name'] }}</strong></td>
</tr> 

<tr>
<th style="color:#17a2b8;">Список прочитаної літератури:</th>
<th style="color:#17a2b8;">Дата вводу</th>
 </tr> 
 @foreach($user_inf['literatyre'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $literatyre = '';
  $created_at = '';

   //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['literatyre']))
 {
 $literatyre = $user_inf['literatyre'][$index];
 $created_at = $user_inf['created_at'][$index];
 } ?>
<tr>
<td>{!!$literatyre!!}</td>
<td style="width: 200px;">{!!\Carbon\Carbon::parse($created_at)->format('d/m/Y H:i:s')!!}</td>
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
<th style="color:#17a2b8;">Дата вводу</th>
 </tr> 
 @foreach($user_inf['literatyre'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $literatyre = '';
  $created_at = '';

   //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['literatyre']))
 {
 $literatyre = $user_inf['literatyre'][$index];
 $created_at = $user_inf['created_at'][$index];
 } ?>
<tr>
<td>{!!$literatyre!!}</td>
<td style="width: 200px;">{!!\Carbon\Carbon::parse($created_at)->format('d/m/Y H:i:s')!!}</td>
</tr>
@endforeach
@endforeach
 </tr>
</table>
@endif

@endisset

@endsection
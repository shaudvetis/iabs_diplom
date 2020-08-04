@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.test')
@section ('content')
<style>
	table {
 width: 100%;
 text-align: center;
}
th {
border-radius: 0.25rem;
text-align: center;
}
td { /* border: 1px solid #dee2e6;*/
text-align:center;
padding: 0px;
padding-bottom: 0px;
}
.smol_input   {
 height: 30px;
 width: 30px;
 padding:0px;padding-left: 0px;
}
.smol_td   {
  height: 30px;
  width: 30px;
  padding:0px;padding-left: 0px;
}
</style>
<form method="GET"  action="">
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
     <label >Напрямок</label>
      <select name="direction" class="form-control">
        <option selected>Оберіть...</option>
        @foreach($direction as $direct)
        <option value="{!!$direct->id!!}" @if(isset($d)) @if($d == $direct->id) selected @endif @endif> {!!$direct->direction!!}  </option>
        @endforeach
        </select>
    </div>
  <div class="form-group">
  <button type="submit"  style="margin-top: 31px;margin-left: 1px;" class="btn btn-primary">Показати</button>
  </div>
 </div>
</fieldset>
</form>
<div class="card card-body" style="width: 90%">
<table style="text-align:center;"class="table table-hover" cellspacing="0" cellpadding="0">
   <tr>
     <th colspan="6">Введення відсотків</th>
     <th colspan="9">Результати тестування</th>
    </tr>
  <tr style="background:lightgreen">
  <th>#</th>  
  <th> ФІО інтерна</th>
  <th>% - 1</th>
  <th>% - 2</th>
  <th>% - 3</th>
  <th>% - 4</th>
  <th>Бал - 1</th>
  <th>Бал - 2</th>
  <th>Бал - 3</th>
  <th>Бал - 4</th>
  <th style="background:lightgreen">Разом  балів</th>
  </tr>
 <?php $y=1; ?>
 @isset($student)
 <form method="POST"  action="{{route('test.store')}}">
         {{ csrf_field() }} 
@foreach($student as $students)
<input type="hidden" name="user_id[]" value="{{$students->user_id}}"> 
<input type="hidden" name="direction[]" value="@if(!empty($_GET['direction'])) {!!$_GET['direction']!!} @endif">
<tr>
 <td style="width: 10px"><?= $y  ?></td>
 <td style="width: 250px"><i>{{$students->surname}} {{$students->name}}</i> <!-- {{$students->user_id}} --></td>
 <td class="smol_td"><input type="text"  class="smol_input" name="proc1[]" value="{{$students->proc1}}"></td>
<td class="smol_td"><input type="text" class="smol_input" size="1px" name="proc2[]" value="{{$students->proc2}}"></td>
<td class="smol_td"><input type="text" class="smol_input" size="1px" name="proc3[]" value="{{$students->proc3}}"></td>
<td class="smol_td"><input type="text" class="smol_input" size="1px" name="proc4[]" value="{{$students->proc4}}"></td>
<td style="background:lightgrey" class="smol_td">
<input type="hidden" name="bal1[]" value="<?php $sum=$students->proc1; 
if (($sum<=100)&&($sum>=76))
{
echo "5";
}elseif (($sum<=75)&&($sum>=61)) {
echo "4";
}elseif (($sum<=60)&& ($sum>=50)) {
echo "3";
}elseif (($sum<=50)&& ($sum>=1))  {
echo "2";} 
elseif ($sum<=0)  {
echo "";}  ?>">
<?php $sum=$students->proc1; 
if (($sum<=100)&&($sum>=76))
 {
 echo "5";
 }elseif (($sum<=75)&&($sum>=61)) {
   echo "4";
 }elseif (($sum<=60)&& ($sum>=50)) {
   echo "3";
 }elseif (($sum<=50)&& ($sum>=1))  {
  echo "2";} 
   elseif ($sum<=0)  {
  echo "";}  ?></td>

<td style="background:lightgrey" class="smol_td"><input type="hidden"  name="bal2[]" value=" <?php $sum=$students->proc2; 
if (($sum<=100)&&($sum>=76))
 {
 echo "5";
 }elseif (($sum<=75)&&($sum>=61)) {
   echo "4";
 }elseif (($sum<=60)&& ($sum>=50)) {
   echo "3";
 }elseif (($sum<=50)&& ($sum>=1))  {
  echo "2";} 
   elseif ($sum<=0)  {
  echo "";}  ?>">
<?php $sum=$students->proc2; 
if (($sum<=100)&&($sum>=76))
 {
 echo "5";
 }elseif (($sum<=75)&&($sum>=61)) {
   echo "4";
 }elseif (($sum<=60)&& ($sum>=50)) {
   echo "3";
 }elseif (($sum<=50)&& ($sum>=1))  {
  echo "2";} 
   elseif ($sum<=0)  {
  echo "";}  ?></td>

<td style="background:lightgrey" class="smol_td"><input type="hidden" name="bal3[]" value="<?php $sum=$students->proc3; 
	if (($sum<=100)&&($sum>=76))
 {
 echo "5";
 }elseif (($sum<=75)&&($sum>=61)) {
   echo "4";
 }elseif (($sum<=60)&& ($sum>=50)) {
   echo "3";
 }elseif (($sum<=50)&& ($sum>=1))  {
 echo  "2";} 
   elseif ($sum<=0)  {
  echo " ";}  ?>">
<?php $sum=$students->proc3; 
if (($sum<=100)&&($sum>=76))
 {
 echo "5";
 }elseif (($sum<=75)&&($sum>=61)) {
   echo "4";
 }elseif (($sum<=60)&& ($sum>=50)) {
   echo "3";
 }elseif (($sum<=50)&& ($sum>=1))  {
  echo "2";} 
   elseif ($sum<=0)  {
  echo "";}  ?></td>

<td style="background:lightgrey" class="smol_td"><input type="hidden" name="bal4[]" value="<?php $sum=$students->proc4; 
if (($sum<=100)&&($sum>=76))
 {
 echo "5";
 }elseif (($sum<=75)&&($sum>=61)) {
   echo "4";
 }elseif (($sum<=60)&& ($sum>=50)) {
   echo "3";
 }elseif (($sum<=50)&& ($sum>=1))  {
  echo "2";} 
   elseif ($sum<=0)  {
  echo "";} ?>" >
	<?php $sum=$students->proc4; 
	if (($sum<=100)&&($sum>=76))
 {
 echo "5";
 }elseif (($sum<=75)&&($sum>=61)) {
   echo "4";
 }elseif (($sum<=60)&& ($sum>=50)) {
   echo "3";
 }elseif (($sum<=50)&& ($sum>=1))  {
 echo  "2";} 
   elseif ($sum<=0)  {
  echo "";} ?></td>

<td style="background:lightgrey;color:red;width:150px">{{$students->all_bal}}</td>
<?php  $y++;?>
</tr>
@endforeach

</table>
<button type="submit"  style="margin-top: 31px;margin-left: 1px;" class="btn btn-secondary ">Відправити</button>
 </form>
</div>
@endisset
@endsection
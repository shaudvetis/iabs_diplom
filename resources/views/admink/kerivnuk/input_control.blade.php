@extends('layouts.baseteacher')
@include('layouts.instruction.kerivnuk.input')
@section('content')

<style> 
  table {
   width: 100%;
   border: 1px solid #dee2e6;
  
}
th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  text-align:center;
}
td { border: 1px solid #dee2e6;
    text-align:center;
  } /**/
thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
}
.layer {
 overflow: scroll; /* Добавляем полосы прокрутки */
}
</style>
 <div class="card card-info">
          <div class="card-header">
            <h2 class="card-title">Заповнення вхідного контролю</h2>
            </div>
          </div>
<div class="card card-body>" style="width: 60%;margin-left: 10px;">
<form method="post" action="{{asset('admink.kerivnuk.input_control')}}">
	   {{ csrf_field() }}  
<div style='float:right;'>
 <div style='position: fixed;'>
  <div class="modal-footer">
   <button type="submit" class="btn btn-primary" name="sub">Відправити</button>
  </div>
 </div>
</div>
<table >
<tr>
    <th>№</th>
    <th>ФІО інтерна</th>
    <th>Оцінка знань 3\4\5\6 курс</th>
    <th style="width: 100px;">% Вхідний контроль</th>
    <th >Бал</th>
</tr>
<?php  $i=1  ?>
@foreach($input_control as $input_controls)
<tr>
	<input type="hidden" name="user_id[]" value="{{$input_controls->user_id}}">
    <td>{!!$i!!} /{{$input_controls->user_id}}  </td>
    <td>{!!$input_controls->surname!!} {!!$input_controls->name!!}</td>
    <td style="text-align:center;">{{$input_controls->course3}}\ {{$input_controls->course4}} \{{$input_controls->course5}} \{{$input_controls->course6}}</td>
    <td><input type="text" name="bal1[]" style="text-align:center;" value="{{$input_controls->bal1}}"><center></center></td>
    <td><?php $sum=$input_controls->bal1; 
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
    <?php  $i++ ?>

</tr>
@endforeach

</table>
{!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                    {{ Form::close() }}
</form>
</div>
@endsection
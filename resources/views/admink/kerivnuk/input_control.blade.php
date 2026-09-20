@extends('layouts.baseteacher')

<i class="fa fa-print prin " aria-hidden="true" style="width: 30px;height:30px; float:right; margin:0 2px; " onclick="printit();"></i>
@section('content')

<style> 
  table {
   width: 100%;
   border: 1px solid #dee2e6;
  
}
.view_table th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  text-align:center;
  width: 150px;

}
.view_table td { border: 1px solid #dee2e6;
    text-align:center;
    width: 150px;
   
  } /**/
thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
}
.layer {
 overflow: scroll; /* Добавляем полосы прокрутки */
}
blockquote {
width: 90%;
margin: 10;
background: #BCE8EA;
color: #131314;
padding: 30px 30px 30px 90px;
position: relative;
font-family: 'Lato', sans-serif;
}
 @media print {
    #printButton {
       display:none;
 }
  @media print {
    .no_print {
       display:none;
 }
   @media print {
 .prin {
       display:none;
 }
}

 .view_print{
  text-align: center;
 }
 .view_table{
  text-align: center;
  width: 100%;
  margin-left: 100px;
   border: 2px solid #dee2e6;
 }
  .td_view{
  text-align: center;
  width: 150px;
  margin: auto;
 }
 .view_print p{
  text-align: left;
 }
</style>
<!-- Начинается блок с формой печати -->
<div class="view_print" style="display: none;">
  <h3 class="view_print">Вхідний контроль</h3>
   <p>Дата __________ </p>
   <br>
   <h4 class="view_print"> Перший курс {{Carbon\Carbon::now()->format('Y')}} року</h4>
</div>
<!-- Закончился блок с формой печати -->

 <div class="card card-info no_print">
          <div class="card-header">
            <h2 class="card-title">Заповнення вхідного контролю</h2>
            </div>
          </div>
<div class="card card-body>" style="width: 60%;margin-left: 10px;">
<form method="post" action="{{asset('admink.kerivnuk.input_control')}}">
	   {{ csrf_field() }}  
<div class="no_print view_tab" style='float:right;'>
 <div style='position: fixed;'>
  
   <button type="submit" class="btn btn-primary no_print"  name="sub" style="margin-left: 10px;">Відправити</button>
   <blockquote>
<p > <cite>Дані в колонку <strong>% Вхідний контроль </strong> необхідно вводити округливши число в більшу сторону, без ком і крапок.</cite> </p>
</blockquote>
 </div>
</div>
<table class="view_table">
<tr class="view_tab">
    <th>№</th>
    <th>ФІО інтерна</th>
    <th >Оцінка знань 3\4\5\6 курс</th>
    <th style="width: 100px;">% Вхідний контроль</th>
    <th >Бал</th>
    <th class="view_tab">Ср.бал <br>за дипломом</th>
</tr>
<?php  $i=1  ?>
@foreach($input_control as $input_controls)
<tr>
	<input type="hidden" name="user_id[]" value="{{$input_controls->user_id}}">
    <td>{!!$i!!} <!-- /{{$input_controls->user_id}} -->  </td>
    <td title="{{$input_controls->user_id}}" class="td_view">{!!$input_controls->surname!!} {!!$input_controls->name!!}</td>
    <td style="text-align:center;" >{{$input_controls->course3}}\ {{$input_controls->course4}} \{{$input_controls->course5}} \{{$input_controls->course6}}</td>
    <td><input type="number" name="bal1[]" style="text-align:center;" value="{{$input_controls->bal1}}" title="Округлити до цілого чісла"><center></center></td>
    <td><?php $sum=$input_controls->bal1; 
if (($sum<=100)&&($sum>=95))
{
echo "5";
}elseif (($sum<=94)&&($sum>=80)) {
echo "4";
}elseif (($sum<=79)&& ($sum>=60)) {
echo "3";
}elseif (($sum<=60)&& ($sum>=1))  {
echo "2";} 
elseif ($sum<=0)  {
echo "";}  ?></td>



@if($input_controls->sr_ball != 0)   

<td><?php $r=$input_controls->sr_ball;
$rt=$input_controls->count_ball; 
$sr=  round($r/$rt, 2);?>{{$sr}} </td>  

<input type="hidden" name="sr_ball[]" value="{{$sr}}">
@else     
<td>{{$input_controls->sr_ball_made}}</td>
<div class="tab" >
<td class="tab" style="display: none"><input type="text" name="sr_ball[]" value="{{$input_controls->sr_ball_made}}">  </td>
</div>
@endif
    <?php  $i++ ?>

</tr>
@endforeach

</table>
{!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block no_print']) !!}
                    {{ Form::close() }}
</form>
</div>

<script>
$(document).ready(function() {
  $('.view_tab' ).click(function() {
  alert('ggrgr');
  })
});
function printit(){

//location.href='/admink.kerivnuk.include.input_controlprint';  // /index.php

$('.view_print').css('display','block');
$('.prin').css('display','none');
if (window.print) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2); 
}
}
</script>


@endsection
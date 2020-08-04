@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.ballstart')
@section ('content')
<style>
form { margin: 0px; }
input{
box-shadow: 1px 1px 2px 0 white;
text-align: center;
}
 table {
 width: 100%;
 border: 1px solid white;
 text-align: left;
 padding: 0 0 0 0;
 border-collapse: collapse;

 }
th {
border-radius: 0.25rem;
border: 1px solid #dee2e6;
text-align: center;
padding: 0 0 0 0;
margin: 0 0 0 0;
}
td {
border: 1px solid #dee2e6;
text-align:left;
padding: 0 0 0 10;
}
</style>
<form method="GET"  action="">
<fieldset class="scheduler-border">
  <legend class="scheduler-border">Панель налаштування звіту</legend>
   <div style="margin-left: 10px;" class="row">
    <div class="form-group col-md-2">
     <label >Курс</label>
      <select  name="course" class="form-control">
        <option @if(isset($c)) @if($c == 0) selected @endif @endif>Оберіть...</option>
        <option name="1" value="1"  @if(isset($c)) @if($c == 1) selected @endif @endif >1</option>
        <option value="2" @if(isset($c)) @if($c == 2) selected @endif @endif>2</option>
        <option value="3"  @if(isset($c)) @if($c == 3) selected @endif @endif>3</option>
      </select>
    </div>
    <div class="form-group col-md-2">
     <label >Десяток</label>
      <select name="decatki" class="form-control">
        <option selected>Оберіть...</option>
        <option value="1"  @if(isset($d)) @if($d == 1) selected @endif @endif>1</option>
        <option value="2"  @if(isset($d)) @if($d == 2) selected @endif @endif>2</option>
        <option value="3"  @if(isset($d)) @if($d == 3) selected @endif @endif>3</option>
        <option value="4"  @if(isset($d)) @if($d == 4) selected @endif @endif>4</option>
      </select>
    </div>
    <div class="form-group col-md-3">
     <label>Кафедра</label>
      <select name="kafedra" class="form-control">
        <option selected>Оберіть...</option>
        
        <option value="surgery" @if(isset($k)) @if($k == "surgery") selected @endif @endif> Хірургії №1</option>
        <option value="anest"  @if(isset($k)) @if($k == "anest") selected @endif @endif> Анестезіології</option>
        
        </select>
    </div>
  <div class="form-group">
  <button type="submit"  style="margin-top: 31px;margin-left: 1px;" class="btn btn-primary">Показати</button>
  </div>
 </div>
</fieldset>
</form>

@if (isset($_GET))
@if ($k=="surgery")
<table  cellpadding="0" cellspacing="0">
  <tr style="background:lightgrey">
  <th style="padding-bottom: 40px">#</th>
  <th style="padding-bottom: 40px;" >Призвище</th>
  <th style="font-size:medium;padding-bottom: 40px;">Вхідний<br>контроль </th>
  <th style="font-size:small;vertical-align:top;">База  <br> «Терапія» <p style="white-space: pre">(200 питань)</p></th>
  <th style="font-size:small;vertical-align:top;">База <br>«Інфекційні  <br> хвороби» <p style="white-space: pre">(200 питань)</p></th>
  <th style="font-size:small;vertical-align:top;">База <br>«Хірургія» <p style="white-space: pre">(200 питань) </p></th>
  <th style="font-size:small;vertical-align:top;">База<br>«Акушерство <br>та гінекологія»<p style="white-space: pre">(200 питань)</p></th>
  <th style="font-size:small;vertical-align:top;">База<br>«Педіатрія»<p style="white-space: pre">(200 питань)</p></th>
  <th style="font-size:medium;vertical-align:top;padding-bottom:30px;">Проміжний<br>контроль<p style="font-size:small;">(200 питань)</p></th>
  <th style="font-size:small;vertical-align:top;" >База <br>{{date('Y',strtotime('-3 year'))}} року <p style="white-space: pre">(200 питань)</p></th>
  <th style="font-size:small;vertical-align:top;">База  <br>{{date('Y',strtotime('-2 year'))}} року <p style="white-space: pre">(200 питань)</p></th>
  <th style="font-size:small;vertical-align:top;">Кінцевий <br> контроль  <p style="white-space: pre">(200 питань)</p></th>
<!--   <th style="font-size:small;padding-bottom: 40px">Оценка</th>
  <th style="font-size:small;padding-bottom: 40px">Сума</th> -->
  </tr>
    
 <tr> 
  <tbody>
  	<?php $y=1; ?>
  	<form method="post" action="{{asset('kroksurgery')}}">
  	 {{ csrf_field() }}

@foreach ($intern as $interns)  

<input type="hidden" name="kafedra[]" value="1">
<td>{!!$y!!}</td>
<td title="{{$interns->user_id}}"><i>{!!$interns->surname!!} {!!$interns->name!!}</i></td>
<input type="hidden" name="user_id[]" value="{{$interns->user_id}}">
<td style="background-color:lightgrey"><input type="text" style="background-color:lightgrey" size="2px" name="vk[]" value="{!!ceil($interns->vk)!!}"> <?php $sum=ceil($interns->vk); 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'."/ 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="bt[]" value="{!!$interns->bt!!}"> <?php $sum=$interns->bt; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="bin[]" value="{!!$interns->bin!!}"> <?php $sum=$interns->bin; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="bs[]" value="{!!$interns->bs!!}"> <?php $sum=$interns->bs; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="bak[]" value="{!!$interns->bak!!}"> <?php $sum=$interns->bak; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="bp[]" value="{!!$interns->bp!!}"> <?php $sum=$interns->bp; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td style="background-color: lightgrey;text-align: center;"><input type="text" style="background-color:lightgrey" size="1px" name="pk[]" value="{!!$interns->pk!!}">

  <?php $sum=$interns->pk; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="year1[]" value="{!!$interns->year1!!}"> <?php $sum=$interns->year1; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="year2[]" value="{!!$interns->year2!!}"> <?php $sum=$interns->year2; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td style="background-color: lightgrey"><input type="text" size="1px" name="kz[]" value="{!!$interns->kz!!}" style="background-color:lightgrey"> <?php $sum=$interns->kz; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<!-- <td><input type="text" size="1px" name="ocenka[]" value="{!!$interns->ocenka!!}"></td>
<td <?php if (100) {$t="red";} 
  else {$t="green";} ?>
   style="color:<?php echo $t; ?>;"><input type="hidden" size="1px"  name="sum[]">/18</td> -->
 </tr>
<?php $y++; ?>
@endforeach
</tbody>


</table>
<!-- <td style="width:5px;" class="col-md-6 col-sm-6 col-xs-6  widthbutton"> --><button  type="submit" class="btn btn-secondary btn-lg btn-block">Відправити </button><!-- </td> -->
</form>
@endif

@endisset



@if (isset($_GET))
@if ($k=="anest")
<table  cellpadding="0" cellspacing="0">
  <tr style="background:lightgrey">
  <th style="padding-bottom: 40px">#</th>
  <th style="padding-bottom: 40px;" >Призвище</th>
  <th style="font-size:medium;padding-bottom: 40px;">Вхідний<br>контроль </th>
  <th style="font-size:small;vertical-align:top;">Невідкладні <br>стани в <br>Терапії </th>
  <th style="font-size:small;vertical-align:top;">Невідкладні <br>стани в <br>Терапії <br>продовження<!-- <p style="white-space: pre">(200 питань)</p> --></th>
  <th style="font-size:small;vertical-align:top;">Невідкладні <br>стани в <br>Хірургії</th>
   <th style="font-size:small;vertical-align:top;">Невідкладні <br>стани в <br>Хірургії <br>продовження</th>
  <th style="font-size:small;vertical-align:top;">Невідкладні <br>стани в <br>Педіатрії</th>
  <th style="font-size:small;vertical-align:top;">Невідкладні <br>стани в <br>Акушерстві та <br>гінікілогії</th>
  <th style="font-size:small;vertical-align:top;padding-bottom:30px;">Невідкладні <br>стани в <br>інфекційних <br> хворобах</th>
  <th style="font-size:small;vertical-align:top;">Військово <br>медична <br>підготовка, <br>організаційні<br> питання</th>
  <th style="font-size:medium;vertical-align:top;">Проміжний <br>контроль</th>
  <th style="font-size:small;vertical-align:top;">Кінцевий <br> контроль <p style="white-space: pre">(200 питань)</p></th>
<!--   <th style="font-size:small;padding-bottom: 40px">Оценка</th>
  <th style="font-size:small;padding-bottom: 40px">Сума</th> -->
  </tr>
  
 <tr> 
 <?php $y=1; ?>
<form method="post" action="{{asset('kroksurgery')}}">
   {{ csrf_field() }}
@foreach ($internsa as $internanest)  

<input type="hidden" name="user_id[]" value="{{$internanest->user_id}}">
<input type="hidden" name="kafedra[]" value="2">
<td>{!!$y!!}</td>
<td title="{{$internanest->user_id}}" style="white-space: pre">{!!$internanest->surname!!} {!!$internanest->name!!}</td>
<td style="background-color:lightgrey"><input type="text" style="background-color:lightgrey" size="2px"  name="vk[]" value="{!!ceil($internanest->vk)!!}"> <?php $sum=ceil($internanest->vk);
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>

<td><input type="text" size="1px" name="m1[]" value="{!!$internanest->m1!!}"> <?php $sum=$internanest->m1; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="m1p[]" value="{!!$internanest->m1p!!}"> <?php $sum=$internanest->m1p; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="m2[]" value="{!!$internanest->m2!!}"> <?php $sum=$internanest->m2; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="m2p[]" value="{!!$internanest->m2p!!}"> <?php $sum=$internanest->m2p; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="m3[]" value="{!!$internanest->m3!!}"> <?php $sum=$internanest->m3; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td><input type="text" size="1px" name="m4[]" value="{!!$internanest->m4!!}"> <?php $sum=$internanest->m4; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>

<td><input type="text" size="1px" name="m5[]" value="{!!$internanest->m5!!}"> <?php $sum=$internanest->m5; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>


<td><input type="text" size="1px" name="m6[]" value="{!!$internanest->m6!!}"> <?php $sum=$internanest->m6; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td style="background-color: lightgrey;text-align: center;"><input type="hidden" style="background-color:lightgrey" size="1px" name="sum[]" >
  {!!$sum=ceil(($internanest->m1+$internanest->m1p+$internanest->m2+$internanest->m2p+$internanest->m3+$internanest->m4+$internanest->m5+$internanest->m6)/8) !!}

 <?php 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>
<td style="background-color: lightgrey"><input type="text" size="1px" name="kz[]" value="{!!$internanest->kz!!}" style="background-color:lightgrey"> <?php $sum=$internanest->kz; 
if (($sum<=100)&&($sum>=91))
{
echo " / 5";
}elseif (($sum<=90)&&($sum>=81)) {
echo " / 4";
}elseif (($sum<=80)&& ($sum>=71)) {
echo " / 3";
}elseif (($sum<70.5))  {
echo '<i style="color:red">'." / 2".'</i>';} 
?></td>

</tr>
<?php $y++; ?>
@endforeach
</table>
<button  type="submit" class="btn btn-secondary btn-lg btn-block" >Відправити</button>
</form>
@endif

@endisset


@endsection
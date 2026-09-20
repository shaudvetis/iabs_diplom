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
 
  <th>Бал - 1</th>
  <th>Бал - 2</th>
 
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

<td style="background:lightgrey" class="smol_td">
<input type="hidden" name="bal1[]" value="<?php $sum=$students->proc1; 
if (($sum<=100)&&($sum>=95))
{
echo "5";
}elseif (($sum<=94)&&($sum>=85)) {
echo "4";
}elseif (($sum<=84)&& ($sum>=75)) {
echo "3";
}elseif (($sum<=75)&& ($sum>=1))  {
echo "2";} 
elseif ($sum<=0)  {
echo "";}  ?>">
<?php $sum=$students->proc1; 
if (($sum<=100)&&($sum>=95))
 {
echo "5";
}elseif (($sum<=94)&&($sum>=85)) {
echo "4";
}elseif (($sum<=84)&& ($sum>=75)) {
echo "3";
}elseif (($sum<=75)&& ($sum>=1))  {
echo "2";} 
elseif ($sum<=0)  {
echo "";}  ?>">

<td style="background:lightgrey" class="smol_td"><input type="hidden"  name="bal2[]" value=" <?php $sum=$students->proc2; 
if (($sum<=100)&&($sum>=95))
 {
echo "5";
}elseif (($sum<=94)&&($sum>=85)) {
echo "4";
}elseif (($sum<=84)&& ($sum>=75)) {
echo "3";
}elseif (($sum<=75)&& ($sum>=1))  {
echo "2";} 
elseif ($sum<=0)  {
echo "";}  ?>">
<?php $sum=$students->proc2; 
if (($sum<=100)&&($sum>=95))
{
echo "5";
}elseif (($sum<=94)&&($sum>=85)) {
echo "4";
}elseif (($sum<=84)&& ($sum>=75)) {
echo "3";
}elseif (($sum<=75)&& ($sum>=1))  {
echo "2";} 
elseif ($sum<=0)  {
echo "";}  ?>"></td>

<input type="hidden" name="proc3[]" value="0"> 
<input type="hidden" name="proc4[]" value="0"> 
<input type="hidden" name="bal3[]" value="0"> 
<input type="hidden" name="bal4[]" value="0"> 
<td style="background:lightgrey;color:red;width:150px">{{$students->all_bal}}</td>
<?php  $y++;?>
</tr>
@endforeach

</table>
<button type="submit"  style="margin-top: 31px;margin-left: 1px;" class="btn btn-secondary ">Відправити</button>
 </form>
</div>
@endisset
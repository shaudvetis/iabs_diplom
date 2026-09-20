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
  .table-container {
  width: 100%;
  overflow: auto;
  -webkit-overflow-scrolling: touch;
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
        <option value="5"  @if(isset($b)) @if($b == 5) selected @endif @endif>5</option>
      </select>
    </div>
    <div class="form-group col-md-3">
     <label>Кафедра</label>
      <select name="kafedra" class="form-control">
        <option selected>Оберіть...</option>
        
        <option value="12" @if(isset($k)) @if($k == "12") selected @endif @endif> Хірургії №1</option>
        <option value="13"  @if(isset($k)) @if($k == "13") selected @endif @endif> Анестезіології</option>
        
        </select>
    </div>
  <div class="form-group">
  <button type="submit"  style="margin-top: 31px;margin-left: 1px;" class="btn btn-primary">Показати</button>
  </div>
 </div>
</fieldset>
</form>

@if (isset($_GET))

<div class="table-container">
<table  cellpadding="0" cellspacing="0">
  <tr style="background:lightgrey">
  <th style="padding-bottom: 40px">#</th>
  <th style="padding-bottom: 40px;" >Призвище</th>
  <th style="font-size:small;width:150px">Вхідний<br>контроль <br> Н\Б</th>
  <th style="font-size:small;width:150px">Проміжний контроль <br> Н\Б</th>
  <th style="font-size:small;width:150px">Кінцевий контроль<br> Н\Б</th>
  <th style="font-size:small;width:200px">Відмітка про залік <br> Н\Б</th>
  </tr>
    
 <tr> 
  <tbody>
  	<?php $y=1; ?>
  	<form method="post" action="{{asset('kroksurgery')}}">
  	 {{ csrf_field() }}

@foreach ($intern as $interns)  

<input type="hidden" name="kafedra[]" value="{{$k}}">
<td>{!!$y!!}</td>
<td title="{{$interns->user_id}}"><i>{!!$interns->surname!!} {!!$interns->name!!}</i></td>
<input type="hidden" name="user_id[]" value="{{$interns->user_id}}">
<td style="background-color:lightgrey"><input type="text" style="background-color:lightgrey;border: 1px solid green" size="2px" name="vk[]" value="{{$interns->vk}}">  <select name="vk_nb[]" ><option value="0"></option> <option value="1" @if(isset($interns)) @if($interns->vk_nb == 1)selected @endif @endif>NB</option> </select></td>

<td style="background-color:lightgrey"><input type="text" style="background-color:lightgrey;border: 1px solid green" size="2px" name="pr[]" value="{!!$interns->pr!!}">  <select name="pr_nb[]" ><option value="0"></option> <option value="1" @if(isset($interns)) @if($interns->pr_nb == 1)selected @endif @endif>NB</option> </select></td>

<td style="background-color:lightgrey;"><input type="text"  style="background-color:lightgrey;border: 1px solid green" size="2px" name="kk[]" value="{!!$interns->kk!!}">  <select name="kk_nb[]" ><option value="0"></option> <option value="1"  @if($interns->kk_nb == 1)selected @endif>NB</option> </select></td>

<td style="background-color:lightgrey"><input  style="background-color:lightgrey;border: 1px solid green" type="text"  name="zalik[]" value="<?php $sum=$interns->kk; 
// Только По хирургии если есть хоть одно НБ то не сдано.
if($interns->kafedra==12){
  if(!empty($interns->kk_nb) || !empty($interns->pr_nb) || !empty($interns->vk_nb)){
    echo "Не Зараховано";
  }
}
if($interns->kafedra==12 or $interns->kafedra==13 ){
if (($sum<=100)&&($sum>=70))
{
echo " Залік";
}else if  (($sum<70)&&($sum>=0)){
echo "Не Зараховано";
}  
else if ($sum == ''){
echo " ";
}
}

?>"> 
</td>


 </tr>
<?php $y++; ?>
@endforeach
</tbody>


</table>
<!-- <td style="width:5px;" class="col-md-6 col-sm-6 col-xs-6  widthbutton"> --><button  type="submit" class="btn btn-secondary btn-lg btn-block">Відправити </button><!-- </td> -->
</form>

</div>


@endisset


@endsection
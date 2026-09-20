@extends('layouts.baseteacher')
@include('layouts.instruction.kerivnuk.pract')
@section('content')
<style> 
 table {
  width: 100%;
  border: 1px solid #dee2e6;
  border-collapse: separate;
  border: 1px solid #9DABCE;
  border-width: 0px 0px 1px 1px;
  margin: 10px auto;
  font-size: 20px;
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
  * {
  /* old-style reset here :) */
  border: 0px;
  padding: 0px;
}
td, th {
  width: 81px;
  height: 81px;
  text-align: center;
  vertical-align: middle;
/*  background: url(../img/cells.png);*/
  color: #444;
  position: relative;
}
th {
  height: 30px;
  font-weight: bold;
  font-size: 14px;
}
input{
    font-size: 10px;
}

</style>

<div class="card card-body">
    <div class="row" style="margin-left: 10px">
      <form>
           <div class="form-row">
           <p><strong>Оберіть період</strong></p>
           <div class="col">
           c: <input type="month" name="calendars" class="form-control" value="@if(isset($shift))  {!!\Carbon\Carbon::parse($shift)->format('d.m.Y')!!} @else  @endif">
           <!-- {!!\Carbon\Carbon::parse($shift)->format('m-Y')!!} -->
         </div>
         <!--  <div class="col">
          Рік <input type="date" class="form-control" name="calendarpo">
          </div> -->
        <div class="col">
   <input type="submit" style="margin-top:24px" class="btn btn-outline-danger" value="Показати">

 </div>
</div>
</form>
</div>
@if (session('message-updated'))
                         @component('admink.components.alert')
                             @slot('type')
                                 success
                             @endslot
                             {!! session('message-updated') !!}
                         @endcomponent
                      @endif  
<div style="float: right;">
<form>
<button type="submit" style="margin-top:0px;float: right;" class="btn btn-outline-danger" name="calendars" value="@if(!empty($_GET['calendars']))  {{\Carbon\Carbon::parse($_GET['calendars'])->subMonth()->format('Y-m')}} @else 
  @php  $month=date('Y-m-01'); @endphp    {{\Carbon\Carbon::parse($month)->subMonth()->format('Y-m')}} @endif">Минулий </button>

<button type="submit" style="margin-top:0px;float: right;" class="btn btn-outline-success" name="calendars" value="@if(!empty($_GET['calendars']))  {{\Carbon\Carbon::parse($_GET['calendars'])->addMonth()->format('Y-m')}} @else  @php  $month=date('Y-m-01'); @endphp    {{\Carbon\Carbon::parse($month)->addMonth()->format('Y-m')}} @endif">Наступний </button>
</form>
</div>
<span style="font-size: 20pt;text-align: center;background-color:lightblue;">Обраний місяц: 
            @php 
            $name_month=\Carbon\Carbon::parse($shift)->format('m');
            $name_year=\Carbon\Carbon::parse($shift)->format('y');
            $showMonth = date("F", mktime(0,0,0, $name_month));
            if ($showMonth=="January") echo "Січень - $name_year року"; 
            if ($showMonth=="February") echo "Лютий - $name_year року"; 
            if ($showMonth=="March") echo "Березень - $name_year року"; 
            if ($showMonth=="April") echo "Квітень - $name_year року"; 
            if ($showMonth=='May') echo "Травень - $name_year року"; 
            if ($showMonth=='July') echo "Липень - $name_year року"; 
            if ($showMonth=="June") echo "Червень - $name_year року"; 
            if ($showMonth=='August') echo "Серпень - $name_year року"; 
            if ($showMonth=="September") echo "Вересень - $name_year року"; 
            if ($showMonth=="October") echo "Жовтень - $name_year року"; 
            if ($showMonth=="November") echo "Листопад - $name_year року"; 
            if ($showMonth=="December") echo "Грудень - $name_year року"; 
            @endphp 
</span>

<div class="row">
  <div class="col" >
  <table>
    <tr style="background:lightblue">
      <th>ПН</th>
      <th>ВТ</th>
      <th>СР</th>
      <th>ЧТ</th>
      <th>ПТ</th>
      <th>СБ</th>
      <th>ВС</th>
    </tr>
  <tr>
    <form method="POST" action="{{route('rozklad.store')}}">
  {{ csrf_field() }} 
@foreach($calendar as  $calendars)  
  
  @if($calendars->ndayweek==1)
  <td>  <input type="checkbox" style="float: right;" name=typedat[] value="{{$calendars->typedat}}-{{$calendars->id}}"   @if($calendars->typedat==0)checked @endif> 

    @php     
    if(isset($shift)){  
    $next=\Carbon\Carbon::parse($shift)->format('m'); 
    $t=$calendars->montyear; $td='0'.$t; 
    if ($next==$td) {
  {$color="green";}
  }else{ {$color="lightgrey";}
  } 
}
else{
    $t=$calendars->montyear; $td='0'.$t; $do=date('m');  if ($do==$td){
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
  }   @endphp   
 <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 

  @if($calendars->ndayweek==2) 
   <td>  <input type="checkbox" style="float: right;" name="typedat[]" value="{{$calendars->typedat}}-{{$calendars->id}}"  @if($calendars->typedat==0)checked @endif> 
 
    @php     
    if(isset($shift)){  
    $next=\Carbon\Carbon::parse($shift)->format('m'); 
    $t=$calendars->montyear; $td='0'.$t; 
    if ($next==$td) {
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
}
else{
    $t=$calendars->montyear; $td='0'.$t; $do=date('m');  if ($do==$td){
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
  }   @endphp   
      <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 


@if($calendars->ndayweek==3) 
   <td>  <input type="checkbox" style="float: right;" name="typedat[]"  value="{{$calendars->typedat}}-{{$calendars->id}}" @if($calendars->typedat==0)checked @endif>
   
    @php     
    if(isset($shift)){  
    $next=\Carbon\Carbon::parse($shift)->format('m'); 
    $t=$calendars->montyear; $td='0'.$t; 
    if ($next==$td) {
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
}
else{
    $t=$calendars->montyear; $td='0'.$t; $do=date('m');  if ($do==$td){
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
  }   @endphp   
      <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 


@if($calendars->ndayweek==4) 
 <td>  <input type="checkbox" style="float: right;" name="typedat[]"   value="{{$calendars->typedat}}-{{$calendars->id}}" @if($calendars->typedat==0)checked @endif> 
 
  @php     
    if(isset($shift)){  
    $next=\Carbon\Carbon::parse($shift)->format('m'); 
    $t=$calendars->montyear; $td='0'.$t; 
    if ($next==$td) {
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
}
else{
    $t=$calendars->montyear; $td='0'.$t; $do=date('m');  if ($do==$td){
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
  }   @endphp   
      <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 

    @if($calendars->ndayweek==5) 
    <td>  <input type="checkbox" style="float: right;" name="typedat[]"  value="{{$calendars->typedat}}-{{$calendars->id}}" @if($calendars->typedat==0)checked @endif> 
    
      @php     
    if(isset($shift)){  
    $next=\Carbon\Carbon::parse($shift)->format('m'); 
    $t=$calendars->montyear; $td='0'.$t; 
    if ($next==$td) {
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
}
else{
    $t=$calendars->montyear; $td='0'.$t; $do=date('m');  if ($do==$td){
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
  }   @endphp   
      <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 


  @if($calendars->ndayweek==6) 
  <td>  <input type="checkbox" style="float: right;" name="typedat[]"   value="{{$calendars->typedat}}-{{$calendars->id}}" @if($calendars->typedat==0)checked @endif> 
     
    @php     
    if(isset($shift)){  
    $next=\Carbon\Carbon::parse($shift)->format('m'); 
    $t=$calendars->montyear; $td='0'.$t; 
    if ($next==$td) {
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
}
else{
    $t=$calendars->montyear; $td='0'.$t; $do=date('m');  if ($do==$td){
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
  }   @endphp   
      <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 


  @if($calendars->ndayweek==7) 
 <td>  <input type="checkbox" style="float: right;" name="typedat[]"  value="{{$calendars->typedat}}-{{$calendars->id}}" @if($calendars->typedat==0)checked @endif> 
 
  @php     
    if(isset($shift)){  
    $next=\Carbon\Carbon::parse($shift)->format('m'); 
    $t=$calendars->montyear; $td='0'.$t; 
    if ($next==$td) {
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
}
else{
    $t=$calendars->montyear; $td='0'.$t; $do=date('m');  if ($do==$td){
{$color="green";}
  }else{ {$color="lightgrey";}
  } 
  }   @endphp   
      <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 

<?php  if ($calendars->ndayweek==7) echo "</tr><tr>"; ?>@continue 
    
  @endforeach
    </tr>  
  </table>
 <button type="submit" class="btn-outline-success btn-lg">Збергти</button>
</form>
</div>
</div>
  <!-- <div class="card-body">
<form>
  <div class="container">
    <div class="row">
  <div class="col" class="form-control" style="width: 50px;text-align:left">пн</div> 
  <div class="col" style="width: 50px;text-align:left">вт</div> 
  <div class="col" style="width: 50px;">ср</div> 
  <div class="col" style="width: 50px;">чт</div> 
  <div class="col" style="width: 50px;">пт</div> 
  <div class="col" style="width: 50px;">сб</div> 
  <div class="col" style="width: 50px;">вс</div> 
    </div>
 <div class="row">
@foreach($calendar as  $calendars)  


<div class="col" class="form-control" style="width: 50px;text-align:left">@if($calendars->ndayweek==1) {{$calendars->daymont}}@endif</div> 



<div class="col" style="width: 50px;text-align:left">@if($calendars->ndayweek==2) {{$calendars->daymont}}@endif</div> 


<div class="col"style="width: 50px;">@if($calendars->ndayweek==3) {{$calendars->daymont}}@endif</div> 

<div class="col" style="width: 50px;">@if($calendars->ndayweek==4) {{$calendars->daymont}}@endif</div> 


<div class="col" style="width: 50px;">@if($calendars->ndayweek==5) {{$calendars->daymont}}@endif</div> 


<div class="col" style="width: 50px;">@if($calendars->ndayweek==6) {{$calendars->daymont}}@endif</div> 

<div class="col" style="width: 50px;">@if($calendars->ndayweek==7) {{$calendars->daymont}}@endif</div> 

  @endforeach
 </div>

</div>

</form>
</div> -->



@endsection
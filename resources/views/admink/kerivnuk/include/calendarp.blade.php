<style> 
 .calendars_p {
  width: 400px;
  table-layout:fixed;
  /*border: 1px solid #dee2e6;*/
  border-collapse: separate;
  border: 1px solid #9DABCE;
  border-width: 0px 0px 1px 1px;
/*  margin: 10px auto;*/
  font-size: 20px;
  margin-left: 1px;
  }
 .calendars_p th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  height: 45px;
  font-weight: bold;
  font-size: 15px;
  }
  .calendars_p td { border: 1px solid #dee2e6;
  width: 45px;
  height: 45px;
  text-align: center;
  vertical-align: middle;
/*  background: url(../img/cells.png);*/
  color: #444;
  position: relative;
   } /**/
  .calendars_p thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
  }
  * {
  /* old-style reset here :) */
  border: 0px;
  padding: 0px;
}
.calendars_p input{
    font-size: 10px;
}
/*.col1 {
  width: 100%;
  margin:0 0 0 0px;
  margin-bottom: 3px;
}*/

</style>
<!-- <div class="card card-body"> -->
   <!--  <div  style="margin-left:10px;"> -->
     <!--  <form>
           <div >
           <p><strong>Оберіть період</strong></p>
           <div class="col">
           по: <input type="month" name="calendarp" class="form-control" value="@if(isset($shift))  {!!\Carbon\Carbon::parse($shift)->format('d.m.Y')!!} @else  @endif">
           {!!\Carbon\Carbon::parse($shift)->format('m-Y')!!}
         </div>
        <div class="col">
          Рік <input type="date" class="form-control" name="calendarpo">
          </div> 
        <div class="col">
   <input type="submit" style="margin-top:24px" class="btn btn-outline-danger" value="Показати">

 </div>
 </form> -->
<!-- </div> -->

<!-- </div> -->

<!-- <div style="float: right;width: 100%;display:none"> -->
<!-- form>
<button type="submit" style="margin-top:0px;float: right;" class="btn btn-outline-danger" name="calendarp" value="@if(!empty($_GET['calendarp']))  {{\Carbon\Carbon::parse($_GET['calendarp'])->subMonth()->format('Y-m')}} @else 
  @php  $month=date('Y-m-01'); @endphp    {{\Carbon\Carbon::parse($month)->subMonth()->format('Y-m')}} @endif">Минулий </button>

<button type="submit" style="margin-top:0px;float: right;" class="btn btn-outline-success" name="calendarp" value="@if(!empty($_GET['calendarp']))  {{\Carbon\Carbon::parse($_GET['calendarp'])->addMonth()->format('Y-m')}} @else  @php  $month=date('Y-m-01'); @endphp    {{\Carbon\Carbon::parse($month)->addMonth()->format('Y-m')}} @endif">Наступний </button>
</form> -->
<!-- </div> -->

<span style="font-size: 20pt;text-align: left;float: left;background-color:lightblue;margin-top:1px;  ">
 Обраний місяц: 
            @php 
            $name_month=\Carbon\Carbon::parse($shift1)->format('m');
            $name_year=\Carbon\Carbon::parse($shift1)->format('y');
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

  <table class="calendars_p">
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

@foreach($calendarp as  $calendarpo)  
  <input type="hidden" name="year" value="{{$calendarpo->nyear}}">

@php     
    if(isset($shift1)){  
    $next=\Carbon\Carbon::parse($shift1)->format('m'); 
    $t=$calendarpo->montyear; $td='0'.$t; 
    if ($next==$td) {
  {$color="green";}
  }else{ {$color="lightgrey";}
  {$disabled="disabled";}
  } 
}
else{
    $t=$calendarpo->montyear; $td='0'.$t; $do=date('m');  if ($do==$td){
{$color="green";}
  }else{ {$color="lightgrey";}
  {$disabled="disabled";}
  } 
  }   @endphp 
  @if($calendarpo->ndayweek==1)
  <td>  <input type="checkbox" style="float: right;" name=typedat[] value="{{$calendarpo->curdate}}"   @if($calendarpo->typedat==0 or $next!=$td) disabled @endif> 
      
 <span style="color:<?php echo $color; ?>">{{$calendarpo->daymont}}</span> </td>
  @else 
    @endif 

  @if($calendarpo->ndayweek==2) 
   <td>  <input type="checkbox" style="float: right;" name="typedat[]" value="{{$calendarpo->curdate}}"  @if($calendarpo->typedat==0 or $next!=$td) disabled    @endif> 
 
    
      <span style="color:<?php echo $color; ?>">{{$calendarpo->daymont}}</span> </td>
  @else 
    @endif 


@if($calendarpo->ndayweek==3) 
   <td>  <input type="checkbox" style="float: right;" name="typedat[]"  value="{{$calendarpo->curdate}}" @if($calendarpo->typedat==0 or $next!=$td)disabled @endif>
   
  
      <span style="color:<?php echo $color; ?>">{{$calendarpo->daymont}}</span> </td>
  @else 
    @endif 


@if($calendarpo->ndayweek==4) 
 <td>  <input type="checkbox" style="float: right;" name="typedat[]"   value="{{$calendarpo->curdate}}" @if($calendarpo->typedat==0 or $next!=$td)disabled @endif> 
 
  
      <span style="color:<?php echo $color; ?>">{{$calendarpo->daymont}}</span> </td>
  @else 
    @endif 

    @if($calendarpo->ndayweek==5) 
    <td>  <input type="checkbox" style="float: right;" name="typedat[]"  value="{{$calendarpo->curdate}}" @if($calendarpo->typedat==0 or $next!=$td)disabled @endif> 
    
  
      <span style="color:<?php echo $color; ?>">{{$calendarpo->daymont}}</span> </td>
  @else 
    @endif 


  @if($calendarpo->ndayweek==6) 
  <td>  <input type="checkbox" style="float: right;" name="typedat[]"   value="{{$calendarpo->curdate}}" @if($calendarpo->typedat==0 or $next!=$td)disabled @endif> 
     
 
      <span style="color:<?php echo $color; ?>">{{$calendarpo->daymont}}</span> </td>
  @else 
    @endif 


  @if($calendarpo->ndayweek==7) 
 <td>  <input type="checkbox" style="float: right;" name="typedat[]"  value="{{$calendarpo->daymont}}" @if($calendarpo->typedat==0 or $next!=$td)disabled @endif> 
 
  
      <span style="color:<?php echo $color; ?>">{{$calendarpo->daymont}}</span> </td>
  @else 
    @endif 

<?php  if ($calendarpo->ndayweek==7) echo "</tr><tr>"; ?>@continue 
    
  @endforeach
    </tr>  
    </table>


<!--  <button type="submit" class="btn-outline-success btn-lg">Збергти</button> -->


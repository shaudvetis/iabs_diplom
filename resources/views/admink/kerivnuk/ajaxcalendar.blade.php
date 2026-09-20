<style> 
 .calendars_t {
  width: 400px;
  /*border: 1px solid #dee2e6;*/
  border-collapse: separate;
  border: 1px solid #9DABCE;
  border-width: 0px 0px 1px 1px;
/*  margin: 10px auto;*/
  font-size: 20px;
  margin-left: 1px;
  }
 .calendars_t th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  height: 45px;
  font-weight: bold;
  font-size: 15px;
  }
  .calendars_t td { border: 1px solid #dee2e6;
  width: 45px;
  height: 45px;
  text-align: center;
  vertical-align: middle;
/*  background: url(../img/cells.png);*/
  color: #444;
  position: relative;
   } /**/
  .calendars_t thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
  }
  * {
  /* old-style reset here :) */
  border: 0px;
  padding: 0px;
}
.calendars_t input{
    font-size: 10px;
}
/*.col1 {
  width: 100%;
  margin:0 0 0 0px;
  margin-bottom: 3px;
}*/
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
</style>
<!-- <div class="card card-body"> -->
    
<!-- </div> -->

<div class="col-sm size" >
<button type="button" style="margin-top:0px;float: left;" class="yestr btn btn-outline-danger" name="calendars"  id="yestr" value="{{\Carbon\Carbon::parse($shift)->subMonth()->format('Y-m-d')}}">Минулий </button>

<button type="button" style="margin-top:0px;float: left;" class="next btn btn-outline-success" name="calendars"  value="{{\Carbon\Carbon::parse($shift)->addMonth()->format('Y-m-d')}}">Наступний </button>

<span style="font-size: 20pt;text-align: left;float: left;background-color:lightblue; vertical-align: baseline">
 Обраний місяц: 
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

  <table class="calendars_t">
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

@foreach($calendar as  $calendars)  
  <input type="hidden" name="year" value="{{$calendars->nyear}}">

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

  @if($calendars->ndayweek==1)

  <td>  <input type="checkbox" style="float: right;" name=typedat[] value="{{$calendars->curdate}}"   @if($calendars->typedat==0 or $next!=$td) disabled @endif> 

    
 <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 


  @if($calendars->ndayweek==2) 
   <td>  <input type="checkbox"  style="float: right;" name="typedat[]" value="{{$calendars->curdate}}"  @if($calendars->typedat==0 or $next!=$td) disabled @endif> 
 
  <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 


@if($calendars->ndayweek==3) 
   <td>  <input type="checkbox" style="float: right;" name="typedat[]"  value="{{$calendars->curdate}}" @if($calendars->typedat==0 or $next!=$td)disabled @endif>
   
    
      <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 


@if($calendars->ndayweek==4) 
 <td>  <input type="checkbox" style="float: right;" name="typedat[]"   value="{{$calendars->curdate}}" @if($calendars->typedat==0 or $next!=$td)disabled @endif> 
 
  
      <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 

    @if($calendars->ndayweek==5) 
    <td>  <input type="checkbox" style="float: right;" name="typedat[]"  value="{{$calendars->curdate}}" @if($calendars->typedat==0 or $next!=$td)disabled @endif> 
   
      <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 


  @if($calendars->ndayweek==6) 
  <td>  <input type="checkbox" style="float: right;" name="typedat[]"   value="{{$calendars->curdate}}" @if($calendars->typedat==0 or $next!=$td)disabled @endif> 
     
    <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 


  @if($calendars->ndayweek==7) 
 <td>  <input type="checkbox" style="float: right;" name="typedat[]"  value="{{$calendars->daymont}}" @if($calendars->typedat==0 or $next!=$td)disabled @endif> 

 <span style="color:<?php echo $color; ?>">{{$calendars->daymont}}</span> </td>
  @else 
    @endif 

<?php  if ($calendars->ndayweek==7) echo "</tr><tr>"; ?>@continue 
    
  @endforeach
    </tr>  
    </table>
</div>
<!--  <button type="submit" class="btn-outline-success btn-lg">Збергти</button> -->
<!-- </form> -->
<div class="col-sm size" >
  <!-- <span style="font-size: 20pt;text-align: left;float: left;background-color:lightblue;margin-top:30px;  ">
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
    </table> -->
  </div>

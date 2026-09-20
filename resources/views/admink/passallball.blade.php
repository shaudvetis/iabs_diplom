@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.ballstartcont')
@section ('content')

<style>
 .button_print{
    width: 150px;
    height: 50px;
    float: right;
  }
@media print {
.noprint{
  display: none;
}
.button_print{
    display: none;  
}
.card-header {
  display: none;
}
.card-body{

}

}
table{
  font-size: 14px;
}
</style>
<div class="card card-info ">
<div class="card-header">
<!-- Подключаются кнопки курсов и десятков -->
@include('admink.include.naprav_settings.course') 
</div>
</div>


<style>
  table{
    text-align: center;
  }

</style>

<div onclick="printit();" class="button_print btn btn-danger">Друкувати</div>


<div class="table-responsive">
<p><h3> Дніпровський державний медичний університет кафедра хірургії №1 та урології </h3>

<h5>Відомость обліку успішності за результатами проходження очної частини інтернатури лікарів-інтернів  ______ року навчання</h5></p>
<table class="table table-bordered">
  <tr >
    <th>ФІО</th>
   
    @foreach($direction as $dir)
     
     @if($c !=1 && ($dir->id == 21 || $dir->id == 22 || $dir->id == 23 || $dir->id == 24  || $dir->id == 25 || $dir->id == 26))
     @continue;
     @else
     <th> {!!  $dir->direction !!}  </th>
    @endif
    @endforeach

    
</tr>



    @foreach($result1 as $key => $ocenka)
  
  <tr>
 
   <td><strong><i>{{ $ocenka['surname'] }}</i></strong></td>
 
    @if($c == 1)
    
    <td> {{ $ocenka['orgh'] }}  </td>
    
    @endif


   <td>  {{ $ocenka['abd'] }} </td>
  
    @if($c == 1)
    
    <td> {{ $ocenka['abd1'] }}  </td>
    
    @endif


   <td> {{ $ocenka['tor'] }} </td>
       @if($c == 1)
    
    <td> {{ $ocenka['tor1'] }}  </td>
    
    @endif

  
   <td> {{ $ocenka['proc'] }} </td>
 
   <td> {{ $ocenka['amb'] }} </td>

   <td> {{ $ocenka['ur'] }} </td>
   @if($c == 1)
   
    <td> {{ $ocenka['sud1'] }}  </td>
    
   @endif

   <td> {{ $ocenka['sud'] }} </td>
   



   <td> {{ $ocenka['gn'] }} </td>

      @if($c == 1)
   
    <td> {{ $ocenka['gn1'] }}  </td>
    
   @endif
  

   <td> {{ $ocenka['kr'] }} </td>

   <td> {{ $ocenka['opk'] }} </td>

      @if($c == 1)
   
    <td> {{ $ocenka['opk1'] }}  </td>
    
   @endif
   <td>  </td>

</tr>
@endforeach


</table>

</div>



@endsection


@section('js')
<script>
$(document).ready(function(){
   $('.send').change(function(){
    BaseRecord.ocenkinb($("select[name='course']").val());
    $('.table-nb').css('display','block');
   });

});
function printit(){
    $('.all_table').css('display','block');  
    $('.name_table').css('display','none');  
    
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
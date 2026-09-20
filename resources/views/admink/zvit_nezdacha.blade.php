@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.ballstart')
@section ('content')
@include('admink.include.naprav_settings.ball_start_settings') 

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
</style>
<div class="card card-info " >
<div class="card-header">
 <a href="{{asset('admink.dashboard')}}">Назад</a>
 </div>

<!-- Участие в операциях -->
<form method="GET">
   
<fieldset class="scheduler-border">
    <legend class="scheduler-border noprint">Панель налаштування звіту</legend>
<div style="margin-left: 10px;" class="row">
  <div class="form-group col-md-3">
      <label >Курс</label>
      <select  name="course" class="form-control send">
        <option @if(isset($a)) @if($a == 0) selected @endif @endif class="noprint">Оберіть...</option>
        <option  value="1"  @if(isset($a)) @if($a == 1) selected @endif @endif >1</option>
        <option value="2" @if(isset($a)) @if($a == 2) selected @endif @endif>2</option>
        <option value="3"  @if(isset($a)) @if($a == 3) selected @endif @endif>3</option>
      </select>
    </div>
 </div>

</fieldset>
</form>

<div class="card-body">
<!-- Подключаем вівод оценок по аджаксу -->
<div class="table-nb" style="display: none">

@include('admink.ocenki-nb')

</div>


</div>
@endsection

@section('js')
<script src="{{ asset('js/vukladach.js')}}"></script>
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
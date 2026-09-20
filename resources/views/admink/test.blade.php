@extends ('admink.layouts.app_admink')
 <button type="button" class="print" style="width: 30px;height:30px; float:right; margin:0 2px; " onclick="printit();">
  <i class="fa fa-print" aria-hidden="true"></i></button>
@include('layouts.instruction.vukladach.test')
@section ('content')
<style>
	table {
 width: 100%;
 text-align: center;
}
th {
border-radius: 0.25rem;
text-align: center;
}
td { /* border: 1px solid #dee2e6;*/
text-align:center;
padding: 0px;
padding-bottom: 0px;
}
.smol_input   {
 height: 30px;
 width: 30px;
 padding:0px;padding-left: 0px;
}
.smol_td   {
  height: 30px;
  width: 30px;
  padding:0px;padding-left: 0px;
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
        <option  name="1" value="1"  @if(isset($d)) @if($d == 1) selected @endif @endif>1</option>
        <option value="2"  @if(isset($d)) @if($d == 2) selected @endif @endif>2</option>
        <option value="3"  @if(isset($d)) @if($d == 3) selected @endif @endif>3</option>
        <option value="4"  @if(isset($d)) @if($d == 4) selected @endif @endif>4</option>
        <option value="5"  @if(isset($b)) @if($b == 5) selected @endif @endif>5</option>
      </select>
    </div>
    <div class="form-group col-md-3">
     <label >Напрямок</label>
      <select name="direction" class="form-control">
        <option selected>Оберіть...</option>
        @foreach($direction as $direct)
        <option value="{!!$direct->id!!}" @if(isset($id)) @if($id == $direct->id) selected @endif @endif> {!!$direct->direction!!}  </option>
        @endforeach
        </select>
    </div>
  <div class="form-group">
  <button type="submit"  style="margin-top: 31px;margin-left: 1px;" class="btn btn-primary">Показати</button>
  </div>
 </div>
</fieldset>
</form>

<!-- раньще біло ($id == 5 or $id == 11) -->

@if($id == 2)
@include ('admink.include.testall')

@elseif($id == 3 || $id == 4)
@include ('admink.include.testall')
@else
@include ('admink.include.test1')
@endif

@endsection

<script>
function printit(){
if (window.print) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2); 
}
}
</script>
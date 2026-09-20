@extends ('admink.layouts.app_admink')

@section ('content')
<style>
  @media print {
    #myform {
        display:none;
    }
  }
</style>

<form method="GET"  action="" id="myform">
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
      </select>
    </div>
    <div class="form-group col-md-3">
     <label >Напрямок</label>
      <select name="direction" class="form-control">
        <option selected>Оберіть...</option>
        @foreach($direction as $direct)
        <option value="{!!$direct->id!!}" @if(isset($napr)) @if($napr == $direct->id) selected @endif @endif> {!!$direct->direction!!}  </option>
        @endforeach
        </select>
    </div>
  <div class="form-group">
  <button type="submit"  style="margin-top: 31px;margin-left: 1px;" class="btn btn-primary">Показати</button>
  </div>
  <div onclick="printit();" class="button_print btn btn-danger" style="margin-top: 31px;margin-left: 100px;">Друкувати</div>
 </div>
</fieldset>
</form>


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"> Название </th>
      <th scope="col"> Дата </th>
      <th scope="col"> Практика </th>
      <th scope="col"> Семінар </th>
    </tr>
  </thead>
  <tbody>
  	 @foreach($seminarse as $key => $value)
    <tr>
      <th scope="row"><input type="hidden" name="seminar_title[]" value="{!!$value->id!!}">  {!!$value->tema!!}  </th>
      <td> <input  class="form-control" type="date" name="date[]"  @if(!empty($value->date)) value="{{$value->date}}" @endif> </td>
      <td> 
      <select class="form-control" name="pract[]">
       <option selected value="0" >Оберіть </option>
       <option value="1" @if($value->pract == 1) selected @endif> 1 </option>
       <option value="2" @if($value->pract == 2) selected @endif> 2 </option>
       <option value="3" @if($value->pract == 3) selected @endif > 3 </option>
       <option value="4" @if($value->pract == 4) selected @endif> 4 </option>
       <option value="5" @if($value->pract == 5) selected @endif> 5 </option>
       <option value="6" @if($value->pract == 6) selected @endif> 6 </option>
       <option value="7" @if($value->pract == 7) selected @endif> 7 </option>
       </select></td>
      
       <td> <select class="form-control" name="seminar[]">
       <option selected value="0" >Оберіть </option>
       <option value="1" @if($value->seminar == 1) selected @endif> 1 </option>
       <option value="2" @if($value->seminar == 2) selected @endif> 2 </option>
       <option value="3" @if($value->seminar == 3) selected @endif> 3 </option>
       <option value="4" @if($value->seminar == 4) selected @endif> 4 </option>
       <option value="5" @if($value->seminar == 5) selected @endif> 5 </option>
       <option value="6" @if($value->seminar == 6) selected @endif> 6 </option>
       <option value="7" @if($value->seminar == 7) selected @endif> 7 </option>
       </select> </td>
    </tr>
   </tbody>
   @endforeach
</table>


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

@endsection


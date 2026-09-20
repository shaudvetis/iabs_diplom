@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.ballstartcont')
@section ('content')

<style>
 @page {
    size: A4;
    margin: 10mm;
}
.ocenka{
    text-align: center;
}
.header{
    font-size: 10px;
    padding: 0;
    margin: 0;
}
.tema{
     text-align: center;
}
th.header {
    padding: 0 !important;
    margin: 0 !important;
    line-height: 1;
}
td.ocenka {
    padding: 0 !important;
    margin: 0 !important;
    line-height: 1;
}
table{
     border-collapse: collapse;
     border-spacing: 0;
}
@media print {

    body {
        font-size: 11px;
    }
    th.header {
    padding-right: 0 !important;
}
}
</style>
<div class="card card-info ">
<div class="card-header">
<!-- Подключаются кнопки курсов и десятков -->
<form method="GET"  action="">
  <div id="panel" style="width: 100%">
<label style="font-size: 15pt;"></label>

<!-- Подключается файл с направлениями через ViewComposer -->

  <label>Хірургічні напрямки</label>
   <select name="direction"  class="custom-select" required style="width: 300px;"class="custom-select"onChange="Selected(this)" >
     <option value="">Відкрийте меню</option>
     @foreach($direction as $dir)

 
     <option value="{{$dir->id}}" @if(isset($_GET['direction'])) @if($_GET['direction'] == $dir->id) selected @endif @endif >{!!$dir->direction!!}</option>
    
     @endforeach
   </select>
 <div class="invalid-feedback">Оберіть хірургічний напрямок</div>



<label style="margin-left: 60px;font-size: 15pt">Рік навчання</label>
        
           <input type="text" name="year" value="@if(isset($_GET['year'])) {{ $_GET['year'] }} @endif" style="width: 50px;height: 25px;margin-left: 10px;">
  
       <!--  <label style="margin-left: 60px;font-size: 15pt">Курс</label>
          <select  name="course" style="width: 50px;height: 25px;margin-left: 10px;">
           <option selected></option>
            <option  value="1"  @if(isset($c)) @if($c == 1) selected @endif @endif >1</option>
            <option value="2" @if(isset($c)) @if($c == 2) selected @endif @endif>2</option>
            <option value="3"  @if(isset($c)) @if($c == 3) selected @endif @endif>3</option>
          </select> -->
          <label style="margin-left: 60px;font-size: 15pt">Десяток</label>
          <select  name="decatki" style="width: 50px;height: 25px;margin-left: 10px;">
           <option selected></option>
            <option  value="1"  @if(isset($_GET['decatki'])) @if($_GET['decatki'] == 1) selected @endif @endif >1</option>
            <option value="2" @if(isset($_GET['decatki'])) @if($_GET['decatki'] == 2) selected @endif @endif>2</option>
            <option value="3"  @if(isset($_GET['decatki'])) @if($_GET['decatki'] == 3) selected @endif @endif>3</option>
             <option value="4"  @if(isset($_GET['decatki'])) @if($_GET['decatki'] == 4) selected @endif @endif>4</option>
              <option value="5"  @if(isset($_GET['decatki'])) @if($_GET['decatki'] == 5) selected @endif @endif>5</option>
          </select>

      <button type="submit" class="btn-light" style="margin-left: 10px;width: 80px;">Обрати</button>
   </form>
</div>
</div>
</div>




<div onclick="printit();" class="button_print btn btn-danger">Друкувати</div>


@if(isset($studentList) && $result)

<div class="table-responsive">
<p ><h3 class="tema"> Дніпровський державний медичний університет кафедра хірургії та урології </h3>

<h5 class="tema">Відомость обліку успішності за результатами проходження очної частини інтернатури лікарів-інтернів  @if(isset($_GET['year'])) {{ $_GET['year'] }} @endif року навчання</h5></p>
<table border="1" cellpadding="5" class="table-seminar" width="100%">
    <thead>
        <tr>
            <th>Тема / Студент</th>
            @foreach($studentList as $surname)
                <th class="header">{{ $surname }} </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($result as $tema)
            <tr>
                <td width="40%">{!! strip_tags($tema['npp']) !!} {!! strip_tags($tema['tema_name']) !!}</td>
                @foreach($tema['students'] as $student)
                    <td class="ocenka">{{ $student['ocenka'] ?? '-' }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

@endif
</div>



@endsection


@section('js')
<script>

function printit(){
    $('.all_table').css('display','block');  
    $('.name_table').css('display','none');
    $('.card-info').css('display','none');  
    $('.button_print').css('display','none');    
    
if (window.print) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2); 
}
}

// Когда печать закончилась
window.onafterprint = function () {
    $('.all_table').css('display','none');  
    $('.name_table').css('display','block');
    $('.card-info').css('display','block');  
    $('.button_print').css('display','block');  
};

</script>
@endsection
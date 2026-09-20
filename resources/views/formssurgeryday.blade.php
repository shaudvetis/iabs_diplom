@extends('layouts.base')
@include('layouts.instruction.intern.estc')
@section('content')

<style>
 table {
border: 1px solid #dee2e6;
 }
 
th {
border-radius: 0.25rem;
border: 1px solid #dee2e6;
}
td {
border: 1px solid #dee2e6;
}
thead {
color: #495057;
background-color: #e9ecef;
border-color: #dee2e6;
}
</style>

<!-- Участие в операциях -->
<button class="pract_print" style="float: right; padding-right: 1px;">Печать форм</button>

@include('print.print_nav')


<div class="body-print">
    <form method="GET"  action="{{asset('formssurgeryday')}}">
       <fieldset class="scheduler-border">
    <legend class="scheduler-border">Панель налаштування звіту</legend>
<div style="margin-left: 10px;" class="row">
 <div class="form-group col-md-3">
    <label >Напрямок</label>
         
      <select name="direction" class="form-control">
        <option selected>Оберіть...</option>
        
        <!-- <option value="1"  @if(isset($c)) @if($c == 1) selected @endif @endif>Участь в операціях</option> -->

             @foreach($napravlenie as $direct)

              <option value="{{$direct->id}}" @if(isset($d) && $d == $direct->id) selected @endif >{!!$direct->direction!!}</option>
              <!--  <option value="{!!$direct->id!!}" @if(isset($d)) @if($d == $direct->id) selected @endif @endif> {!!$direct->direction!!}  </option> -->
        
       @endforeach
    
      </select>
    
</div>

 <div class="form-group">
  <button type="submit"  style="margin-top: 31px;" class="btn btn-primary">Показати</button>
 
</div>
 </div>
</fieldset>
</form>    
<div class="card card-info">
      <div class="card-header ">
        <h3 class="card-title">Сумарні бали за всіма видами контролю та ранжування за системою ЕСТS за модулем</h3>
        </div>

</div> 
  @include('layouts.include.index_entercontrol')


<div class="table table-xs">
      <!--   <table class="table table-bordered table-striped table-highlight">
            <thead>
              <th style="width: 10px;"><center>#</center></th>
                <th style="width: 400px; font-size: 2em"><center>Теми семінарів</center></th>
                <th style="width: 80px">Оцінка знань</th>
            </thead>
            <tbody>

    @php $title=''; @endphp

     @foreach ($seminar as $seminars)
<tr>
<td>{!! $seminars->npp !!}</td>
<td> 

@if($seminars->title != $title)

  {!! $seminars->title !!} 
  @else 
    <button type="button" class="btn-sm btn-primary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal{{ $seminars->id }}" data-whatever="@mdo">?
  </button>
   {!! $seminars->tema !!}
   @endif
</td>

<td >{!! $seminars->bal !!}</td>
</tr>

<div class="modal fade" id="exampleModal{{ $seminars->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Питання</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
    <div>
    {!! $seminars->pract_nav !!}
  </div>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Вихід</button>
  </div>
  </div>
  </div>

    @php $title=$seminars->title; @endphp

@endforeach
</tbody>
</table> -->



<table class="table table-bordered table-striped table-highlight">
  <tr>  
  <!--   Объявляем переменную пустую -->
  <?php  $dubl=null;  ?>
  @foreach ($seminar as $seminars)
<!--   Если переменная не равна названию семинара -->
  @if ($dubl != $seminars->title)
<!--   То показать название роздела и темы -->
   <td  style="size: 80px" >{!! $seminars->title !!}</td>
     </tr>
     <tr>
     <td  style="size: 80px" ><button type="button" class="btn-sm btn-info"><input type="hidden" name="element[]" value="{{$seminars->element}}"> {!! $seminars->npp !!}</button>
   <!-- Кнопка с вопросами  -->
      <button type="button" class="btn-sm btn-primary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal{{ $seminars->id }}" data-whatever="@mdo"> <input type="hidden" value="{{$seminars->element}}">? </button>
      <button type="button" class="btn-sm btn-secondary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal2{{ $seminars->id }}" data-whatever="@mdo"> <i class="bi bi-book-half"></i> </button>
     

      {!! $seminars->tema !!}</td>
         <td>   {!! $seminars->bal !!}  </td>
    </tr>
<!-- Если dubl равна seminars->title (название роздела повторяется) то показать только название предметов -->
  @else
   <td  style="size: 80px" ><button type="button" class="btn-sm btn-info"><input type="hidden" name="element[]" value="{{$seminars->element}}"> {!! $seminars->npp !!}</button>
 <!-- Кнопка с вопросами  -->
    <button type="button" class="btn-sm btn-primary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal{{ $seminars->id }}" data-whatever="@mdo"> <input type="hidden" value="{{$seminars->element}}">?</button>
  <button type="button" class="btn-sm btn-secondary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal2{{ $seminars->id }}" data-whatever="@mdo"> <i class="bi bi-book-half"></i> </button>
    {!! $seminars->tema !!}  </td>
    <td>   {!! $seminars->bal !!}  </td>
   </tr>
   @endif
<!--   Перед концом перебора записываем в переменную название роздела -->
      <?php  $dubl=$seminars->title;  ?>
<div class="modal fade" id="exampleModal{{ $seminars->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Питання</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="modal-body">
       {!! $seminars->pract_nav !!}
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Вихід</button>
     </div>
   </div>
 </div>
</div>

<div class="modal fade" id="exampleModal2{{ $seminars->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Література</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      {!! $seminars->question !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Вихід</button>
      </div>
    </div>
  </div>
</div>

@endforeach
</table>

</div>

</div>
@endsection

 @section('js')
    <script src="{{asset('js/main.js')}}"></script>

    <script>
   $(document).ready(function(){
   $('.pract_print').click(function(){
   $('.show').css('display','block');
   });
    });
   function printit(){

//location.href='/admink.kerivnuk.include.input_controlprint';  // /index.php

$('.view_print').css('display','block');
$('.prin').css('display','none');
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
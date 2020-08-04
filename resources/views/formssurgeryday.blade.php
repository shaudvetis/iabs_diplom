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
        <option value="{!!$direct->id!!}" @if(isset($d)) @if($d == $direct->id) selected @endif @endif> {!!$direct->direction!!}  </option>
        
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
        <table class="table table-bordered table-striped table-highlight">
            <thead>
              <th style="width: 10px;"><center>#</center></th>
                <th style="width: 400px; font-size: 2em"><center>Теми семінарів</center></th>
                <th style="width: 80px">Оцінка знань</th>
            </thead>
            <tbody>
     @foreach ($seminar as $seminars)
<tr>
  <td>{!! $seminars->npp !!}</td>
<td>{!! $seminars->tema !!}</td>
<td >{!! $seminars->bal !!}</td>
</tr>
@endforeach
</tbody>
</table>
</div>

@endsection


         
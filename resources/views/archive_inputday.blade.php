@extends('layouts.base')
@include('layouts.instruction.intern.archiv_input')
@section('content')
<style> 
  table {
   width: 100%;
   border: 1px solid #dee2e6;
} 
  th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  text-align: center;
  }
td { 
  border: 1px solid #dee2e6;
  text-align: center;
} 
thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
}
.layer {
  overflow: scroll; /* Добавляем полосы прокрутки */
 }
 @media screen and (max-width: 650px) {
#text{
  width:90%;
}

 }
</style>
<div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Звіти по Курації хворих</h3>
          <div class="card-tools">
            <a class="btn btn-tool"  href=" {{back()->getTargetUrl()}}">Назад</a>
            <a class="btn btn-tool"  href=" {{asset('archive_input_print')}}">Друк</a>
          </div>
       </div>
  </div>
  <div class="card card-body">
    <div class="row" style="margin-left: 10px">
      <form role="form" method="post" action="{{asset('archive_inputday')}}">
        {{ csrf_field() }}
          <div class="form-row">
           <p><strong>Оберіть період</strong></p>
           <div class="col">
           c: <input type="date" name="calendars" class="form-control" value="@if(isset($calendars)) {{$calendars}} @else  @endif">
          </div>
          <div class="col">
          по: <input type="date" class="form-control" name="calendarpo">
          </div>
        <div class="col">
   <input type="submit" style="margin-top:24px" class="btn btn-outline-danger" value="Показати">
 </div>
</div>
  </form>

   <form role="form" method="post" action="{{asset('archive_inputday')}}">
              {{ csrf_field() }}
   <div class="form-row">
     <div class="col">
   <p style="margin-left: 100px"><strong>Фільтр</strong>

   <input type="hidden" name="calendarpo" value="{{date('Y-m-d')}}">
   <select type="text" name="calendars" class="form-control" style="width:80px;" value="@if(isset($calendars)) {{$calendars}} @else  @endif">
    <option>  </option>
        <option value="{{date('Y-m-d',strtotime('-14 days'))}}">За 14 днів</option>
        <option value="{{date('Y-m-d',strtotime('-30 days'))}}">За 30 днів</option>
        <option value="{{date('Y-m-d',strtotime('-365 days'))}}">За рік</option>

   </select></p>
 </div>
  <div class="col">
     <!-- <input type="date" name="calendarpo"> --> 
   <input type="submit" class="btn btn-outline-danger" style="margin-top:22px " value="Показати"></p>

  </form>
</div>
</div>
   <table style="width: 100%" class="table-responsive">
      <tr>
        <!-- <th style="width: 100px">ПІБ інтерна</th> -->
             
        <th ><center>Діагноз/МКБ</th></center>
        <th>К</th>
        <th>Номер карти</th>
        <th>Назва операції</th>
        <th>№операції</th>
        <th>Початок курації</th>
        <th>Кінець курації</th>
        <th>Записати</th>
        <th>Вид участі</th>
        <th>База стажування</th>
        <th>Хірургічні напрямки</th>
       </tr>
   @foreach($getdate as $lastTenDaysRecords)
      <form form role="form" method="post" action="{{asset('archive_inputday')}}">
              {{ csrf_field() }}
      <tr>
        <!-- <td>{!! $lastTenDaysRecords->surname !!} {!! $lastTenDaysRecords->name !!}</td> -->
        
        <td> {!! $lastTenDaysRecords->diagnoses !!} <!-- / {!! $lastTenDaysRecords->mkb !!} --></td>
        <td class="smol_td" class="col-md-6 col-sm-6 col-xs-6  widthbutton"><button type="button" class="btn btn-primary btm-sm" data-toggle="modal"  data-id="{{$lastTenDaysRecords->id}}" data-target="#exampleModal{{$lastTenDaysRecords->id}}"><input type="hidden"  value="{{$lastTenDaysRecords->id}}"><i class="fa fa-edit" aria-hidden="true"></i>
</button></td>
   
<div class="modal fade" id="exampleModal{{$lastTenDaysRecords->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Коригування діагноза</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <textarea rows="10" cols="60" type="text" id="text" name="diagnoses" value="">{{$lastTenDaysRecords->diagnoses}}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary" name="id_date" value="{!!$lastTenDaysRecords->id !!}" >Зберегти</button>
      </div>
    </div>
  </div>
</div>


        <td>{!! $lastTenDaysRecords->num_card !!}</td>
        <td>{!! $lastTenDaysRecords->oper !!}</td>
        <td>{!! $lastTenDaysRecords->comm !!}</td>
        <td>{!! \Carbon\Carbon::parse($lastTenDaysRecords->apdate)->format('d/m/Y') !!}</td>
         <td style="background:lightgrey"><input type="date" name="apdate_end" value="{!! $lastTenDaysRecords->apdate_end !!}"></td>
        <td class="smol_td" class="col-md-6 col-sm-6 col-xs-6  widthbutton"> <button type="submit" class="smol_input" name="id_date" value="{!!$lastTenDaysRecords->id !!}" ><i class="fa fa-edit" aria-hidden="true"></i> </button></td>

        <td>{!! $lastTenDaysRecords->type_work !!}</td>
        <td>{!! $lastTenDaysRecords->fio !!}</td>
        <td>{!! $lastTenDaysRecords->direction !!}</td>
      </tr>
      <!-- Modal -->

    </form>
      @endforeach


</div>
@endsection
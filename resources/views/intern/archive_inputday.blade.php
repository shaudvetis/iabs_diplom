@extends('layouts.base')
@include('layouts.instruction.intern.archiv_input')
@section('content')
<style> 
  th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  text-align: center;
  }
td { 
  border: 1px solid #dee2e6;
  text-align: center;
} 
.stroka{
font-size:20px;
font-weight: 400;
line-height: 24px;
margin-top:10px;
margin-bottom: 20px;
box-shadow: 0px 10px 8px 10px rgba(0,0,0,0.15);
}

thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
}
.row {
  overflow: scroll; /* Добавляем полосы прокрутки */
 }
 @media print {
    #printButton {
        display:none;
    }
@media print {
    #nav-tab {
        display:none;
    }
  }
  @media print{
    .btn {
        display:none;
    }
  }
    @media print{
    .prin {
        display:none;
    }
  }
@media screen and (max-width: 600px) {
  h3 {
    background-color: olive;
  }
}
</style>

<!-- Заголовок -->

<div class="card card-danger">
  <div class="card-header">
    <h3 class="card-title texthead_ukr">Звіти по Курації хворих</h3>
      <div class="card-tools">
        <a class="btn btn-tool"  href=" {{back()->getTargetUrl()}}">Назад</a>
          <button type="button " class="btn btn-danger printButton print form-print" id="printButton" >Друк</button>
      </div>
  </div>
</div>

<!-- Вивод удачного обновления архива -->

@if (session('message-updated'))
  @component('admink.components.alert')
    @slot('type')
      success
    @endslot
      {!! session('message-updated') !!}
  @endcomponent
@endif    

<!-- Подключается форма с печатной формой -->
 <div>
  <div id="forma_print" style="display: none;">
     @include('archive_input_print') 
 </div>
</div>
<!-- Заканчивается вывод печатной формы -->


<!-- Общий блок с архивом Клик по кнопке Подсказка открівает подсказку по оjquery-->

  <div class="card card-body">
    <div class="row" style="margin-left: 10px">
      <span class="texthead_ukr helps mt-1" style="color:  #8B008B;"> Підказка </span>
        <h4 class="stroka" style="display: none; ">  
         <button type="button" class="btn btn-tool closeself float-sm-right"><i class="fas fa-remove"></i></button>
         <i> Оберіть або період с.. та по.. або фильтр для перегляду архіву і підтвердіть вибір кнопкою <strong>Показати</strong> <br> Для друку звіту обов'язково оберіть напрямок і підтвердіть вибір кнопкою <strong>Показати!</strong></i> <br> <i> Для коригування даних необхідно внести зміни в один рядок та підтвердити натисканням на кнопку <strong> "Зберегти". </strong></i>
       </h4>
      <hr>
 
<!--  Форма отправляет дату и направление  -->   

  <form role="form" method="get" >
    <div class="form-row " style="background-image: url(images/static_gradient_4.jpg);">
      <p class="ml-2"><strong>Оберіть період</strong></p>
        <div class="col">
          c: <input type="date" name="calendarpers" class="form-control" value="@if(isset($calendars)) {!!\Carbon\Carbon::parse( $calendars)->format('d-m-Y')!!} @endif">
          </div>
          <div class="col">
          по: <input type="date" class="form-control" name="calendarperpo" value="@if(isset($calendarpo)) {!!\Carbon\Carbon::parse( $calendarpo)->format('d-m-Y')!!}  @endif">
          </div>
         <div class="col" style="width: 500px">
            <strong>Оберіть напрямок</strong>
              <select class="form-control" name="direction">
                <option value="999"> Усі напрямки </option>
                @foreach($direction as $dir)

               @if($userCourse->course == 1 && $dir->id >20)
               <option value="{{$dir->id}}" @if(isset($napr) && $napr==$dir->id) selected  @endif >{!!$dir->direction!!}</option>
               @endif
    
              @if($userCourse->course > 1 && $dir->id < 20)
              <option value="{{$dir->id}}" @if(isset($napr) && $napr==$dir->id) selected  @endif >{!!$dir->direction!!}</option>
              @endif

                @endforeach
              </select>
          </div>
          <div class="col">
            <strong>Фільтр</strong>
              <input type="hidden" name="calendarpo" value="{{date('Y-m-d')}}">
              <select type="text" name="calendars" class="form-control" style="width:100%;">
              <option selected>@if(isset($calendars)) {!!\Carbon\Carbon::parse( $calendars)->format('d-m-Y')!!}
              @else Оберіть... @endif</option>
              <option value="{{date('Y-m-d',strtotime('-14 days'))}}">За 14 днів</option>
              <option value="{{date('Y-m-d',strtotime('-30 days'))}}">За 30 днів</option>
              <option value="{{date('Y-m-d',strtotime('-365 days'))}}">За рік</option>
              </select>
          </div>
          <div class="col">
            <input type="submit" class="btn btn-outline-danger" style="margin-top:22px " value="Показати"></p>
          </div>
      </div>
  </form>

<!--    Вывод таблицы с данными архива    -->

  <table style="width: 100%" clas="table-responsive">
    <tr>
      <th class="print">Зберегти</th>
      <th ><center>Діагноз/МКБ</th></center>
      <th>Номер карти</th>
      <th>Назва операції</th>
      <th>№ <br>операції</th>
      <th>Початок курації</th>
      <th>Кінець курації</th>
      <th>Вид участі</th>
      <th>База стажування</th>
      <th>Хірургічні напрямки</th>
    </tr>
   @foreach($result as $lastTenDaysRecords)
    <form form role="form" method="post" action="{{asset('archive_inputday')}}">
              {{ csrf_field() }}
      <tr>
         <td class="smol_td print" class="col-md-6 col-sm-6 col-xs-6  widthbutton print"><button type="submit" class="btn btn-primary btm-sm smol_input post_archiv" ><i class="fa fa-edit" aria-hidden="true"></i></button></td>

        <td><textarea name="diagnoses" class="form-control diagnoses" style="width:230px">{!! $lastTenDaysRecords->diagnoses !!}</textarea></td>
       
        <td><textarea name="num_card" style="width:100px" class="form-control">{!! $lastTenDaysRecords->num_card !!}</textarea></td>

        <td><textarea name="oper" style="width:100px" class="form-control"> {!! $lastTenDaysRecords->oper !!}</textarea></td>

        <td><textarea name="comm" style="width:100px" class="form-control">{!! $lastTenDaysRecords->comm !!}</textarea></td>

        <td><input type="date" class="form-control" name="apdate" value="{{$lastTenDaysRecords->apdate}}"></td>

         <td style="background:lightgrey;width: 150px" ><input type="date" class="form-control" name="apdate_end" value="{!! $lastTenDaysRecords->apdate_end !!}"></td>
       
        <td>
        <select style="width: 150px;" class="form-control" name="type_work">
          <option selected>{!! $lastTenDaysRecords->type_work !!}</option>
          <option>Курація</option>
          <option>Асистенція</option>
          <option>Самостійно</option>
          <option>Етапи опреації</option>
        </select>
        </td>

        <td>
        <select style="width: 100px;" class="form-control" name="fio">
          <option selected>{!! $lastTenDaysRecords->fio !!}</option>
          <option>очна</option>
          <option>заочна</option>
        </select>
      </td>

        <td>
         <select style="width: 150px;" class="form-control" name="napravlenie">
          <option selected value="{!! $lastTenDaysRecords->id_direction !!}">{!! $lastTenDaysRecords->direction !!}</option>
          @foreach($direction as $item)
          <option value="{{$item->id}}">{{$item->direction}}</option>
          @endforeach
        </td>
        <input type="hidden" name="table_id" value="{!! $lastTenDaysRecords->id_table !!}">
      </tr>
    </form>
   @endforeach
</div>

@endsection


@section('js')
<script>
  $(document).ready(function(){
  
  $('.helps').click(function () {
  $('.stroka').css('display', 'block');
  });
  
   $('.closeself').click(function () {
  $('.stroka').css('display', 'none');
  });

  $('.card.card-body').css('display', 'block');
  $('#printButton').click(function(){
  $('#forma_print').css('display', 'block'); //js метод отправки сообщения 
  $('.card.card-body').css('display', 'none');
  $('#printButton').css('display', 'none');
  $('.card.card-danger').css('display', 'none');
     });
  });

</script>
@endsection
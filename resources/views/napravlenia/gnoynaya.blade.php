@extends('layouts.base')

@section('content')
 
 <style>

 table {
    width: 100%;
   border: 1px solid #dee2e6;
   }
  
th {
  border-radius: 0.25rem;
   border: 1px solid #dee2e6;
 }
td { border: 1px solid #dee2e6;
   } /**/
thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
}
.layer {
    overflow: scroll; /* Добавляем полосы прокрутки */
}
</style>

<h3> Гнійна хірургія</h3>

<nav>
  
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Розклад</a>

    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Курація хворих</a>

    <a class="nav-item nav-link" id="nav-kyracia-tab" data-toggle="tab" href="#nav-kyracia" role="tab" aria-controls="nav-kyracia" aria-selected="false">Участь в операціях</a>


    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Засвоєні навички</a>

    <a class="nav-item nav-link" id="nav-night-tab" data-toggle="tab" href="#nav-night" role="tab" aria-controls="nav-night" aria-selected="false">Семінарське заняття з оцінками </a>

    <a class="nav-item nav-link" id="nav-nightpract-tab" data-toggle="tab" href="#nav-nightpract" role="tab" aria-controls="nav-nightpract" aria-selected="false"> Тестування </a>

   <!--  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Засвоєна література</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Семінари</a> -->
  </div>
</nav>

  <div class="tab-content" id="nav-tabContent">
   <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <p><h3>Сторінка у розробці</h3>
     </p>
     <!--  <table >
      <div class="table-responsive">
        <thead>
            <tr>
             <th style="width: 60px">Місце стажування, кафедра</th>
             <th style="width: 100px">Тривалість циклу (роб.дні)</th>
             <th style="width: 100px">Термін виконання (строки)</th>
            </tr>
          </thead>
            <tbody>
           <tr>
          <td>Торакальне відділення 16-ї міської лікарні </td>
          <td>60</td>
          <td>Семінари та практична робота</td>
           </tr>
            </tbody>
               </div>
                </table> -->
      </div>

<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<div class="row">
  <div class="col-12 ">
   <div class="card ">
    <div class="card-header">
      <h3 class="card-title "><i><font color="DarkBlue">Курація хворих на очному циклі</font> </i></h3>
    </div>
  <form>
 <p>Оберіть період с: <input type="date" name="calendar">
  по: <input type="date" name="calendar">
  <input type="submit" value="Показати"></p>
  </form>

<div class="card-body">
 <div class="table-responsive">
  <table >
    <thead>
        <tr>
        <th style="width: 100px">ПІБ інтерна</th>
        <th style="width: 100px">Хірургічні напрямки</th>
        <th style="width: 100px">ФІО Хворого</th>
        <th style="width: 300px"><center>Діагноз</th></center>
        <th style="width: 80px">Номер</th>
        <th style="width: 100px">Початок курації</th>
        <th style="width: 100px">Коментар</th>
        <th style="width: 100px">Кінець курації</th>
        <th style="width: 100px">Дата данных</th>
      </tr>
    </thead>
  <tbody>
   
 @foreach ($forms as $inputformdays)
      <tr>
        <td>{!! $inputformdays->user->name !!}</td>
        <td>{!! $inputformdays->direction !!}</td>
        <td>{!! $inputformdays->fio !!}</td>
        <td>{!! $inputformdays->diagnoses !!}</td>
        <td>{!! $inputformdays->num_card !!}</td>
        <td>{!! $inputformdays->apdate !!}</td>
        <td>{!! $inputformdays->comm !!}</td>
        <td>{!! $inputformdays->apdate_end !!}</td>
        <td>{!! $inputformdays->created_at !!}</td>
      </tr>
    @endforeach 
  </tbody>
   </thead>
    </table>
     </div>
       </div>
      </div>
    </div>
   </div>
  </div>

<div class="tab-pane fade" id="nav-kyracia" role="tabpanel" aria-labelledby="nav-kyracia-tab">
  <div class="row">
  <div class="col-12 ">
   <div class="card ">
    <div class="card-header">
      <h4><i><font color="DarkBlue">Участь у операціях на очному циклі</i></font></h4>
     </div>

<!-- <form>
   <p>Оберіть період с: <input type="date" name="calendar">
    по: <input type="date" name="calendar">
   <input type="submit" value="Показати"></p>
</form> -->

<div class="card-body">
<div class="table-responsive">
 <table >
  <thead>
     <tr>
        <th style="width: 100px">ПІБ інтерна</th>
        <th style="width: 100px">Хірургічний напрямок</th>
        <th style="width: 100px">Дата</th>
        <th style="width: 80px">Номер стац.карти</th>
        <th style="width: 80px">Номер операції</th>
        <th style="width: 100px">Вид участі</th>
        <th style="width: 300px"><center>Коментар</th></center>
        <th style="width: 100px">Дата введения</th>
      </tr>
    </thead>
  <tbody>
 @foreach ($formssurgeryday as $formssurgerydays)
      <tr>
        <td>{!! $formssurgerydays->user->name !!}</td>
        <td>{!! $formssurgerydays->direction !!}</td>
        <td>{!! $formssurgerydays->apdate !!}</td>
        <td>{!! $formssurgerydays->num_card !!}</td>
        <td>{!! $formssurgerydays->num_surgery !!}</td>
        <td>{!! $formssurgerydays->type_work !!}</td>
        <td>{!! $formssurgerydays->viewsurgery !!}</td>
        <td>{!! $formssurgerydays->created_at !!}</td>
      </tr>
      @endforeach 
    </tbody>
  </table>
 </div>
</div>
</div>
</div>
</div>
</div>

<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  <div class="row">
  <div class="col-12 ">
   <div class="card ">
    <div class="card-header">
      <h4><i><font color="DarkBlue">Практичні навички на очному циклі</i></font></h4>
     </div>
<!-- <form>
   <p>Оберіть період с: <input type="date" name="calendar">
    по: <input type="date" name="calendar">
   <input type="submit" value="Показати"></p>
  </form> -->
<div class="card-body">
<div class="table-responsive">
    <table >
     <thead>
        <tr>
        <th style="width: 100px">ПІБ інтерна</th>
        <th style="width: 100px">Хірургічні напрямки</th>
        <th style="width: 300px"><center>Навички</th></center>
        <th style="width: 80px">Кількість</th>
        <th style="width: 100px">Дата введення</th>
      </tr>
    </thead>
  <tbody>
   @foreach ($formspracticeday as $formspracticedays)
      <tr>
        <td>{!! $formspracticedays->user->name !!}</td>
        <td>{!! $formspracticedays->direction !!}</td>
        <td>{!! $formspracticedays->get_skills !!}</td>
        <td>{!! $formspracticedays->sum_number !!}</td>
        <td>{!! $formspracticedays->created_at !!}</td>
      </tr>
      @endforeach 
    </tbody>
  </table>  
</div>
</div>
</div>
</div>
</div>
</div>

<div class="tab-pane fade" id="nav-night" role="tabpanel" aria-labelledby="nav-night-tab">
<div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Розклад інтернів 1 курс</h3>
           <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>

 <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <thead>
                <th style="width: 400px; font-size: 2em"><center>Теми семінарів</center></th>
                <th style="width: 80px">Оцінка знань</th>
            </thead>
            <tbody>

    {{ csrf_field() }}
     @foreach ($seminar as $seminars)
<tr>
<td>{!! $seminars->tema !!}</td>
<td ></td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>

   
<div class="tab-pane fade" id="nav-nightpract" role="tabpanel" aria-labelledby="nav-nightptact-tab">
<h3><i>Сторінка у розробці</i></h3>
<p>
</p>


</div>
@endsection
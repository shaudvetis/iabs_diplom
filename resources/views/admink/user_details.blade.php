@extends ('layouts.baseteacher')
@section('content')
@include('layouts.instruction.kerivnuk.osobusto')
<!-- Button trigger modal -->
<nav>
  <div class="nav nav-tabs" >
    <a  class="nav-item nav-link" type="button" data-toggle="tooltip" data-placement="top" title="Особисті дані обраного інтерна">Особисті данні </a>
    <a href="{{asset('admink.user_download/?id_student='.$details->user_id)}}" class="nav-item nav-link"  type="button" data-toggle="tooltip" data-placement="top" title="Фото які завантажив інтерн">Завантаженні документи</a>
    <a class="nav-item nav-link"  href="{{asset('admink.atestat_profiles/?user_id='.$details->user_id)}}" type="button" data-toggle="tooltip" data-placement="top" title="Перегляд додатків обраного інтерна"  >Додатки</a>
    <a href="{{route('admink.user_print', [$details->id])}}" class="nav-item nav-link red" type="button" data-toggle="tooltip" data-placement="top" title="Друк особистих даних обраного інтерна">Друк</a>      
  </div>
</nav>

                      @if (session('message-updated'))
                         @component('admink.components.alert')
                             @slot('type')
                                 success
                             @endslot
                             {!! session('message-updated') !!}
                         @endcomponent
                      @endif          

    <form role="form" method="post" action="{{route('user_profile_update', [$details->id])}}">
    {{ csrf_field() }}
    <input type="hidden" class="form-control" name="id" value="{{$details->id}}">
    <input type="hidden" class="form-control" name="user_id" value="{{$details->user_id}}">    
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-danger">

        <div class="card-header">

            <h3 class="card-title">Особисті данні інтерна</h3>
      
           
        </div>
        <div class="card-body">
            <div class="row">
   <!--  <div class="form-group col-md-5">
      <label>Email</label>
      <input type="text" class="form-control" name="email" placeholder="Email" value="@if(old('email')){{old('email')}}@else{{$details->email}}@endif">
    {!! $errors->first('email', '<small class="help-block red">:message</small>') !!}      
    </div> -->

<div class="col-6">
    <label>Прізвище</label>
    <input type="text" class="form-control" name="surname" value="@if(old('surname')){{old('surname')}}@else{{$details->surname}}@endif">
    {!! $errors->first('surname', '<small class="help-block red">:message</small>') !!}
  </div>
      <div class="col-4">
    <label>Ім'я</label>
    <input type="text" class="form-control" name="name" value="@if(old('name')){{old('name')}}@else{{$details->name}}@endif">
    {!! $errors->first('name', '<small class="help-block red">:message</small>') !!}    
  </div>
  <div class="col-5">
    <label>По батькові</label>
    <input type="text" class="form-control" name="lastname" value="@if(old('lastname')){{old('lastname')}}@else{{$details->lastname}}@endif">
    {!! $errors->first('lastname', '<small class="help-block red">:message</small>') !!}    
  </div> 
 
<div class="col-3">
<label>Стать</label>
<select name="gender" class="form-control select2" style="width: 100%;">
<option @php if(strpos($details->gender,'жіноча')) echo 'selected'; @endphp>Жіноча</option>
<option @php if(strpos($details->gender,'чоловіча')) echo 'selected'; @endphp>Чоловіча</option>
 </select>
</div>


   <div class="col-5">
    <label>ПІБ інтерна англійською мовою</label>
    <input type="text" class="form-control" name="fullname_en" value="{{$details->fullname_en}}">
  </div>

<div class="col-6">
    <label>ПІБ, які використовувались раніше (здебільшого для жінок)</label>
    <input type="text" class="form-control" name="surnamefirst" value="{{$details->surnamefirst}}">
  </div>
  <div class="col-3">
    <label>Кафедра</label>
    <select name="kafedra" class="form-control select1" style="width: 100%;" value="{{$details->kafedra}}">
   <option>Хірургія №1</option>
 </select>
  </div>
<div class="col-4">
    <label>Дата  бак.посів та коментар</label>
    <input type="text" class="form-control" name="date_bak" value="{{$details->date_bak}}" placeholder="23.10.2018 Отрицательно">
</div>
<div class="col-4">
    <label>Флюрографія норма</label>
    <input type="text" class="form-control" name="fl_norm" value="{{$details->fl_norm}}" placeholder="введіть номер">
</div>
<div class="col-3">
<label>Курс</label>
<select name="course" class="form-control select1" style="width: 100%;">
  <option selected></option>
   <option value="1" @if(isset($details->course)) @if($details->course == 1) selected @endif @endif>1</option>
  <option value="2" @if(isset($details->course)) @if($details->course == 2) selected @endif @endif>2</option>
  <option value="3" @if(isset($details->course)) @if($details->course == 3) selected @endif @endif>3</option>
  </select>
</div>
<div class="col-2">
    <label>Десяток</label>
    <select name="decatki" class="form-control select1" style="width: 100%;">
  <option selected></option>
   <option value="1" @if(isset($details->decatki)) @if($details->decatki == 1) selected @endif @endif>1</option>
   <option value="2" @if(isset($details->decatki)) @if($details->decatki == 2) selected @endif @endif >2</option>
   <option value="3" @if(isset($details->decatki)) @if($details->decatki == 3) selected @endif @endif >3</option>
   <option value="4" @if(isset($details->decatki)) @if($details->decatki == 4) selected @endif @endif >4</option>
   <option value="5" @if(isset($details->decatki)) @if($details->decatki == 5) selected @endif @endif >5</option>
   <option value="6" @if(isset($details->decatki)) @if($details->decatki == 6) selected @endif @endif >6</option>
 </select>
</div>


  </div>
</div>
    </div>
    <!-- SELECT2 EXAMPLE -->
      <div class="card card-danger">
          <div class="card-header">
              <h3 class="card-title">Поштова адреса місця мешкання інтерна</h3>
          </div>
          <div class="card-body">
              <div class="row">
               <div class="form-group col-md-4">
                <label>Країна</label>
                <input type="text" class="form-control" name="country" value="{{$details->country}}">
               </div>
                <div class="form-group col-md-4">
                 <label for="inputCity">Місто</label>
                  <input type="text" class="form-control" name="city" value="{{$details->city}}">
                </div>
                <div class="form-group col-md-4">
                 <label>ПГТ</label>
                  <input type="text" class="form-control" name="village" value="{{$details->village}}">
                  </div>
    <div class="form-group col-md-2">
        <label for="inputZip">Індекс</label>
        <input type="text" class="form-control" name="index" value="{{$details->index}}">
    </div>

  <div class="col-5">
    <label for="inputfio">Вулиця</label>
    <input type="text" class="form-control" name="adress" placeholder="Вулиця" value="{{$details->adress}}">
  </div>
  <div class="col">
    <label for="inputAddress">Будинок</label>
    <input type="text" class="form-control" name="house" placeholder="будинок" value="{{$details->house}}">
  </div>
  <div class="col">
    <label for="inputAddress">Квартира</label>
    <input type="text" class="form-control" name="apartment" placeholder="номер" value="{{$details->apartment}}">
  </div>
     <div class="col-5">
    <label for="inputAddress">Особисті контактні телефони</label>
    <input type="text" class="form-control" name="telm" placeholder="мобільний" value="{{$details->telm}}">
     </div>
   </div>
          </div>
        </div>
              <!-- SELECT2 EXAMPLE -->
              <div class="card card-danger">

                  <div class="card-header">

                      <h3 class="card-title">Поштова адреса місця прописки інтерна</h3>
                  </div>
                  <div class="card-body">
                      <div class="row">
     <div class="form-group col-md-4">
      <label>Країна</label>
      <input type="text" class="form-control" name="country1" value="{{$details->country1}}">
    </div>
  
    <div class="form-group col-md-4">
      <label>Місто</label>
      <input type="text" class="form-control" name="city1" value="{{$details->city1}}">
    </div>
    <div class="form-group col-md-4">
      <label>ПГТ</label>
      <input type="text" class="form-control" name="village1" value="{{$details->village1}}">
    </div>
      <div class="form-group col-md-2">
      <label>Індекс</label>
      <input type="text" class="form-control" name="index1" value="{{$details->index1}}">
    </div>
<div class="col-5">
    <label>Вулиця</label>
    <input type="text" class="form-control" name="adres1" placeholder="Вулиця" value="{{$details->adres1}}">
  </div>
  <div class="col">
    <label>Будинок</label>
    <input type="text" class="form-control" name="house1" placeholder="будинок" value="{{$details->house1}}">
  </div>
  <div class="col">
    <label>Квартира</label>
    <input type="text" class="form-control" name="apartment1" placeholder="номер" value="{{$details->apartment1}}">
  </div>
                      </div>
                  </div>
              </div>
                      <!-- SELECT2 EXAMPLE -->
                     <!-- SELECT2 EXAMPLE -->
                      <div class="card card-danger">

                          <div class="card-header">

                              <h3 class="card-title">Поштова адреса батьків</h3>
  
                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="form-group col-md-5">
      <label>Країна</label>
      <input type="text" class="form-control" name="country2" value="{{$details->country2}}">
    </div>
  
    <div class="form-group col-md-6">
      <label>Місто</label>
      <input type="text" class="form-control" name="city2" value="{{$details->city2}}">
    </div>

<div class="form-group col-md-7">
      <label>СМТ</label>
      <input type="text" class="form-control" name="village2" value="{{$details->village2}}">
    </div>
      <div class="form-group col-md-2">
      <label>Індекс</label>
      <input type="text" class="form-control" name="index2" value="{{$details->index2}}">
    </div>
    
 <div class="col-3">
  <label>Вулиця</label>
  <input type="text" class="form-control" name="adres2" placeholder=" Вулиця" value="{{$details->adres2}}">
  </div>

  <div class="col-3">
  <label>Будинок</label>
  <input type="text" class="form-control" name="house2" placeholder="будинок" value="{{$details->house2}}">
  </div>
  
  <div class="col-3">
  <label>Квартира</label>
  <input type="text" class="form-control" name="apartment2" placeholder="номер" value="{{$details->apartment2}}">
  </div>
  
  <div class="col-7">
    <label>Телефон батьків</label>
    <input type="text" class="form-control" name="tel1" placeholder="номер" value="{{$details->tel1}}">
  </div>
                              </div>
                          </div>
                        </div>
<!-- SELECT2 EXAMPLE -->
  <div class="card card-danger">
   <div class="card-header">
    <h3 class="card-title">Заочна база</h3>
       </div>
  
  <div class="card-body">
  <div class="row">
  <div class="form-group col-md-4">
  <label>Країна</label>
  <input type="text" class="form-control" name="country3" value="{{$details->country3}}">
  </div>
  
  <div class="form-group col-md-4">
  <label>Місто</label>
  <input type="text" class="form-control" name="city3" value="@if(old('lastname')){{old('lastname')}}@else{{$details->city3}}@endif">
  {!! $errors->first('city3', '<small class="help-block red">:message</small>') !!} 
  </div>

  <div class="form-group col-md-4">
  <label>СМТ</label>
  <input type="text" class="form-control" name="village3" value="{{$details->village3}}">
  </div>
      
  <div class="form-group col-md-2">
  <label>Індекс</label>
  <input type="text" class="form-control" name="index3" value=" {{$details->index3}}">
  </div>
    
  <div class="col-3">
  <label>Вулиця</label>
  <input type="text" class="form-control" name="adres3" placeholder=" Вулиця" value="{{$details->adres3}}">
  </div>

  <div class="col-3">
  <label>Будинок</label>
  <input type="text" class="form-control" name="house3" placeholder="будинок" value="{{$details->house3}}">
  </div>
  
  <div class="col-4">
  <label>ПІБ головного лікаря</label>
  <input type="text" class="form-control" name="doctor1" placeholder="введіть ПІБ" value="{{$details->doctor1}}">
  </div>

  <div class="col-5">
  <label>Службові телефони базової лікарні</label>
  <input type="text" class="form-control" name="tel2" placeholder="введіть номер" value="{{$details->tel2}}">
</div>
  <div class="col-4">
  <label>ПІБ базового керівника </label>
  <input type="text" class="form-control" name="bos" placeholder="номервведіть ПІБ" value="{{$details->bos}}">
</div>
  <div class="col-3">
  <label>Стаж базового керівника </label>
  <input type="text" class="form-control" name="boswork" placeholder="введіть стаж" value="{{$details->boswork}}">
</div>
  <div class="col-3">
  <label>Атестаційна категорія базового керівника </label>
  <input type="text" class="form-control" name="boskat" placeholder="Введіть категорію" value="{{$details->boskat}}">
 </div>
</div>
  </div>
</div>
<!-- SELECT2 EXAMPLE -->
  <div class="card card-danger">
   <div class="card-header">
    <h3 class="card-title">Розподіл після інтернатури (держбюджет)</h3>
        </div>
  
  <div class="card-body">
  <div class="row">
  <div class="form-group col-md-4">
  <label>Країна</label>
  <input type="text" class="form-control" name="country4" value="{{$details->country4}}">
  </div>
  
  <div class="form-group col-md-4">
  <label>Місто</label>
  <input type="text" class="form-control" name="city4" value="{{$details->city4}}">
  </div>

  <div class="form-group col-md-4">
  <label>СМТ</label>
  <input type="text" class="form-control" name="village4" value="{{$details->village4}}">
  </div>
      
  <div class="form-group col-md-2">
  <label>Індекс</label>
  <input type="text" class="form-control" name="index4" value="{{$details->index4}}">
  </div>

  <div class="col-3">
  <label>Лікарня</label>
  <input type="text" class="form-control" name="healt1" placeholder=" Вулиця" value="{{$details->healt1}}">
  </div>
    
  <div class="col-3">
  <label>Вулиця</label>
  <input type="text" class="form-control" name="adres4" placeholder=" Вулиця" value="{{$details->adres4}}">
  </div>

  <div class="col-3">
  <label>Будинок</label>
  <input type="text" class="form-control" name="house4" placeholder="будинок" value="@if(old('lastname')){{old('lastname')}}@else{{$details->house4}}@endif">


  </div> 
  
  <div class="col-4">
  <label>ПІБ головного лікаря</label>
  <input type="text" class="form-control" name="doctor2" placeholder="введіть ПІБ" value="{{$details->doctor2}}">
  </div>

  <div class="col-5">
  <label>Службові телефони лікарні</label>
  <input type="text" class="form-control" name="tel3" placeholder="введіть номер" value="{{$details->tel3}}">
</div>
</div>
</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Відправити</button>

  <!--   <a href="{{route('admink.user_print', [$details->id])}}" role="button" class="nav-item nav-link red" >Друк</a>    -->  
                          </div>
                      </div>
                    </div>
</form>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
@endsection


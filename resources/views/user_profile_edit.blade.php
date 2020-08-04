@extends('layouts.base')
@include('layouts.instruction.intern.profile')
@section('content')

<div class="tab-content" id="nav-tabContent">

                      @if (session('message-updated'))
                         @component('admink.components.alert')
                             @slot('type')
                                 success
                             @endslot
                             {!! session('message-updated') !!}
                         @endcomponent
                      @endif          

  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

    <form role="form" method="post" action="{{asset('user_profile_edit')}}">
    {{ csrf_field() }}
     <input type="hidden" class="form-control" name="id" value="{{$details->id}}">
    <input type="hidden" class="form-control" name="user_id" value="{{$details->user_id}}">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-danger">

        <div class="card-header">

            <h3 class="card-title">Особисті данні інтерна</h3>

            <div class="card-tools">
 <a class="btn btn-tool"  href="{{asset('profile_print')}}">Роздрукувати</a>
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
 <div class="form-group col-6">
    <label>Прізвище</label>
    <input type="text" class="form-control" name="surname" value="@if(old('surname')){{old('surname')}}@else{{$details->surname}}@endif">
    {!! $errors->first('surname', '<small class="help-block red">:message</small>') !!}
  </div>
      <div class="form-group col-4">
    <label>Ім'я</label>
    <input type="text" class="form-control" name="name" value="@if(old('name')){{old('name')}}@else{{$details->name}}@endif">
    {!! $errors->first('name', '<small class="help-block red">:message</small>') !!}    
  </div>
  <div class="form-group col-5">
    <label>По батькові</label>
    <input type="text" class="form-control" name="lastname" value="@if(old('lastname')){{old('lastname')}}@else{{$details->lastname}}@endif">
    {!! $errors->first('lastname', '<small class="help-block red">:message</small>') !!}    
  </div> 
 
 
<div class="col-3">
<label>Стать</label>


@if($gender === 'true') 
<select name="gender" class="form-control select1" style="width: 100%;">
  <option value="Чоловіча" selected="selected">чоловіча</option>
  <option value="Жіноча"> жіноча </option>
@endif
@if($gender === 'false')
<select name="gender" class="form-control select1" style="width: 100%;">
  <option value="Жіноча" selected="selected">жіноча</option>
  <option value="Чоловіча">чоловіча</option>
@endif
 </select>
</div>
       <div class="form-group col-3">
    <label>Кафедра</label>
    <select name="kafedra" class="form-control select1" style="width: 100%;" value="{{$details->kafedra}}">
   <option>Хірургія №1</option>
 </select>  
</div>



<div class="form-group col-5">
    <label>ПІБ інтерна англійською мовою</label>
    <input type="text" class="form-control" name="fullname_en" value="{{$details->fullname_en}}">
  </div>

<div class="=form-group col-6">
    <label>ПІБ, які використовувались раніше</label>
    <input type="text" class="form-control" name="surnamefirst" value="{{$details->surnamefirst}}" placeholder="здебільшого для жінок, введіть тільки призвище">
</div>
<div class="form-group col-4">
    <label>Дата  бак.посів та коментар</label>
    <input type="text" class="form-control" name="date_bak" value="{{$details->date_bak}}" placeholder="23.10.2018 Отрицательно">
</div>
<div class="form-group col-4">
    <label>Флюрографія норма</label>
    <input type="text" class="form-control" name="fl_norm" value="{{$details->fl_norm}}" placeholder="введіть норму">
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

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
              </div>
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
                      <label>СМТ</label>
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

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
                      </div>
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
      <label>СМТ</label>
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
                      <div class="card card-danger">

                          <div class="card-header">

                              <h3 class="card-title">Поштова адреса батьків</h3>

                              <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="form-group col-md-4">
      <label>Країна</label>
      <input type="text" class="form-control" name="country2" value="{{$details->country2}}">
    </div>
  
    <div class="form-group col-md-4">
      <label>Місто</label>
      <input type="text" class="form-control" name="city2" value="{{$details->city2}}">
    </div>

<div class="form-group col-md-4">
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
     <div class="card-tools">
      <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
     </div>
    </div>
  
  <div class="card-body">
  <div class="row">
  <div class="form-group col-md-4">
  <label>Країна</label>
  <input type="text" class="form-control" name="country3" value="{{$details->country3}}">
  </div>
  
  <div class="form-group col-md-4">
  <label>Місто</label>
  <input type="text" class="form-control" name="city3" value="{{$details->city3}}">
  </div>

  <div class="form-group col-md-4">
  <label>СМТ</label>
  <input type="text" class="form-control" name="village3" value="{{$details->village3}}">
  </div>
      
  <div class="form-group col-md-2">
  <label>Індекс</label>
  <input type="text" class="form-control" name="index3" value=" {{$details->index3}}">
  </div>
    
  <div class="form-group col-3">
  <label>Вулиця</label>
  <input type="text" class="form-control" name="adres3" placeholder=" Вулиця" value="{{$details->adres3}}">
  </div>

  <div class="form-group col-3">
  <label>Будинок</label>
  <input type="text" class="form-control" name="house3" placeholder="будинок" value="{{$details->house3}}">
  </div>
  
  <div class="form-group col-4">
  <label>ПІБ головного лікаря</label>
  <input type="text" class="form-control" name="doctor1" placeholder="введіть ПІБ" value="{{$details->doctor1}}">
  </div>

  <div class="form-group col-5">
  <label>Службові телефони базової лікарні</label>
  <input type="text" class="form-control" name="tel2" placeholder="введіть номер" value="@if(old('tel2')){{old('tel2')}}@else{{$details->tel2}}@endif">


</div>
  <div class="form-group col-4">
  <label>ПІБ базового керівника </label>
  <input type="text" class="form-control" name="bos" placeholder="номервведіть ПІБ" value="{{$details->bos}}">
</div>
  <div class="form-group col-4">
  <label>Стаж базового керівника </label>
  <input type="text" class="form-control" name="boswork" placeholder="введіть стаж" value="{{$details->boswork}}">
</div>
  <div class="form-group col-5">
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
     <div class="card-tools">
      <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
     </div>
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
  <input type="text" class="form-control" name="house4" placeholder="будинок" value="{{$details->house4}}">
  </div> 
  
  <div class="col-4">
  <label>ПІБ головного лікаря</label>
  <input type="text" class="form-control" name="doctor2" placeholder="введіть ПІБ" value="{{$details->doctor2}}">
  </div>

  <div class="col-5">
  <label>Службові телефони лікарні</label>
  <input type="text" class="form-control" name="tel3" placeholder="введіть номер" value="@if(old('tel3')){{old('tel3')}}@else{{$details->tel3}}@endif">
 


</div>
</div>
</div>
</div>


                          <div class="card-footer">
 <button type="submit" class="btn btn-primary">Відправити</button>
    
                          </div>
                      </div>
                    </div>
</form>

@endsection












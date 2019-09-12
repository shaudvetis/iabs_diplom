@extends('layouts.base')

@section('content')
<ul class="nav justify-content-end">
    <li class="nav-item">
<a class="nav-link active" href="{{asset('download_profile')}}">Завантажити додатки</a>
</li>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>

<div class="col-7">
    <label for="inputfio">Прізвище</label>
    <input type="text" class="form-control" id="inputfio">
  </div>
  <div class="col">
    <label for="inputfio">Ім'я</label>
    <input type="text" class="form-control" id="inputfio">
  </div>
  <div class="col">
    <label for="inputfio">По батькові</label>
    <input type="text" class="form-control" id="inputfio">
  </div> 
 
 <div class="col-7">
                   {!! Form::label('type_work', 'Стать') !!}
                   <select name="type_work" class="form-control select2" style="width: 100%;">
                    <option>Жіноча</option>
                    <option>Чоловіча</option>
                    </select>
                </div>
<div class="col-7">
    <label for="inputfio">ПІБ інтерна англійською мовою</label>
    <input type="text" class="form-control" id="inputfio">
  </div>

<div class="col-7">
    <label for="inputfio">ПІБ, які використовувались раніше (здебільшого для жінок).</label>
    <input type="text" class="form-control" id="inputfio">
  </div>

<h3 for="inputfio">Поштова адреса місця мешкання інтерна</h3>

    <div class="form-group col-md-6">
      <label for="inputCity">Країна</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputCity">Місто</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-7">
      <label for="inputCity">ПГТ</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
      <div class="form-group col-md-2">
      <label for="inputZip">Індекс</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  
<div class="col-7">
    <label for="inputfio">Вулиця</label>
    <input type="text" class="form-control" id="inputfio" placeholder="Вулиця ">
  </div>
  <div class="col">
    <label for="inputAddress">Будинок</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="будинок">
  </div>
  <div class="col">
    <label for="inputAddress">Квартира</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="номер">
  </div>

<div class="col-7">
    <label for="inputAddress">Особисті контактні телефони </label>
    <input type="text" class="form-control" id="inputAddress" placeholder="домашній">
     </div>
     <div class="col-7">
    <label for="inputAddress">Особисті контактні телефони</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="мобільний">
     </div>

<h3>Поштова адреса місця прописки</h3>
 <div class="form-group col-md-6">
      <label for="inputCity">Країна</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputCity">Місто</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-7">
      <label for="inputCity">ПГТ</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
      <div class="form-group col-md-2">
      <label for="inputZip">Індекс</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  
<div class="col-7">
    <label for="inputfio">Вулиця</label>
    <input type="text" class="form-control" id="inputfio" placeholder="Вулиця ">
  </div>
  <div class="col">
    <label for="inputAddress">Будинок</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="будинок">
  </div>
  <div class="col">
    <label for="inputAddress">Квартира</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="номер">
  </div>

<h3>Поштова адреса батьків</h3>

<div class="form-group col-md-6">
      <label for="inputCity">Країна</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputCity">Місто</label>
      <input type="text" class="form-control" id="inputCity">
    </div>

<div class="form-group col-md-7">
      <label for="inputCity">ПГТ</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
      <div class="form-group col-md-2">
      <label for="inputZip">Індекс</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
    
<div class="col-7">
    <label for="inputfio">Адреса батьків</label>
    <input type="text" class="form-control" id="inputfio" placeholder=" Вулиця будинок\квартира">
  </div>
  
  <div class="col-7">
    <label for="inputfio">Телефон батьків</label>
    <input type="text" class="form-control" id="inputfio" placeholder="номер">
  </div>
    

 <button type="submit" class="btn btn-primary">Відправити</button>
</form>



@endsection
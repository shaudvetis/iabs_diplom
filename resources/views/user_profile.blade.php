@extends('layouts.base')
@include('layouts.instruction.intern.profile')
@section('content')

<div class="container">

                      @if (Session::has('flash_message'))
                      <div class="alert alert-success">
                      <button type="button" class="close" data-target="alert" aria-hidden="true">&times; </button>{{Session::get('flash_message')}}</div>

                         @endif  
</div>                                              

<ul class="nav justify-content-end"> 
  <li class="nav-item">
    <a class="nav-link active" href="{{asset('download_profile')}}">Завантажити додатки</a>
</li>

  <li class="nav-item">
    <a class="nav-link active" href="{{asset('atestat_profile')}}">Данні атестата</a>
</ul>
  <form role="form" method="post" action="{{route('user_profile')}}">
    {{ csrf_field() }}
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Особисті данні інтерна</h3>
           <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
        <div class="card-body">
     <div class="row">
  <div class="col-4">
    <label>Прізвище</label>
    <input type="text" class="form-control" name="surname" >
  </div>
  
  <div class="col-4">
    <label>Ім'я</label>
    <input type="text" class="form-control" name="name">
  </div>

  <div class="col-4">
    <label>По батькові</label>
    <input type="text" class="form-control" name="lastname">
  </div> 
 
 <div class="col-3">
   {!! Form::label('gender', 'Стать') !!}
   <select name="gender" class="form-control select" style="width: 100%;">
   <option>Жіноча</option>
   <option>Чоловіча</option>
   </select>
 </div>

<div class="form-group col-md-4">
    <label>ПІБ інтерна англійською мовою</label>
    <input type="text" class="form-control" name="fullname_en">
  </div>

<div class="form-group col-md-5">
    <label>ПІБ, які використовувались раніше </label>
    <input type="text" class="form-control" name="surnamefirst" placeholder=" (здебільшого для жінок, введіть тільки призвище)">
  </div>

<div class="col-3">
    <label>Кафедра</label>
    <select name="kafedra" class="form-control select1" style="width: 100%;">
   <option>Хірургія №1</option>
 </select>
  </div>
<div class="col-4">
    <label>Дата  бак.посів та коментар</label>
    <input type="text" class="form-control" name="date_bak"  placeholder="23.10.2018 Отрицательно">
</div>
<div class="col-4">
    <label>Флюрографія норма</label>
    <input type="text" class="form-control" name="fl_norm" placeholder="введіть норми">
</div>
<div class="col-2">
    <label>Курс</label>
    <select name="course" class="form-control select1" style="width: 100%;">
   <option></option>
   <option>1</option>
   <option>2</option>
   <option>3</option>
 </select>
</div>
<div class="col-2">
    <label>Десяток</label>
    <select name="decatki" class="form-control select1" style="width: 100%;">
   <option></option>
   <option>1</option>
   <option>2</option>
   <option>3</option>
   <option>4</option>
   <option>5</option>
   <option>5</option>
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
  <input type="text" class="form-control" name="country">
  </div>

  <div class="form-group col-md-4">
  <label for="inputCity">Місто</label>
  <input type="text" class="form-control" name="city">
  </div>
  
  <div class="form-group col-md-4">
  <label>СМТ</label>
  <input type="text" class="form-control" name="village">
  </div>

  <div class="form-group col-md-2">
  <label for="inputZip">Індекс</label>
  <input type="text" class="form-control" name="index">
  </div>

  <div class="col-5">
  <label for="inputfio">Вулиця</label>
  <input type="text" class="form-control" name="adress" placeholder="Вулиця ">
  </div>
  
  <div class="col-2">
  <label for="inputAddress">Будинок</label>
  <input type="text" class="form-control" name="house" placeholder="будинок">
  </div>
  
  <div class="col-2">
  <label for="inputAddress">Квартира</label>
  <input type="text" class="form-control" name="apartment" placeholder="номер">
  </div>

  <div class="col-5">
  <label for="inputAddress">Особисті контактні телефони</label>
  <input type="text" class="form-control" name="telm" placeholder="мобільний">
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
  <input type="text" class="form-control" name="country1">
  </div>
  
  <div class="form-group col-md-4">
  <label>Місто</label>
  <input type="text" class="form-control" name="city1">
  </div>
  
  <div class="form-group col-md-4">
  <label>СМТ</label>
  <input type="text" class="form-control" name="village1">
  </div>
      
  <div class="form-group col-md-2">
  <label>Індекс</label>
  <input type="text" class="form-control" name="index1">
  </div>
  
  <div class="col-5">
  <label>Вулиця</label>
  <input type="text" class="form-control" name="adres1" placeholder="Вулиця ">
  </div>

  <div class="col">
  <label>Будинок</label>
  <input type="text" class="form-control" name="house1" placeholder="будинок">
  </div>
  
  <div class="col">
  <label>Квартира</label>
  <input type="text" class="form-control" name="apartment1" placeholder="номер">
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
  <input type="text" class="form-control" name="country2">
  </div>
  
  <div class="form-group col-md-4">
  <label>Місто</label>
  <input type="text" class="form-control" name="city2">
  </div>

  <div class="form-group col-md-4">
  <label>СМТ</label>
  <input type="text" class="form-control" name="village2">
  </div>
      
  <div class="form-group col-md-2">
  <label>Індекс</label>
  <input type="text" class="form-control" name="index2">
  </div>
    
  <div class="col-3">
  <label>Вулиця</label>
  <input type="text" class="form-control" name="adres2" placeholder=" Вулиця">
  </div>

  <div class="col-3">
  <label>Будинок</label>
  <input type="text" class="form-control" name="house2" placeholder="будинок">
  </div>
  
  <div class="col-3">
  <label>Квартира</label>
  <input type="text" class="form-control" name="apartment2" placeholder="номер">
  </div>

  <div class="col-5">
  <label>Телефон батьків</label>
  <input type="text" class="form-control" name="tel1" placeholder="номер">
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
  <input type="text" class="form-control" name="country3">
  </div>
  
  <div class="form-group col-md-4">
  <label>Місто</label>
  <input type="text" class="form-control" name="city3">
  </div>

  <div class="form-group col-md-4">
  <label>СМТ</label>
  <input type="text" class="form-control" name="village3">
  </div>
      
  <div class="form-group col-md-2">
  <label>Індекс</label>
  <input type="text" class="form-control" name="index3">
  </div>
    
  <div class="col-3">
  <label>Вулиця</label>
  <input type="text" class="form-control" name="adres3" placeholder=" Вулиця">
  </div>

  <div class="col-3">
  <label>Будинок</label>
  <input type="text" class="form-control" name="house3" placeholder="будинок">
  </div>
  
  <div class="col-4">
  <label>ПІБ головного лікаря</label>
  <input type="text" class="form-control" name="doctor1" placeholder="введіть ПІБ">
  </div>

  <div class="col-5">
  <label>Службові телефони базової лікарні</label>
  <input type="text" class="form-control" name="tel2" placeholder="введіть номер">
</div>
  <div class="col-4">
  <label>ПІБ базового керівника </label>
  <input type="text" class="form-control" name="bos" placeholder="номервведіть ПІБ">
</div>
  <div class="col-3">
  <label>Стаж базового керівника </label>
  <input type="text" class="form-control" name="boswork" placeholder="введіть стаж">
</div>
  <div class="col-3">
  <label>Атестаційна категорія базового керівника </label>
  <input type="text" class="form-control" name="boskat" placeholder="Введіть категорію">
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
  <input type="text" class="form-control" name="country4">
  </div>
  
  <div class="form-group col-md-4">
  <label>Місто</label>
  <input type="text" class="form-control" name="city4">
  </div>

  <div class="form-group col-md-4">
  <label>СМТ</label>
  <input type="text" class="form-control" name="village4">
  </div>
      
  <div class="form-group col-md-2">
  <label>Індекс</label>
  <input type="text" class="form-control" name="index4">
  </div>

  <div class="col-3">
  <label>Лікарня</label>
  <input type="text" class="form-control" name="healt1" placeholder=" Вулиця">
  </div>
    
  <div class="col-3">
  <label>Вулиця</label>
  <input type="text" class="form-control" name="adres4" placeholder=" Вулиця">
  </div>

  <div class="col-3">
  <label>Будинок</label>
  <input type="text" class="form-control" name="house4" placeholder="будинок">
  </div>
  
  <div class="col-4">
  <label>ПІБ головного лікаря</label>
  <input type="text" class="form-control" name="doctor2" placeholder="введіть ПІБ">
  </div>

  <div class="col-5">
  <label>Службові телефони лікарні</label>
  <input type="text" class="form-control" name="tel3" placeholder="введіть номер">
</div>
  </div>
    </div>
     


 <div class="card-footer">
 <button type="submit" class="btn btn-primary">Відправити</button>
  </div>

 </form>
</div>
</div>



@endsection
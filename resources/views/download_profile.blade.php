@extends('layouts.base')
@include('layouts.instruction.intern.donwload')
@section('content')
<div class="card card-info">
 <div class="card-header">
<h3>Ідентифікаційні данні інтерна</h3>
</div>
</div>
@if($down_img === false)
    <div class="card card-info">
        <p>Зверніть увагу! Вам потрібно загрузити по кожному з елементів разом усі фото!
        Приклад: в строку с даними паспорта потрібно загрузити 4 фото паспорта, це потрібно зробити одразу, вибрати з галереї усі фото та загрузити або вони перезапишуться!</p>
<form role="form" method="post" action="/add_string">
        {{ csrf_field() }}
        <input type="submit" name="sub" value="sub">Натисніть на кнопку sub!
        </form>
    </div>
@else

       <!-- form start -->
<form role="form" enctype="multipart/form-data" method="post" action="{{route('download_profile')}}">
  {{ csrf_field() }}


<div class="card-header">
<h5>Паспортні данні</h5>
<ul>
    <li>Потрібно загрузити 1 - 2 - 11 - 13 сторінки паспорту</li>
    <li>сторінку Сімейний стан, діти</li>
    <li>Усі фото додаються разом!</li>
</div>

<div class="card-body">
<div class="form-group">
<div class="col-5">
{!! Form::label('pasport', 'Копія паспорта', ['class' => 'form-control']) !!}
<input id="pasport" type="file" name="pasport[]" multiple="true">

</div>
</div>
<div class="card-header">
        @if($get_pasport === Null)
            <p>будь ласка збережіть зображення</p>
        @else
         @foreach ($get_pasport as $user)
             <a href="/images/Foldername/pasport/{{$id_user}}/{{$user}}">
                <img 
                    style="width: 100px; height: 100px" 
                     src="/images/Foldername/pasport/{{$id_user}}/{{$user}}"

                 alt="{{$user}}">
            </a>
         @endforeach 
         @endif
    </div>
</div>

<hr>
<div class="card-header">
<h5>Данні про диплом</h5>
<ul>
    <li>Потрібно загрузити 1 та 2 сторінки диплому</li>
    <li>При необхідності загрузити інші додатки разом с дипломом</li>
</div>

<div class="card-body">
  <div class="form-group">
    <div class="col-9">
    
 {!! Form::label('diplom', 'Копія диплома про вищу освіту', ['class' => 'form-control'])!!}
  <input id="diplom" type="file" name="diplom[]" multiple="multiple">
</div>
    </div>
    <div class="card-header">
        @if($get_diplom === Null)
            <p>будь ласка збережіть зображення</p>
        @else
         @foreach ($get_diplom as $user)
             <a href="/images/Foldername/diplom/{{$id_user}}/{{$user}}">
                <img 
                    style="width: 100px; height: 100px" 
                     src="/images/Foldername/diplom/{{$id_user}}/{{$user}}"

                 alt="{{$user}}">
            </a>
         @endforeach 
         @endif
    </div>
        </div>
                    
<hr>
<div class="card-header">
<h5>Данні про ідентифікаційний код</h5>
<ul>
    <li>Потрібно загрузити 1 сторінку</li>

</ul>
</div>
     <div class="card-body">
         <div class="form-group">
             <div class="col-12">
     {!! Form::label('ident_code', 'Копія ідентифікаційного коду платника податків',['class' => 'form-control']) !!}
     <input id="ident_code" type="file" name="ident_code[]" multiple="true">
    </div>
      </div>
       <div class="card-header">
        @if($get_ident_code === Null)
            <p>будь ласка збережіть зображення</p>
        @else
         @foreach ($get_ident_code as $user)
             <a href="/images/Foldername/ident_code/{{$id_user}}/{{$user}}">
                <img 
                    style="width: 100px; height: 100px" 
                     src="/images/Foldername/ident_code/{{$id_user}}/{{$user}}"

                 alt="{{$user}}">
            </a>
         @endforeach 
         @endif
    </div>
        </div>
<hr>
<div class="card-header">
<h5>Данні про диплом</h5>
<ul>
    <li>Потрібно загрузити Копію додатку до диплому з прорахованим середнім балом за навчання у ВУЗі</li>
</ul>
</div>
     <div class="card-body">
         <div class="form-group">
            <div class="col-8">

     {!! Form::label('diplom_compl', 'Копія додатку до диплому', ['class' => 'form-control']) !!}
     <input id="diplom_compl" type="file" name="diplom_compl[]" multiple="true">
                 </div>
             </div>
             <div class="card-header">
        @if($get_diplom_compl === Null)
            <p>будь ласка збережіть зображення</p>
        @else
         @foreach ($get_diplom_compl as $user)
             <a href="/images/Foldername/diplom_compl/{{$id_user}}/{{$user}}">
                <img 
                    style="width: 100px; height: 100px" 
                     src="/images/Foldername/diplom_compl/{{$id_user}}/{{$user}}"

                 alt="{{$user}}">
            </a>
         @endforeach 
         @endif
    </div>
         </div>
 <hr>
 <div class="card-header">
<h5>Данні про сертифікати</h5>
<ul>
    <li>Потрібно загрузити сертифікати Крок-1 та Крок-2 с обох сторін</li>
    <li>Необхідно загрузити одразу усі фото!</li>
</ul>
</div>   
     <div class="card-body">
         <div class="form-group">
             <div class="col-10">

     {!! Form::label('certificate', 'Копії сертифікатів ліцензійного іспиту', ['class' => 'form-control']) !!}
     <input id="certificate" type="file" name="certificate[]" multiple="true">
                 </div>
             </div>
              <div class="card-header">
        @if($get_certificate === Null)
            <p>будь ласка збережіть зображення</p>
        @else
         @foreach ($get_certificate as $user)
             <a href="/images/Foldername/certificate/{{$id_user}}/{{$user}}">
                <img 
                    style="width: 100px; height: 100px" 
                     src="/images/Foldername/certificate/{{$id_user}}/{{$user}}"

                 alt="{{$user}}">
            </a>
         @endforeach 
         @endif
    </div>
         </div>
 
<hr>
 <div class="card-header">
<h5>Данні про сан.книгу</h5>
<ul>
        <li>Потрібно загрузити Копію сан. книжки з результатамими обстеження або довідку санепідемстанції з результатами бак. посіву та обслідуванн органів грудної клітини (ФЛГ)</li>
       <li>Необхідно загрузити одразу усі фото!</li>
 </ul>
</div>
   
             <div class="card-body">
         <div class="form-group">
             <div class="col-12">

     {!! Form::label('health_book', 'Копія сан. книжки або довідка санепідемстанції ', ['class' => 'form-control'] ) !!}
     <input id="doc" type="file" name="health_book[]" multiple="true">
                 </div>
             </div>
              <div class="card-header">
        @if($get_health_book === Null)
            <p>будь ласка збережіть зображення</p>
        @else
         @foreach ($get_health_book as $user)
             <a href="/images/Foldername/health_book/{{$id_user}}/{{$user}}">
                <img 
                    style="width: 100px; height: 100px" 
                     src="/images/Foldername/health_book/{{$id_user}}/{{$user}}"
                             alt="{{$user}}">
            </a>
         @endforeach 
         @endif
    </div>
         </div>
<hr>
 <div class="card-header">
<h5>Данні про фото</h5>
<ul>
    <li>Необхідно загрузити свое фото!</li>
    <li>Необхідно загрузити одразу усі фото!</li>
</ul>
</div>   

    <div class="card-body">
         <div class="form-group">
             <div class="col-9">
  {!! Form::label('foto', 'Фотокартка інтерна', ['class' => 'form-control'] ) !!}
     <input id="foto" type="file" name="foto[]" multiple="true">
                 <!-- /.card-body -->
                 </div>
             </div>
               <div class="card-header">
        @if($get_foto === Null)
            <p>будь ласка збережіть зображення</p>
        @else
         @foreach ($get_foto as $user)
             <a href="/images/Foldername/foto/{{$id_user}}/{{$user}}">
                <img 
                    style="width: 100px; height: 100px" 
                     src="/images/Foldername/foto/{{$id_user}}/{{$user}}"

                 alt="{{$user}}">
            </a>
         @endforeach 
         @endif
    </div>
         </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Зберегти">
            </div>
            </ul>
        </form>
    </div>
    @endif
    <!-- /.card -->


                




@endsection
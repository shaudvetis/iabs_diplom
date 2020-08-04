@extends ('layouts.baseteacher')

@section('content')
@include('layouts.instruction.kerivnuk.foto')
<a class="btn btn-tool"  style="float: right;" href=" {{back()->getTargetUrl()}}">Назад</a>
<h5>Паспортні данні </h5>

<div class="card-header">
    <ul>
    <li>Потрібно загрузити 1 - 2 - 11 - 13 сторінки паспорту</li>
    <li>сторінку Сімейний стан, діти</li>
</ul>
        @if($get_pasport === Null)
            <p>Фото не загружено інтерном</p>
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
<hr>
<div class="card-header">
<h5>Данні про диплом</h5>

<ul>
    <li>Потрібно загрузити 1 та 2 сторінки диплому про вищу освіту</li>

 @if($get_diplom === Null)
            <p>Фото не загружено інтерном</p>
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
<hr>
<div class="card-header">
<h5>Данні про ідентифікаційний код</h5>
<ul>
    <li>Потрібно загрузити 1 сторінку</li>

</ul>
        @if($get_ident_code === Null)
            <p>Фото не загружено інтерном</p>
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
<hr>
<div class="card-header">
<h5>Данні про диплом</h5>
<ul>
    <li>Потрібно загрузити Копію додатку до диплому з прорахованим середнім балом за навчання у ВУЗі</li>
</ul>

        @if($get_diplom_compl === Null)
            <p>Фото не загружено інтерном</p>
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
               
<hr>
 <div class="card-header">
<h5>Данні про сертифікати</h5>
<ul>
    <li>Потрібно загрузити сертифікати Крок-1 та Крок-2 с обох сторін</li>
</ul>
        @if($get_certificate === Null)
            <p>Фото не загружено інтерном</p>
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
<hr>
 <div class="card-header">
<h5>Данні про сан.книгу</h5>
<ul>
        <li>Потрібно загрузити Копію сан. книжки з результатамими обстеження або довідку санепідемстанції з результатами бак. посіву та обслідуванн органів грудної клітини (ФЛГ)</li>
       
 </ul>
</div>
   
        @if($get_health_book === Null)
            <p>Фото не загружено інтерном</p>
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

<hr>
 <div class="card-header">
<h5>Данні про фото</h5>
        @if($get_foto === Null)
            <p>Фото не загружено інтерном</p>
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



    <!-- /.card -->


                




@endsection
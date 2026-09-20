@extends('layouts.base')

@section('content')
<style>
  a.text {
  text-decoration: none;
  color: #666;
}
</style>
@include('layouts.instruction.intern.student')

<!-- Вывод ввода атестата фото личных данных -->
 <div class="row mb-2">
  <div class="textp_ukr self breadcrumb float-sm-right" style="background-color: #8B008B;color: white;">
   Особиста інформація
  </div>

<!-- Див для новостей -->
<!--   <div class="textp_ukr breadcrumb float-sm-right" style="background-color:olive;color: white;">
 <a href="{{asset('/storage/лекции интерні 1 года 2021 бюдж.pdf')}}" style="
 color:white" target="_blank">Розклад онлайн лекцій 1 курс</a>
  </div> -->

  <div class="col selfview" style="display: none;">
   <button type="button" class="btn btn-tool closeself float-sm-right" data-widget="remove"><i class="fas fa-remove"></i></button>
    <ol class="breadcrumb float-sm-right" style="background-color: #8B008B;color: white">
     <li class="breadcrumb-item textp_ukr ">
      <a href="{{asset('user_profile_edit')}}" type="button" style="color: white;"  title="Докладніший опис всередині">Особисті дані</a>
     </li>
     <li class="breadcrumb-item textp_ukr ">
     <a  href="{{asset('download_profile')}}" type="button" style="color: white"  title="Докладніший опис всередині">Завантаження фото</a></li>
     <li class="breadcrumb-item textp_ukr "><a href="{{asset('atestat_profile')}}" type="button" style="color: white" title="Докладніший опис всередині">Додатки</a></li>
    </ol>
  </div>
 </div>
<!-- Конец формы вывода атестата -->

<!-- Начало страницы, заголовок -->
<div style="background-image: url(images/static_gradient_4.jpg);" >
 <h3 class="texthead_ukr pt-4 pb-4"><center>Швидкий доступ до щоденника інтерна </center></h3>
</div>
<!-- Main content -->

<div class="row" style="background-color: #FAFAD2;">
  <a href="{{route('inputformsday')}}" class="text mt-3">  
    <div class="btn-sm ml-3" style="width: 200px">
      <div class="small-box bg-info">
        <div class="inner" style="height:90px">
         <h6 class="texthead_ukr">Курація хворих</h6>
        </div>
          <div class="icon">
           <i class="fas fa-user-nurse"></i>
          </div>
          <a class="texthead_ukr mb-2 "  href="{{asset('archive_inputday')}}">Архів</a>
      </div>
    </div>
  </a>
   <!-- small box -->
    <a href="{{asset('nightworkday')}}" class="text">  
      <div class="btn-sm" style="width: 200px">
        <div class="small-box bg-warning">
          <div class="inner" style="height:90px">
            <h6>Нічні чергування</h6>
          </div>
          </div>
        </div>
      </a>
  <!-- small box -->
  <a href="{{asset('formspracticeday')}}" class="text">
    <div class="btn-sm" style="width: 200px">
      <div class="small-box bg-success">
        <div class="inner" style="height:90px">
          <h6>Засвоєні навички</h6>
        </div>
       </div>
    </div>
  </a>

  <!-- small box -->
  <a href="{{asset('intern.read_literatyre')}}" class="text">
   <div class="btn-sm" style="width: 200px">
    <div class="small-box bg-dark">
     <div class="inner" style="height:90px">
      <h6>Засвоєна література</h6>
     </div>
    </div>
   </div>
  </a>
<!-- small box -->
  <a href="{{asset('formssurgeryday')}}" class="text">
   <div class="btn-sm" style="width: 200px">
    <div class="small-box bg-purple" >
     <div class="inner" style="height: 90px">
      <h6>Контроль учбових елементів та модулів</h6>
     </div>
    </div>
   </div>
  </a>
 <!-- small box -->
 <a href="{{asset('view_rozklad')}}" class="text">
  <div class="btn-sm" style="width: 200px">
   <div class="small-box bg-danger">
    <div class="inner" style="height: 90px">
     <h6>Розклад</h6>
      <p>Очна частина</p>
    </div>
     </div>
    </div>
  </a>

    <a href="{{route('pass-nb')}}" class="text">
    <div class="btn-sm" style="width: 200px;">
     <div class="small-box bg-pink">
     <!--  Блок задает вісоту самого квадратика -->
       <div class="inner" style="height: 90px">
          <h6>Звітність по Н\Б </h6>
               <!--  <p>Очна частина</p> -->
             </div>
            </div>
          </div>
          </a>   

<a href="{{route('cherguvannya.create')}}" class="text">
    <div class="btn-sm" style="width: 200px;">
     <div class="small-box bg-orange">
     <!--  Блок задает вісоту самого квадратика -->
       <div class="inner" style="height: 90px">
          <h6>Графік чергувань </h6>
               <!--  <p>Очна частина</p> -->
             </div>
            </div>
          </div>
          </a>  
  <a href="{{route('rozkladzaochno')}}" class="text">
    <div class="btn-sm" style="width: 200px;">
     <div class="small-box bg-primary">
     <!--  Блок задает вісоту самого квадратика -->
       <div class="inner" style="height: 90px">
          <h6>Розклад</h6>
                <p>Заочна частина</p>
             </div>
            </div>
          </div>
          </a>   

      </div>


@endsection  




@section('js')
<script>

$(document).ready(function(){
// При выборе сопа отобразить все вопросы
 $('.self').click(function(){
//alert($('.num_audit option:selected').attr('data'));
$('.selfview').css('display', 'block'); 
 });
 
 $('.closeself').click(function(){
//alert($('.num_audit option:selected').attr('data'));
$('.selfview').css('display', 'none'); 
 })


});
</script>

@endsection  


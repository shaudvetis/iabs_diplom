@extends ('admink.layouts.app_admink')
@include('layouts.instruction.vukladach.dusboard')
@section ('content')
<style type="text/css">
  
a.text {
  text-decoration: none;
  color: #666;
}
</style>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Звіт очників</a>
  </li>
  <li class="nav-item dropdown">
   <!--  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Звіт заочників</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/admink/course/1">Перший курс</a>
      <a class="dropdown-item" href="/admink/course/2">Другий курс</a>
      <a class="dropdown-item" href="/admink/course/3">Третій курс</a>
      <div class="dropdown-divider"></div>
      </div> -->
  </li>
  </ul>
    <div class="row">
            <!-- small box -->
          <a href="{{asset('admink.kyraciya.cherevna')}}" class="text">
           <div class="btn-sm" style="width: 200px;">
            <div class="small-box bg-warning">
              <div class="inner" style="height:90px">
                <h6 style="color: white">Звіти курацій</h6>
                <p style="color: white">Очна\Заочна частина</p>
               </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
             </div>
           </div>
      </a>

    <a href="{{asset('admink.kyraciya.nightpracticeday')}}" class="text">
    <div class="btn-sm" style="width: 200px">
            <!-- small box -->
           <div class="small-box bg-dark">
              <div class="inner" style="height: 90px">
                <h6>Нічні чергування</h6>
                <p>Очна\Заочна частина</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-alt"></i>
              </div>
            </div>
           </div>
        </a>
      <!-- small box -->
      <a href="{{asset('test')}}" class="text">
          <div class="btn-sm" style="width: 200px;">
            <div class="small-box bg-orange">
              <div class="inner" style="height: 90px">
                <h6 style="color: white">Тестування</h6>
                <!-- <p>Очна частина</p> -->
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
              </div>
            </div>
          </div>
         </a>

     <a href="{{asset('kroksurgery')}}" class="text">
    <div class="btn-sm" style="width: 200px;">
     <div class="small-box bg-success">
     <!--  Блок задает вісоту самого квадратика -->
       <div class="inner" style="height: 90px">
          <h6>Підготовка до іспиту «Крок-3» </h6>
               <!--  <p>Очна частина</p> -->
             </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
               <!--  <i class="fas fa-arrow-circle-right"></strong></i> -->
            </div>
          </div>
          </a>

    <a href="{{asset('last_online')}}" class="text">
    <div class="btn-sm" style="width: 200px;">
     <div class="small-box bg-info">
     <!--  Блок задает вісоту самого квадратика -->
       <div class="inner" style="height: 90px">
          <h6>Присутність на сайті</h6>
               <!--  <p>Очна частина</p> -->
             </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
               <!--  <i class="fas fa-arrow-circle-right"></strong></i> -->
            </div>
          </div>
          </a>       

       </div>
   </div>

     
       


@endsection
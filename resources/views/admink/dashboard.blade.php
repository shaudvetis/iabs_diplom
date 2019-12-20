@extends ('admink.layouts.app_admink')

@section ('content')

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Звіт заочників</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Звіт очників</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/admink/course/1">Перший курс</a>
      <a class="dropdown-item" href="/admink/course/2">Другий курс</a>
      <a class="dropdown-item" href="/admink/course/3">Третій курс</a>
      <div class="dropdown-divider"></div>
      </div>
  </li>
  </ul>


    <div class="row">
           <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h6>Введення в хірургію</h6>

                <p>Очна частина</p>
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
              </div>
              <a href="{{asset('admink.ball_starts')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
  </div>
          </div> 

          <!-- small box -->
             <div class="btn-sm" style="width: 200px;height:100px">
            <div class="small-box bg-warning">
              <div class="inner">
                <h6>Черевна порожнина</h6>

                <p>Очна частина</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{asset('nightworkday')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
            </div>
    </div>
          <!-- ./col -->
        
            <!-- small box -->
             <div class="btn-sm" style="width: 200px">
            <div class="small-box bg-danger">
              <div class="inner">
                <h6>Грудна клітина</h6>

                <p>Очна частина</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-circle-right"></i>
              </div>
              <a href="{{asset('formssurgeryday')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
         </div>
          </div>

          <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h6>Проктологія</h6>

                <p>Очна частина</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{asset('formspracticeday')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
            </div>
          </div>

           <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h6>Засвоєна література</h6>

                <p>Урологія</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-alt"></i>
              </div>
              <a href="{{asset('intern.read_literatyre')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
            </div>
           </div>
    <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h6>Судинна хірургія</h6>

                <p>Очна частина</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-alt"></i>
              </div>
              <a href="#" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
            </div>
           </div>
       </div>
   </div>

     
       


@endsection
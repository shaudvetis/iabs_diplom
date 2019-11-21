@extends('layouts.base')

@section('content')

<div class="content-header">
 <div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0 text-dark">
Швидкий доступ до щоденника інтерна</h4>
	        </div>
	    <div class="col-sm-6">
		 <ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item">
@if($check === "true") 
<a  href="{{asset('user_profile')}}">Особисті данні</a>
 @endif
       @if($check === "false")
<a href="{{asset('user_profile_edit')}}">Особисті данні</a>
      @endif
</li>

<li class="breadcrumb-item">
	<a  href="{{asset('download_profile')}}">Загрузка фото</a></li>

<li class="breadcrumb-item active">	 <a href="{{asset('atestat_profile')}}">Додатки</a></li>
</ol>
   </div>
</div>
</div>

 
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Очна частина</a>
   

 <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Заочна частина</a>
</div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
	
    <!-- Main content -->
  
        <!-- Small boxes (Stat box) -->
        <div class="row">
           <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h6>Курація хворих</h6>

                <p>Очна частина</p>
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
              </div>
              <a href="{{asset('inputformsday')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
  </div>
          </div> 
         
            <!-- small box -->
             <div class="btn-sm" style="width: 200px;height:100px">
            <div class="small-box bg-warning">
              <div class="inner">
                <h6>Нічні чергування</h6>

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
                <h6>Участь в операціях</h6>

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
                <h6>Засвоєні навички</h6>

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

                <p>Очна частина</p>
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
                <h6>Контроль учбових єлементів та модулів</h6>

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

     <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
 <!-- Small boxes (Stat box) -->
        <div class="row">
           <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h6>Курація хворих</h6>

                <p>Заочна частина</p>
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
              </div>
              <a href="{{asset('inputforms')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
  </div>
          </div> 
         
            <!-- small box -->
             <div class="btn-sm" style="width: 200px">
            <div class="small-box bg-warning">
              <div class="inner">
                <h6>Нічні чергування</h6>

                <p>Заочна частина</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{asset('nightwork')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
            </div>
    </div>
          <!-- ./col -->
        
            <!-- small box -->
             <div class="btn-sm" style="width: 200px">
            <div class="small-box bg-danger">
              <div class="inner">
                <h6>Участь в операціях</h6>

                <p>Заочна частина</p>
              </div>
              <div class="icon">
               <i class="fas fa-arrow-circle-right"></i>
              </div>
              <a href="{{asset('formssurgery')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
         </div>
          </div>

          <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h6>Засвоєні навички</h6>

                <p>Заочна частина</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{asset('formspractice')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
            </div>
          </div>

           <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h6>Засвоєна література</h6>

                <p>Заочна частина</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-alt"></i>
              </div>
              <a href="{{asset('intern.read_literatyre')}}" class="small-box-footer"><strong>Детальніше <i class="fas fa-arrow-circle-right"></strong></i></a>
            </div>
           </div>
       </div>
   </div>

  
            <!-- /.card -->
@endsection  


           

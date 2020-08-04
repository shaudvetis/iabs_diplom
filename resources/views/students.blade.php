@extends('layouts.base')

@section('content')
<style>
  a.text {
  text-decoration: none;
  color: #666;
}
</style>
@include('layouts.instruction.intern.student')

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
<a  href="{{asset('user_profile')}}" type="button"  data-toggle="tooltip" data-placement="top" title="Докладний опис всередині">Особисті дані</a>
 @endif
       @if($check === "false")
<a href="{{asset('user_profile_edit')}}" type="button"  data-toggle="tooltip" data-placement="top" title="Докладніший опис всередині">Особисті дані</a>
      @endif
</li>

<li class="breadcrumb-item">
	<a  href="{{asset('download_profile')}}" type="button" data-toggle="tooltip" data-placement="top" title="Докладніший опис всередині">Завантаження фото</a></li>

<li class="breadcrumb-item active">	 <a href="{{asset('atestat_profile')}}" type="button" data-toggle="tooltip" data-placement="top" title="Докладніший опис всередині">Додатки</a></li>
</ol>
   </div>
</div>
</div>
   <!-- Main content -->
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <a href="{{asset('inputformsday')}}" class="text" data-toggle="tooltip" data-placement="top" title="Всередині опис роботи">
           <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner" style="height:90px">
                <h6>Курація хворих</h6>
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
             </div>
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
            <div class="icon">
              <i class="fas fa-user-plus"></i>
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
           <div class="icon">
            <i class="ion ion-stats-bars"></i>
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
       <div class="icon">
        <i class="far fa-calendar-alt"></i>
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
       <div class="icon">
        <i class="far fa-calendar-alt"></i>
       </div>
    </div>
   </div>
  </a>
 <!-- small box -->
 <a href="#" class="text">
  <div class="btn-sm" style="width: 200px">
   <div class="small-box bg-danger">
    <div class="inner" style="height: 90px">
     <h6>Розклад</h6>
      <p>Очна частина</p>
    </div>
      <div class="icon">
       <i class="fas fa-arrow-circle-right"></i>
      </div>
     </div>
    </div>
  </a>
         
@endsection  


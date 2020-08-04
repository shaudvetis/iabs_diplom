<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Особистий кабінет</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
  
     
<ul class="navbar-nav">  <!--Значек вверху панели скрытия -->
      <li class="nav-item"> 
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a> 
        <!--<h1 class="m-0 text-dark">Особистий кабінет лікаря інтерна </h1> -->
        

      </li>
</ul>
 @if(Auth::user()->role==4 )

<div class="brand-link" style="background:lightgreen" >Кабінет Керівника </div>

@endif  


 <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Справочник
<!-- {{ Auth::user()->name }} --> <span class="caret"></span></a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Вихід') }} </a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
 @csrf
 </form>
   </div>
    </li>
     </ul>
</nav>  <!-- имеет отношение к телу таблицы, сдвигается -->
 
   <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Серій цвет левое боковое меню -->
    
   <!--  <span class="brand-text font-weight-light"></span> -->
    
<div class="brand-link" style="height: 110px;">
   @if(Auth::user()->role==4 )
    <ul>
      <li> <a href="{{asset('admink.teacher.teacher')}}" style="color: white" ><i>Кабінет Керівника</i></a></li>
      <li>
        <a href="{{asset('students')}}" style="color: white" ><i>Кабінет Інтерна</i></a></li>
 
   
   <li><a href="{{asset('admink.dashboard')}}" style="color: white" ><i>Кабінет Викладача</i></a></li>
@else
     
@endif  
</ul>   
</div>
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user panel (optional) Левая панель, все данные вверх-->
    


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

<li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link  active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Картотека інтерна
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{asset('admink.onecourse')}}" class="nav-link">

                  <!--<a href="/admink/courseone" class="nav-link"> -->
                  <i class="far fa-circle nav-icon"></i>
                  <p>Перший курс</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{asset('admink.twocourse')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Другий курс</p>
                </a>
              </li>
                   
         <li class="nav-item">
                <a href="{{asset('admink.threecourse')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Третій курс</p>
                </a>
              </li>
            </ul> 
           
               <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link  active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Вхідний контроль
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{asset('admink.kerivnuk.input_control')}}" class="nav-link">

                  <!--<a href="/admink/courseone" class="nav-link"> -->
                  <i class="far fa-circle nav-icon"></i>
                  <p>Перший курс</p>
                </a>
              </li>
            </ul>
             <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active" data-toggle="control-sidebar" data-slide="false">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Загальні питання
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          <ul class="nav nav-treeview">
              
              <li class="nav-item ">
                <a href="{{asset('admink.kerivnuk.memoris')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Пам'ятка</p>
                </a>
              </li>
   <li class="nav-item">
                <a href="{{asset('admink.kerivnuk.navchalniy_plan')}}"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Навчальний план</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{asset('admink.kerivnuk.skills')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Практичні навички</p>
                </a>
              </li>
   
          <li class="nav-item">
                <a href="{{asset('admink.kerivnuk.operational')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Хірургічні навички</p>
                </a>
              </li>
    </ul>
          </li>
<li class="nav-item has-treeview menu-close" >
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt" ></i>
              <p>
               Розклад
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
<ul class="nav nav-treeview menu-open">
   <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Очна база</p>
                  <i class="right fas fa-angle-left"></i>
                </p>
                </a>

 <li class="nav-item menu-open">
   <a href="{{asset('admink.kerivnuk.skillsplan')}}" class="nav-link menu-open">
     <i class="far fa-circle nav-icon"></i>
                  <p>1 рік</p>
                </a>
              </li>
  <li class="nav-item">
                <a href="{{asset('rozklad')}}" class="nav-link"  data-toggle="tooltip" data-placement="top" title="Розділ в розробці">
                  <i class="far fa-circle nav-icon"></i>
                  <p>2 рік</p>
                </a>
              </li>
<li class="nav-item">
                <a href="#" class="nav-link" data-toggle="tooltip" data-placement="top" title="Розділ в розробці">
                  <i class="far fa-circle nav-icon"></i>
                  <p>3 рік</p>
                </a>
              </li>
              
            
<ul class="nav nav-treeview menu-open">
   <li class="nav-item">
                <a href="#" class="nav-link active" >
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Заочна база</p>
                  <i class="right fas fa-angle-left"></i>
                </p>
                </a>

 <li class="nav-item menu-open">
   <a href="#" class="nav-link menu-open" data-toggle="tooltip" data-placement="top" title="Розділ в розробці">
     <i class="far fa-circle nav-icon"></i>
                  <p>1 рік</p>
                </a>
              </li>
  <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="tooltip" data-placement="top" title="Розділ в розробці">
                  <i class="far fa-circle nav-icon"></i>
                  <p>2 рік</p>
                </a>
              </li>
<li class="nav-item">
                <a href="#" class="nav-link" data-toggle="tooltip" data-placement="top" title="Розділ в розробці">
                  <i class="far fa-circle nav-icon"></i>
                  <p>3 рік</p>
                </a>
              </li>
              </li>
            </ul>
</li>


            </ul>
<li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link  active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Довідник
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{asset('admink.onecourse')}}" class="nav-link">

                  <!--<a href="/admink/courseone" class="nav-link"> -->
                  <i class="far fa-circle nav-icon"></i>
                  <p>Назви семінарів</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{asset('admink.twocourse')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Назва тем семінарів</p>
                </a>
              </li>
                   
         <li class="nav-item">
                <a href="{{asset('admink.threecourse')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> </p>
                </a>
              </li>
            </ul> 

</ul>
            
   

          <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          


                 <!-- Календар     
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                -->    
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</ul>
</nav>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content">

    @section('content')

    @show


 </section>


</div>
<!-- ./wrapper -->
  <footer class="main-footer">
    
  </footer>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>

</body>
</html>

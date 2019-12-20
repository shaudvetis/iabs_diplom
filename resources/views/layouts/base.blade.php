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
   <link rel="stylesheet" href="{{ asset('dist/css/datatables.css')}}">
   </header>
 <body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
{{ Auth::user()->name }} <span class="caret"></span></a>
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
  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!--  <div class="user-panel mt-3 pb-3 mb-3 d-flex"> </div> -->
        <a href="{{asset('students')}}" class="brand-link"><i>На головну!</i></a>
      

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu">
            <a href="#" class="nav-link active" data-toggle="control-sidebar" data-slide="false">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Загальні питання
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          <ul class="nav nav-treeview">
              
              <li class="nav-item ">
                <a href="{{asset('memoris')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Пам'ятка</p>
                </a>
              </li>
   <li class="nav-item">
                <a href="{{asset('navchalniy_plan')}}"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Навчальний план</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{asset('skills')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Практичні навички</p>
                </a>
              </li>
   
          <li class="nav-item">
                <a href="{{asset('operational')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Хірургічні навички</p>
                </a>
              </li>
    </ul>
          </li>

<li class="nav-item has-treeview menu" >
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt" ></i>
              <p>
               Очна частина
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
<ul class="nav nav-treeview">
 <li class="nav-item">
   <a href="{{asset('skillsplan')}}" class="nav-link">
     <i class="far fa-circle nav-icon"></i>
                  <p>Загальні положення</p>
                </a>
              </li>
  <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Вхідний контроль</p>
                </a>
              </li>
       <li class="nav-item">
                <a href="{{asset('lectures')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Лекції</p>
                </a>
              </li>
       

<li class="nav-item has-treeview menu">
                <a href="{{asset('formspracticeday')}}" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Хірургічні напрямки</p>
                  <i class="right fas fa-angle-left"></i>
                </p>
                </a>
<ul class="nav nav-treeview">
 <li class="nav-item">
   <a href="{{asset('napravlenia.startsurgery')}}" class="nav-link">
     <i class="far fa-circle nav-icon"></i>
                  <p>Введення в хірургію</p>
                </a>
              </li>
<li class="nav-item">
                <a href="{{asset('napravlenia.cherevnaocho')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Черевна порожнина </p>
                </a>
              </li>

 <li class="nav-item">
                <a href="{{asset('napravlenia.grudna_klituna')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Грудна клітина</p>
                </a>
              </li>
 <li class="nav-item">
                <a href="{{asset('napravlenia.proctologia')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Проктологія</p>
                </a>
              </li>
 <li class="nav-item">
                <a href="{{asset('napravlenia.urologia')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Урологія</p>
                </a>
              </li>
 <li class="nav-item">
                <a href="{{asset('napravlenia.vascular')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Судинна хірургія</p>
                </a>
              </li>
 <li class="nav-item">
                <a href="{{asset('napravlenia.gnoynaya')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Гнійна хірургія</p>
                </a>
              </li>              
  <li class="nav-item">
                <a href="{{asset('napravlenia.kardio')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Кардіохірургія</p>
                </a>
              </li>           
 <li class="nav-item">
                <a href="{{asset('napravlenia.opiku')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Опіки та відмороження</p>
                </a>
              </li>
</ul>
          <!-- <li class="nav-item">
                <a href="{{asset('inputformsday')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>

                  <p>Курація хворих </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{asset('formssurgeryday')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Участь в операціях </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{asset('formspracticeday')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Засвоєнні навички </p>
                </a>
              </li>
               -->
             <!--   <li class="nav-item">
                <a href="{{asset('nightworkday')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Нічні чергування </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('intern.read_literatyre')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Засвоєнна література</p>
                </a>
              </li> -->
            </ul>
          <!-- </li> -->

           <li class="nav-item has-treeview menu">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
             Заочна частина 
                <i class="fas fa-angle-left right"></i>
                 </p>
            </a>
     <ul class="nav nav-treeview">
<li class="nav-item">
                <a href="{{asset('memorisplan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Заочна частина</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="{{asset('topclasses')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Теми занять </p>
                </a>
              </li>
        <li class="nav-item has-treeview menu">
                <a href="{{asset('formspracticeday')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Хірургічні напрямки</p>
                  <i class="right fas fa-angle-left"></i>
                </p>
                </a>
<ul class="nav nav-treeview">
 <li class="nav-item">
   <a href="{{asset('skillsplan')}}" class="nav-link">
     <i class="far fa-circle nav-icon"></i>
                  <p>Введення в хірургію</p>
                </a>
              </li>
<li class="nav-item">
                <a href="{{asset('cherevnaocho')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Черевна порожнина </p>
                </a>
              </li>

 <li class="nav-item">
                <a href="{{asset('lectures')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Грудна клітина</p>
                </a>
              </li>
 <li class="nav-item">
                <a href="{{asset('lectures')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Проктологія</p>
                </a>
              </li>
 <li class="nav-item">
                <a href="{{asset('lectures')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Урологія</p>
                </a>
              </li>
 <li class="nav-item">
                <a href="{{asset('lectures')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Судинна хірургія</p>
                </a>
              </li>
 <li class="nav-item">
                <a href="{{asset('lectures')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Гнійна хірургія</p>
                </a>
              </li>              
  <li class="nav-item">
                <a href="{{asset('lectures')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Кардіохірургія</p>
                </a>
              </li>           
 <li class="nav-item">
                <a href="{{asset('lectures')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Опіки та відмороження</p>
                </a>
              </li>
<!-- 
                <li class="nav-item">
                <a href="{{asset('seminary')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Теми занять </p>
                </a>
              </li> -->
        
             <!--  <li class="nav-item">
                <a href="{{asset('inputforms')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>



                  <p>Курація хворих </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{asset('formssurgery')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Хірургічні втручання </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{asset('formspractice')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Практичні навички </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{asset('nightwork')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Нічні чергування </p>
                </a>
              </li> -->
                          
            </ul>
          </nav>


  
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
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

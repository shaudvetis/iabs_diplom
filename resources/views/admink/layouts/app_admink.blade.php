<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Особистий кабінет</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
  <!--Значек вверху панели скрытия -->    
  <ul class="navbar-nav">  
      <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a> 
      </li>
   <!-- Right navbar links -->
    @if(Auth::user()->role==4 or Auth::user()->role==2)
      <div class="brand-link" style="background:lightgreen;margin-top: 0px;" >Кабінет Викладача </div>
    @endif 
  </ul>
<!-- Support -->
<ul class="navbar-nav ml-auto">
   <li class="nav-item d-none d-sm-inline-block">
      <a href="#" type="button" class="nav-link"  data-toggle="modal" data-target="#feedbackFormModal">Support +38066 500 86 57
        <i class="fa fa-envelope-o"></i>
      </a>
    </li>
<!-- FIO and login -->
<li class="nav-item dropdown">
  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> {{ Auth::user()->name }} 
  <span class="caret"></span></a>
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
 <aside class="main-sidebar sidebar-dark-success elevation-4">
 <!-- Серій цвет левое боковое меню -->
  <div class="brand-link" style="height: 110px;">
    <ul>
    @if(Auth::user()->role==4 )
     <li>
      <a href="{{asset('admink.teacher.teacher')}}" style="color:white" ><i>Кабінет Керівника</i></a>
     </li>
     <li><a href="{{route('students')}}" style="color:white" ><i>Кабінет Інтерна</i></a>
     </li>
    @endif 
   
    @if(Auth::user()->role==4 or Auth::user()->role==2)
   <li><a href="{{asset('admink.dashboard')}}" style="color:white" ><i>Кабінет Викладача</i></a></li>
   @endif  
   </ul>
  </div>
   
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
   <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 <p>Хірургічні напрямки</p>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
     <li class="nav-item">
       @foreach ($direction_ocenki as $item)
                <a href="{{route('ocenki', [$item->id])}}" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:{{$item->name_color}}" ></i>
                  <p >{!!$item->direction!!}</p>
                 <!--  військово-медична підготовка -->
                </a>
        @endforeach
              </li>
</ul>          

          <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul  class=" nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <!-- /.sidebar-menu -->
    </ul>
  </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- <div class="content-header">  -->
       <section class="content">
     
    @section('content')

    @show


 </section>


</div>

<!-- Форма обратной связи в модальном окне -->
<div class="modal" id="feedbackFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="myModalLabel">Добрго здоров'я! Якщо у тебе виникли проблеми під час роботи на сайті, опиши докладно ситуацію, за бажанням можеш прикріпити скрін екрану. Вирішимо питання якомога швидше!</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
 
        <!-- Форма обратной связи -->
<form method="post" action="{{asset('students')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
          <!-- Сообщение пользователя -->
          <div class="form-group">
            <label for="message" class="control-label">Повідомлення</label>
            <textarea id="message" name="message" class="form-control" rows="3"   maxlength="500" required="required"></textarea>
            
          </div>
          <!-- Изображения -->
          <div class="form-group attachments">
            <div>При необхідності прикріпіть до повідомлення зображення (до 10мб<span class="countFiles"></span>):
            </div>
            <div class="mb-1 text-muted">
             </div>
               <div class="custom-file">
                <input type="file" name="attachment[]" class="custom-file-input" id="customFile1">
                <label class="custom-file-label" for="customFile1">Оберіть файл...</label>
               
              </div>
          </div>
         

         
          <!-- Кнопка для отправки формы -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
          <button type="submit" class="btn btn-primary float-right">Відправити</button>
        </form>
                
        <!-- Сообщение об успешной отправки формы -->
        <div class="alert alert-success form-success mb-0 d-none">Форма успешно отправлена. Нажмите на <a class="form-success-link" href="#">ссылку</a>, чтобы отправить ещё одно сообщение.</div>
      </div>
    </div>
  </div>
</div>
</form>

  <!-- ./wrapper -->
  <footer class="main-footer">
    
  </footer>


<!-- jQuery -->
<script src="{{ asset('js/jQuery-2.2.0.min.js')}}"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
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

    @yield('js')
</body>

</html>
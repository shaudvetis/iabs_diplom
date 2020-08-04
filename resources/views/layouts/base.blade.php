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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="/css/font-awesome.min.css">
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
@if(Auth::user()->role==4 )
<div class="brand-link" style="background:lightgreen;margin-top: 0px;" >Кабінет Інтерна </div>
@endif     
    </ul>
<!-- Right navbar links -->
 <!--    <ul class="navbar-nav ml-auto"> -->
      <!-- Messages Dropdown Menu
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item"> 
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Напишить відгук:
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>

                <form>
                 <input type='hidden' name='c' value='obr' />
                  <textarea name='content'cols='30' rows='10'></textarea><br>
                   <input type='submit' value='ОК' />
                </form>
            
              </div>
            </div>
    
          </a>
        </div>
      </li>
    </ul>
         -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


   <li class="nav-item d-none d-sm-inline-block">
        <a href="#" type="button" class="nav-link"  data-toggle="modal" data-target="#feedbackFormModal">Support
        <i class="fa fa-envelope-o"></i>
      </a>
      </li>


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
    @if(Auth::user()->role==4 )
   <div class="brand-link" style="height: 110px;">
    <ul>
       
   <li><a href="{{asset('admink.teacher.teacher')}}" style="color: white" ><i>Кабінет Керівника</i></a></li>
   <li><a href="{{asset('students')}}" style="color: white" ><i>Кабінет Інтерна</i></a></li>
       
   <li><a href="{{asset('admink.dashboard')}}" style="color: white" ><i>Кабінет Викладача</i></a></li>
   </div>
   </ul>   
@else
 <a href="{{asset('students')}}" style="color: white" ><i>Кабінет Інтерна!</i></a>
     
@endif  



    <!-- Sidebar -->
    <div class="sidebar" >
        <!-- Sidebar Menu -->
   
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
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

<li class="nav-item has-treeview menu-open" >
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt" ></i>
              <p>
               Розклад та лекції
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
                <a href="{{asset('enteronecourse')}}" class="nav-link">
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

           <!-- <li class="nav-item has-treeview menu">
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
                  <p>Загальні положення</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="{{asset('topclasses')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Теми занять </p>
                </a>
              </li> -->
  
<!-- 
                <li class="nav-item">
                <a href="{{asset('seminary')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Теми занять </p>
                </a>
              </li> -->
        
             
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

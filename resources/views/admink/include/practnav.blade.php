@extends ('admink.layouts.app_admink')

@section ('content')
<!-- Подключается настройка формы журнала -->
@include('admink.include.naprav_settings.ball_start_settings') 


<div class="card card-info ">
<div class="card-header">
<!-- Подключаются кнопки курсов и десятков -->
@include('admink.include.naprav_settings.course_select') 
 <div class="card-tools" >
  <!-- Если это не военная кафедра -->
  @if ($ids !=10 )

 <a href="{{route('practnavuchka', ['id'=>$ids])}}">
 Клінічне обстеження хворого  </a>
 

<p> <a href="{{route('control_modyl',['id'=>$ids])}}">Контроль модуля</a> <br>
<a href="{{route('practtema', ['id'=>$ids])}}">   Практичні навички  </a> </p>
  <!-- Если военная кафедра -->
  @else
   <a href="{{route('practnavuchka', ['id'=>$ids])}}">  Практичні навички  </a>
  @endif
 


 </div>
 </div>
</div>

@if(isset($pract))
 

<h4> <mark>  Перелік практичних навичок ! </mark> </h4>
<ul>
@foreach ($pract as $key => $value)

 <li> {{$value->pract_name }} </li>

@endforeach

</ul>


@endif

@endsection
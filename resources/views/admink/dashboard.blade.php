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

@endsection
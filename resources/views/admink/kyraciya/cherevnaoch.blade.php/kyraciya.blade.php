@extends ('admink.layouts.app_admink')

@section ('content')

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="{{route('allcherevna.create')}}" role="tab" aria-controls="nav-home" aria-selected="true">Участь в операціях</a>

    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Курація хворих</a>

    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

 

<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

<!-- Два дива держать выравнивание кнопок перечня курса закрываются в конце перечислений кнопок курса -->
<div class="card-body course">
 <div class="card-info course"> 

 @isset($_GET["a1"])
<table class="table-sm">
<tr>
@foreach($result2 as $user_inf)
@if($user_inf['decatki']==1 and $user_inf['course']==1)
@include('admink.include.napravlenia.inputformsday_table')
@endif
 @endforeach
 </tr>
</table>
@endisset


@isset($_GET["a2"])
<table class="table-sm">
<tr>
@foreach($result2 as $user_inf)
@if($user_inf['decatki']==2 and $user_inf['course']==1)
@include('admink.include.napravlenia.inputformsday_table')
@endif
 @endforeach
 </tr>
</table>
@endisset



</div>
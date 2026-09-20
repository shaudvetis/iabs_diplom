@extends('layouts.base')
@include('layouts.instruction.intern.memoris')
@section('content')
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class=" nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> ПАМ`ЯТКА</a>
    
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">ПОЛОЖЕННЯ</a>
   
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    {!! $content->value !!}
  </div>

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

    {!! $pamatka->value !!}



</div>

</div>










@endsection
@extends('layouts.base')
@include('layouts.instruction.intern.lectures')
@section('content')
<style>
	table {
    width: 100%;
   border: 1px solid #dee2e6;
  }
 th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  }
 td { border: 1px solid #dee2e6;
   } /**/
  thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
  }
</style>
  
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Очна частина</a>
    
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Заочна частина</a>
   
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<!-- Main content -->

       
  {!! $content->content!!} 
  

</div>



<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


{!! $contents->value !!}



</div>
  
</div>


@endsection

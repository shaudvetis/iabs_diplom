@extends('layouts.base')

@section('content')

<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">

      </div>
    </div>

    <!-- <h3>{!! $pageData->title !!}</h3> -->
    <div class="tooltip bs-tooltip-top" role="tooltip">

	

    {!! $pageData->content !!}


  </div>
</section>



@endsection  


           

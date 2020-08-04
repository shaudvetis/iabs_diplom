@extends('layouts.base')
@include('layouts.instruction.intern.navplan')
@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">

      </div>
    </div>

{!! $content->content !!}


@endsection
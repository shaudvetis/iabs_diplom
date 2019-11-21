@extends('layouts.base')

@section('content')

<form role="form" method="post" action="{{asset('formspracticeday')}}" >
  {{ csrf_field() }}

 @component('layouts.napravleniya')

    <div class="was-validated">
 @endcomponent

<h3>Облік роботи, яка виконувалась інтерном на заочному циклі</h3>
<p>
	
{!! Form::open(['url' => 'formspractice']) !!}
 
       <!-- SELECT2 EXAMPLE -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Засвоєні практичні навички</h3>

            <div class="card-tools">
              <a class="btn btn-tool" href="{{asset('archiv_practice')}}">Архив</a>
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-plus"></i></button>
         
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
             <div class="col-md-6">
                <div class="form-group">
  
  {!! Form::label('get_skills', 'Назва навички') !!}
                                 
 {!! Form::textarea('get_skills', null, ['class' => 'form-control select2']) !!}
                </div>
                <!-- /.form-group -->
                <div class="form-group">
{!! Form::label('sum_number', 'Кількість
') !!}
{!! Form::text('sum_number', null, ['class' => 'form-control select2']) !!}
               
  
                </div>
                   {!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
             {{ Form::close() }}  
 
@endsection

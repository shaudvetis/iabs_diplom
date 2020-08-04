@extends('layouts.base')

@section('content')

<h3>Облік роботи, яка виконувалась інтерном на заочному циклі</h3>
<p>
</p>

<form role="form" method="post" action="{{asset('formssurgery')}}" >
  {{ csrf_field() }}

 @component('layouts.napravleniya')

<div class="was-validated">
   @endcomponent

	  <!-- SELECT2 EXAMPLE -->
    
  <div class="card card-warning">
    <div class="card-header">
       <h3 class="card-title">Облік роботи</h3>
         <div class="card-tools">
           <a class="btn btn-tool" href="{{asset('archive_surgery')}}">Архив</a>
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-plus"></i></button>

         </div>
    </div>
          <!-- /.card-header -->
<div class="card-body">
   <div class="row">
     <div class="col-3">
       <label>Дата</label>
       <input type="date" class="form-control" name="apdate">
     </div>

<div class="col-4">         
{!! Form::label('num_card', '№ карти стац. хворого') !!}
                             
{!! Form::text('num_card', null, ['class' => 'form-control select2']) !!}
</div>


<div class="col-4">
<label>№ операції</label>
<input type="text" class="form-control" name="num_surgery">
</div>              
</div>
<!-- /.form-group -->

<label>Вид участі</label>
<select name="type_work" class="form-control select2" style="width: 100%;">
<option>Асистенція</option>
<option>Самостійно</option>
<option>Етапи операції</option>
</select>

<label>Види хірургічних втручань</label>
<textarea class="form-control" name="viewsurgery" rows="6"></textarea>

<!-- /.form-group -->

  
                   {!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                <!-- /.form-group -->
                </div>
  
   {{ Form::close() }}          

 
@endsection


         
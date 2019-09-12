@extends('layouts.base')

@section('content')

<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="{{asset('archive')}}">Архив</a>
  </li>
  </ul>
<h1>Облік роботи, яка виконувалась інтерном на заочному циклі</h1>
<p>
	{!! Form::open(['url' => 'formssurgery']) !!}
 
       <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
  <div class="card card-warning">

          <div class="card-header">
            <h3 class="card-title">Облік роботи</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">

{!! Form::label('num_card', '№ карти стац. хворого') !!}
                                
{!! Form::text('num_card', null, ['class' => 'form-control select2']) !!}
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                 {!! Form::label('viewsurgery', 'Види хірургічних втручань
') !!}
{!! Form::textarea('viewsurgery', null, ['class' => 'form-control select2']) !!}
                  
                   
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            
                <!-- /.form-group -->
                <div class="form-group">
                   {!! Form::label('type_work', 'Вид участі') !!}
                   <select name="type_work" class="form-control select2" style="width: 100%;">
                    <option>Асистенція</option>
                    <option>Самостійно</option>
                    <option>Етапи операції</option>
                    </select>
                </div>
                </div>
                   {!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
   {{ Form::close() }}          

 
@endsection


         
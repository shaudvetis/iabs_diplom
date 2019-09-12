@extends('layouts.base')

@section('content')
<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="{{asset('archive')}}">Архив</a>
  </li>
  </ul>

<h1>Облік роботи, яка виконувалась інтерном на заочному циклі</h1>
<p>
	
{!! Form::open(['url' => 'formspractice']) !!}
 
       <!-- SELECT2 EXAMPLE -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Засвоєні практичні навички</h3>

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
  
  {!! Form::label('get_skills', 'Назва навички') !!}
                                 
 {!! Form::textarea('get_skills', null, ['class' => 'form-control select2']) !!}
                </div>
                <!-- /.form-group -->
                <div class="form-group">
{!! Form::label('sum_number', 'Кількість
') !!}
{!! Form::text('sum_number', null, ['class' => 'form-control select2']) !!}
                  
                   
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              
                <!-- /.form-group -->
  
                </div>
                   {!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->

 </div>
        </div>
        <!-- /.card -->



         </div>
          <!-- /.card-body -->

 </div>
        </div>
        <!-- /.card -->
 {{ Form::close() }}  
 
@endsection

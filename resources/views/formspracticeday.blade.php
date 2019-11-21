@extends('layouts.base')

@section('content')

<h3>Облік роботи, яка виконувалась інтерном на очному циклі</h3>
<p>
</p>
<form role="form" method="post" action="{{asset('formspracticeday')}}" >
  {{ csrf_field() }}

 @component('layouts.napravleniya')

    <div class="was-validated">
 @endcomponent

      <!-- SELECT2 EXAMPLE -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Засвоєні практичні навички</h3>

            <div class="card-tools">
              <a class="btn btn-tool" href="{{asset('archiva_practiceday')}}">Архів</a>
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

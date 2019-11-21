@extends('layouts.base')

@section('content')

<form role="form" method="post" action="{{asset('intern.read_literatyre')}}" >
  {{ csrf_field() }}
 @component('layouts.napravleniya')

<div class="was-validated">
   @endcomponent
       <!-- SELECT2 EXAMPLE -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Засвоєнні теоретичні навички </h3>

            <div class="card-tools">
 <a class="btn btn-tool" href="{{asset('intern.archiv_literatyre')}}">Архів</a>
              
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">



<label>Список прочитаної літератури:</label>
<textarea class="form-control" name="literatyre" placeholder="Введіть автора, сторінку та тему з коротким описом"></textarea>
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
@extends('layouts.base')
@include('layouts.instruction.intern.literatyre')
@section('content')

<form role="form" method="post" action="{{asset('intern.read_literatyre')}}" >
  {{ csrf_field() }}

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
          <div class="row" >
           <label style="color:red;font-size: 23px">База навчання</label>
           </div>
            <div class="col-sm-6">
             <div class="was-validated">
              <div class="custom-control custom-radio">
               <input id="myRadioButton1" type="radio" required="" name="baza" value="очна" class="custom-control-input">
                <label class="custom-control-label" for="myRadioButton1" style="font-size: 18px;">Очна</label>
              </div>
              <div class="custom-control custom-radio">
               <input id="myRadioButton2" type="radio" name="baza" value="заочна" class="custom-control-input">
                <label class="custom-control-label" value="заочна" for="myRadioButton2" style="font-size: 18px">Заочна</label>
              </div>
             </div>
            </div>
            <p></p>
            @component('layouts.napravleniya')
           <div class="was-validated">
           @endcomponent      
           </div>
           <div class="row" style="margin-left: 5px;">
           <label>Список прочитаної літератури:</label>
           <textarea class="form-control" name="literatyre" placeholder="Введіть автора, сторінку та тему з коротким описом"></textarea>
           </div>
           <p></p>
         {!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                   {{ Form::close() }}  
 </div>
</div>

@endsection
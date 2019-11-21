@extends('layouts.base')

@section('content')


<form role="form" method="post" action="{{asset('inputforms')}}" >
      {{ csrf_field() }}

@component('layouts.napravleniya')

<div class="was-validated">
   @endcomponent

    <h3>Облік роботи, яка виконувалась інтерном на заочному циклі</h3>
    <p>
    </p>
 
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-danger">

    <div class="card-header">

            <h3 class="card-title">Курація хворих</h3>

            <div class="card-tools">
                <a class="nav-link active" href="{{asset('archive')}}">Архів</a>
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row"> 
            <div class="col-5">
   <label>ФІО хворого</label>
   <input type="text" class="form-control" name="fio">
            </div>

   <div class="col-4">
   <label>№ карти стац. хворого</label>
   <input type="text" class="form-control" name="num_card">
   </div>

    <div class="col-4">
    <label>Дата спостереження (початок курації)</label>
    <input type="date" class="form-control" name="apdate">
    </div>


 <div class="col-4">
 <label>Коментар</label>
 <select name="comm" class="form-control select2" style="width: 100%;">
 <option>-</option>
 <option>Продовжується</option>
 </select>
 </div>
<div class="col-4">
<label>Дата спостереження (кінець курації)</label>   
<input type="date" class="form-control" name="apdate_end">                           </div>
</div>

<div class="form-group">
<label>Діагноз</label>
<textarea class="form-control" name="diagnoses" rows="6"></textarea>
</div>



{!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                    {{ Form::close() }}


                </div>
            </div>
        </div>

                </form>

            @endsection






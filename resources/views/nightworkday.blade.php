@extends('layouts.base')

@section('content')

<h3>Облік роботи, яка виконувалась інтерном на очному циклі</h3>
<p>
</p>

    <form role="form" method="post" action="{{asset('nightworkday')}}" >
  {{ csrf_field() }}


    <!-- SELECT2 EXAMPLE -->

  <div class="card card-info">
   <div class="card-header">
     <h3 class="card-title">Інформація про нічні чергування у відділенні </h3>
       <div class="card-tools" >
        <a class="btn btn-tool" href="{{asset('archive_nightday')}}">Архів</a>
         <button type="button" class="btn btn-tool" data-widget="collapse" ><i class="fas fa-plus"></i></button>
       </div>
     </div>

 <!-- /.card-header -->
<div class="card-body"  style="display: none;">
  <div class="row">
    <div class="col-md-4">
      <label>ФІО хворого</label>
        <input type="text" required class="form-control" name="fio">
      
    </div>  
 <div class="col-md-4">
<label>№ карти стац.хворого</label>               
<input type="text" required class="form-control" name="num_card">
</div>
</div>
<p>
</p>
<div class="row">
  <div class="col-md-4">
   <label>Дата госпіталізації</label>
    <input type="date" name="date_arrival">
     </div>
 <div class="col-md-4">
   <label>Час госпіталізації</label>
    <input type="time" name="time_arrival">
     </div>

<div class="col-md-4">
   <label>Дата спостереження</label>
    <input type="date" name="apdate">
     </div>
</div>
<p>
</p>

<div class="form-group">
<label>Діагноз</label>
<textarea name="diagnoses"  class="form-control" ></textarea>

<label>Виконані маніпуляції</label>
<textarea name="work" class="form-control">
</textarea>               


<label>Участь у оперативних втручаннях</label>
<textarea name="practic" class="form-control" placeholder="якщо виконувалась у цього пацієнта">
</textarea>               


 <p> </p>
<label>Місце чергування</label>
<div class="col-md-6">
 <input type="text"  name="station" class="form-control" >
 </div>
</div>
          
                    {!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                    {{ Form::close() }}
               
            </div>
    </div>
  
       </form>
  
<form role="form" method="post" action="{{asset('nightpractic')}}" >
  {{ csrf_field() }}
<!-- SELECT2 EXAMPLE -->

  <div class="card card-info">
   <div class="card-header">
     <h3 class="card-title">Інформація про нічні чергування у приймальному відділенні 
- оглянуті хворі </h3>
       <div class="card-tools" >
        <a class="btn btn-tool" href="{{asset('archive_nightpractice')}}">Архів</a>
         <button type="button" class="btn btn-tool" data-widget="collapse" ><i class="fas fa-plus"></i></button>
       </div>
     </div>

 <!-- /.card-header -->
<div class="card-body"  style="display: none;">
  <div class="row">
    <div class="col-md-4">
      <label>ФІО хворого</label>
        <input type="text" class="form-control" name="fio">
       </div>  
 <div class="col-md-4">
<label>№ карти стац.хворого</label>               
<input type="text" class="form-control" name="num_card" placeholder="Або запис у журналі">
</div>
<div class="col-md-4">
   <label>Дата спостереження</label>
    <input type="date" class="form-control" name="apdate">
</div>
</div>
<p>
</p>

<div class="form-group">
<label>Диагноз</label>
<textarea name="diagnoses"  class="form-control" ></textarea>

<label>Що зроблено</label>
<textarea name="work" class="form-control">
</textarea>               


<label>Виконані маніпуляції та оперативні втручання ( ПХО)</label>
<textarea name="practic" class="form-control" placeholder="">
</textarea>               


 <p> </p>
<label>Місце чергування</label>
<div class="col-md-6">
 <input type="text"  name="station" class="form-control" >
 </div>
</div>
          
                    {!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                    {{ Form::close() }}
               
            </div>
            </div>

       </form>
            @endsection








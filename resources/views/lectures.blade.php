@extends('layouts.base')

@section('content')


    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="{{asset('archive')}}">Архив</a>
        </li>
    </ul>

    <h1>Облік роботи, яка виконувалась інтерном на очному циклі</h1>
    <p>
    </p>
    {!! Form::open(['url' => 'lectures']) !!}
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-primary">

        <div class="card-header">

            <h3 class="card-title">Лекції та семінари</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
         <div class="card-body">
            

            <div class="form-group">
                        {!! Form::label('apdate', 'Дата прослуховування') !!}
                        {!! Form::date('apdate', null, ['class' => 'col-4']) !!}
                    </div>
                   {!! Form::label('tema', 'Тема ') !!}
                        {!! Form::text('fio', null, ['class' => 'col-8 form-control-lg']) !!}
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('comment', 'Коментар') !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                    </div>

                                   
                    {!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
                    {{ Form::close() }}


                </div>

                </form>

            @endsection

            <!--
(count($errors) >0)

<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
                <li>{{$error}}</li>
    @endforeach






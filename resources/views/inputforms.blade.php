@extends('layouts.base')

@section('content')

    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="{{asset('archive')}}">Архив</a>
        </li>
    </ul>

    <h1>Облік роботи, яка виконувалась інтерном на заочному циклі</h1>
    <p>
    </p>
    {!! Form::open(['url' => 'inputforms']) !!}
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-danger">

        <div class="card-header">

            <h3 class="card-title">Курація хворих</h3>

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
                        {!! Form::text('num_card', null, ['class' => 'col-3']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('apdate', 'Дати спостереження (початок та кінець курації)
                       ') !!}
                        {!! Form::date('apdate', null, ['class' => 'col-4']) !!}
                    </div>

                    <div class="form-group">

                        {!! Form::label('diagnoses', 'Диагноз') !!}
                        {!! Form::textarea('diagnoses', null, ['class' => 'form-control']) !!}
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






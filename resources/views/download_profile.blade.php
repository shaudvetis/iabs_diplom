@extends('layouts.base')

@section('content')

    {!! Form::open(['url' => '/download_profile'], ['method'=>'POST'],['enctype' => 'multipart/form-data'], ['files'=>'true']) !!}

    {{csrf_field()}}

    <div class="form-group">
        <div class="col-7">

            {!! Form::label('pasport', 'Копія паспорта (1, 2 та 11 – 13 стор., сімейний стан, діти)') !!}
            {!! Form::file('pasport', null, ['class' => 'col-3']) !!}

        </div>
        <div class="form-group">
            <div class="col-7">


                {!! Form::label('diplom', 'Копія диплома про вищу освіту (обидві сторони)') !!}
                {!! Form::file('diplom', null, ['class' => 'col-3']) !!}
            </div>

            <div class="form-group">
                <div class="col-7">
                    {!! Form::label('ident_code', 'Копія ідентифікаційного коду платника податків') !!}
                    {!! Form::file('ident_code', null, ['class' => 'col-3']) !!}
                </div>
                <div class="form-group">
                    <div class="col-7">

                        {!! Form::label('diplom_compl', 'Копія додатку до диплому з прорахованим середнім балом за навчання у ВУЗі') !!}
                        {!! Form::file('diplom_compl', null, ['class' => 'col-3']) !!}
                    </div>

                    <div class="form-group">
                        <div class="col-7">

                            {!! Form::label('certificate', 'Копії сертифікатів ліцензійного іспиту „Крок -1” та „Крок – 2” (обидві сторони в кожному)') !!}
                            {!! Form::file('certificate', null, ['class' => 'col-3']) !!}
                        </div>

                        <div class="form-group">
                            <div class="col-7">


                                {!! Form::label('health_book', 'Копія санітарної книжки з результатами обстеження або довідка санепідемстанції з результатами бак. посіву та обстеження органів грудної клітини (ФЛГ)') !!}
                                {!! Form::file('health_book', null, ['class' => 'col-3']) !!}


                            </div>


                            <button type="submit" class="btn btn-warning">Зберегти</button>
                            </form>
                            @isset ($file)
                                <img class="img-fluid" src="{{ asset('/storage/' .$file) }}">

                            @endisset


                            <form role="form" enctype="multipart/form-data" method="post" action="{{route('download_profile')}}">
                                {{ csrf_field() }}
                                <input id="pasport" type="file" name="pasport">
                                <input id="doc" type="file" name="diplom">
                                <input id="doc" type="file" name="ident_code">
                                <input id="doc" type="file" name="diplom_compl">
                                <input id="doc" type="file" name="certificate">
                                <input id="doc" type="file" name="health_book">
                                <input id="doc" type="file" name="foto">
                                <input type="submit" class="btn btn-primary" value="Отправить">
                            </form>

@endsection
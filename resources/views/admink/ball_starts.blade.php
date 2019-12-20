@extends ('admink.layouts.app_admink')

@section ('content')


    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Контроль знань по семінару 1. Медична документація  </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body"  style="display: none;">

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-highlight">
                    <thead>
                    <th>#</th>
                    <th style="width: 200px">ФИО</th>
                    <th>Тема</th>
                    <th>Оцінка</th>

                    </thead>
                    <tbody>

                    <form role="form" method="post" action="{{asset('admink.ball_start')}}">
                        {{ csrf_field() }}

                        @foreach ($intern as $seminars)
                            <tr>
                                <td>{{ $seminars->id }}</td>
                                <td>
                                    <select  name="ima"  class="form-control">
                                        @foreach ($intern as $seminars)
                                            <option value="1" >{{ $seminars->surname }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select  name="direction"  class="form-control">
                                        @foreach ($seminarse as $seminars)
                                            <option value="0" >{{ $seminars->tema }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" name="ball[]" class="form-control"></td>
                            </tr>

                    @endforeach
                    </tbody>
                </table>
                <input type="submit" value="Відправити" name="sub">
            </div>
        </div>
    </div>

    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Контроль знань по семінару 2. Лапароскопічна мхірургія  </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body"  style="display: none;">

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-highlight">
                    <thead>

                    <th>ФИО</th>
                    <th>Тема</th>
                    <th>Оцінка</th>

                    </thead>
                    <tbody>

                    <form role="form" method="post" action="{{asset('admink.ball_start')}}">
                        {{ csrf_field() }}

                        @foreach ($intern as $seminars)
                            <tr>
                                <td name="dir">{!! $seminars->surname !!}</td>

                                <td>
                                    <select  name="direction"  class="form-control">
                                        @foreach ($seminar as $seminars)
                                            <option value="0" >{{ $seminars->tema }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" name="ball[]" class="form-control"></td>
                            </tr>
                    @endforeach

                    </tbody>
                </table>
                <input type="submit" value="Відправити" name="sub">
            </div>
        </div>
    </div>
@endsection
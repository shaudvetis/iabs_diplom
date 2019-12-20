@extends ('admink.layouts.app_admink')

@section ('content')
    <!-- Modal -->
    <h5 class="modal-title"> @foreach ($direction as $dir)
            {!! $dir->direction !!}
        @endforeach </h5>
    <div class="modal-body">
        <div class="card card-danger">
            <div class="card-header">
            </div>
            @foreach ($intern as $int)
                {{--                            <td>{!! $int->user_id !!}</td>--}}
                {{--                            <td>{!! $int->user_id !!}</td>--}}
            @endforeach
            <td>{!! $id_users!!}</td>

            Контроль знань по семінару 1. Mедична документація
            <h3 class="card-title"> </h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-highlight">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>

                        <form role="form" method="GET" action="{{asset('modal\create/?user_id='.$int->user_id)}}">
                    {{ csrf_field() }}
                    @foreach ($seminar as $seminars)
                        @if(stristr($seminars->tema, 'span') === FALSE)
                            <tr>
                            <tr>

                                <input type="hidden" name="user_id[]" value="{{$id_users}}">
                                <input type="hidden" name="id_seminarus[]" value="{{$dir->id}}">
                                <td><input type="text" name="element[]" class="form-control" value="{!! $seminars->element !!}"></td>

                                <td ><input type="hidden" name="tema[]" class="form-control" value="{!! $seminars->id !!}">{!! $seminars->tema !!}</td>
                                <td><input type="text" name="bal[]" value="{{$seminars->bal}}"></td>


                            </tr>
                        @else
                            <tr>

                                <td></td>
                                <td name="tema">{!! $seminars->tema !!}</td>
                                <td></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary" name="sub">Зберегти</button>
    </div>
    </div>
    </div>
    </div>
    </td>
    </form>

@endsection
@extends ('admink.layouts.app_admink')

@section ('content')

    <style>
        table {
            width: 100%;
            border: 1px solid #dee2e6;
        }
        .aside1{  /* селектор блока, который будет оставаться на месте */
            position: fixed;
            z-index: 1000;
            float:left; width: 600px;


        }
        th {
            border-radius: 0.25rem;
            border: 1px solid #dee2e6;
        }

        td {
            border: 1px solid #dee2e6;
        }

        thead {
            color: #495057;
            background-color: #e9ecef;
            border-color: #dee2e6;

        }
        .layer {
            overflow: scroll; /* Добавляем полосы прокрутки */
        }


    </style>


    <div class="card-info">
        <div class="card-header">
            <h5 class="card-title"> <h5>Журнал викладача. Модуль "Введення в хірургію" {!!$date!!} </h5>
        </div>

        <div class="card-body" >

            <div class="card card-info aside1" >
                <div class="card-header" >

                    <form action="" method="GET"   target="myIFR">
                        <input type="submit"   name="b1"  value="1 десяток"><a name="anchor">&nbsp;</a>

                        <input type="submit"  name="b2" value="2 десяток"  ><a name="anchor">&nbsp;</a>
                    </form>
                </div>

      @isset($_GET["b2"])
         <table class="table-sm" >
           <tr>
             <th style="height: 10px">ID</th>
            <th style="height: 3px">Призвище</th>
            <th style="height: 10px">Семнар1</th>
            <th style="height: 10px">Семнар2</th>
            <th style="height: 10px">Семнар3</th>
           </tr>
              @foreach($interns_id as $user_inf)
         <tr>
          <td >{!! $user_inf->id !!}</td>
   <td> <a href="{{asset('admink.ball_start/?user_id='.$user_inf->user_id)}}">{!! $user_inf->surname !!} {!! $user_inf->name !!}</a>
        </td>
        </tr>
             @endforeach
                   </table>
                       @endisset

@isset($_GET["b1"])
                     <table>
                            <tr>
                                <th style="height: 10px">ID</th>
                                <th style="height: 3px">Призвище</th>
                                <th style="height: 10px">Семнар1</th>
                                <th style="height: 10px">Семнар2</th>
                                <th style="height: 10px">Семнар3</th>
                            </tr>
                            @foreach($interns_id_2 as $user_inf)
                                <tr>
                                    <td >{!! $user_inf->id !!}</td>
                                    <td ><a href="{{asset('admink.ball_start/?user_id='.$user_inf->user_id)}}">{!! $user_inf->surname !!} {!! $user_inf->name !!}</a>
                                            </td>
                                   </tr>
                    @endforeach
                    </table>
                @endisset
            </div>
            </div>
    </div>
            <div  style='float:left; margin-top:280px'>
                <div style="margin-left: 0px!important;">
                    <!-- <div class="card-body>  -->
                    <div    class="modal-dialog modal-lg">
                        <div class="modal-content">


                            <ul class="nav nav-pills nav-fill">
                                <li class="nav-item">
                                    <h5><strong>Контроль знань по семінару "Mедична документація"</strong> </h5>
                                </li>
                                <li class="nav-item">
                                    <input class="btn-lg" type="text" value="@if(isset($get_names->surname)){{$get_names->surname}} {{$get_names->name}}@else{{$id_users}} @endif">
                                </li>


                            </ul>
                            <form role="form" method="post" action="{{asset('admink.ball_start')}}">
                                {{ csrf_field() }}


                                <div style='float:right;'>
                                    <div style='position: fixed;'>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="sub">Зберегти</button>
                                        </div>
                                    </div>
                                </div>

                                <table class="table-sm layer">
                                    @foreach($direction as $dir)
                                    @endforeach


                                    @foreach ($seminar as $seminars)
                                        @if(stristr($seminars->tema, 'span') === FALSE)


                                            <input type="hidden" name="user_id[]" value="{{$id_users}}">
                                            <input type="hidden" name="id_seminarus[]" value="{{$dir->id}}">
                                                <input type="hidden" name="id_seminar[]" value="{{$seminars->id_seminar}}">

                                            <td > <button type="button" class="btn-sm btn-primary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal{{ $seminars->id }}" data-whatever="@mdo"> {!! $seminars->element !!}<input type="hidden" name="element[]" value="{{$seminars->element}}"></button></td>
                                            <td scope="col" ><input type="hidden" name="tema[]" class="form-control" value="{!! $seminars->id !!}">{!! $seminars->tema !!}</td>
                                            <td scope="col"><input type="text" name="bal[]" size="3px"  value="{{$seminars->bal}}">
                                            <td style="width: 80px">
                                                <select name="lessons[]" >
                                                    <option></option>
                                                    <option>Запізнився</option>
                                                    <option>Н\Б</option>
                                                </select>
                                            </td>

                                                <td style="width: 80px">
                                                    <select name="morning[]" >
                                                        <option></option>
                                                        <option>Запізнився</option>
                                                        <option>Н\Б</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td ></td>
                                                <td  style="size: 80px" name="tema">{!! $seminars->tema !!}</td>
                                                <td  style="color: red" ><strong><center>Оцінка</strong></td>
                                                <td  style="color: red"><strong><center>Ранок</strong></td>
                                                <td  style="color: red"><strong><center>Семінар</strong></td>

                                            </tr>
                                        @endif


                                        <div class="modal fade" id="exampleModal{{ $seminars->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Питання</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <textarea rows="10" cols="60" type="text"  >{!! $seminars->pract_nav !!}</textarea>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Вихід</button>
                                                    </div>
                                                </div>
                                            </div>


                                            @endforeach
                                            </tbody>
                                </table>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="sub">Зберегти</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

<script>

</script>
@endsection




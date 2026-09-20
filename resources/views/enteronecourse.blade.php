@extends('layouts.base')
@include('layouts.instruction.intern.enter')
@section('content')
<style> 
  table {
    width: 100%;
   border: 1px solid #dee2e6;
   text-align: center;
   
  }
  
  th {
  border-radius: 0.25rem;
   border: 1px solid #dee2e6;

  }
 
   td { border: 1px solid #dee2e6;
   } /**/
  thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
  }
  .layer {
    overflow: scroll; /* Добавляем полосы прокрутки */
     }
</style>
<table class="table">
<tr>
  
    <th>ФІО інтерна</th>
    <th>Оцінка знань 3\4\5\6 курс</th>
    <th>% Вхідний контроль</th>
</tr>
<tr>

  @foreach($input_control as $control)
  
    <td>{!!$control->surname!!} {!!$control->name!!}</td>
    <td>{!!$control->course3!!}/{!!$control->course4!!}/{!!$control->course5!!}/{!!$control->course6!!}</td>
    <td>{!!$control->bal1!!}</td>
</tr>

@endforeach
</table>

@endsection



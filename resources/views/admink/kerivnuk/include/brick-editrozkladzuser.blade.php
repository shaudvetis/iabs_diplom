@extends('layouts.baseteacher')
@section('content')

@if(isset($intern))

<div class="card card-body">

	 <form role="form" method="post"  action="{{route('rozkladzp')}}">
               {{ csrf_field() }} 
<table class="table table-reaponsive" style="width:100%;overflow: scroll;">

   <tr>
     <th>База</th>
     <th>Отделения</th>
     <th>Интерн</th>
     <th>Месяц</th>

   </tr>

@foreach($intern as $item)
  <tr>
    <td><input type="hidden" name="baza" value="{{$item->bazainternatyr_id}}"> {{$item->name_baza}} </td>
    <td> {{$item->name_otdeleniya}} </td>
    <td> {{$item->surname}} {{$item->name}} \  курс {{$item->course}} </td>
    <td><input type="date" name="month" class="form-control" value="{{$item->dates}}"></td>
    <input type="hidden" name="id" value="{{$item->id}}">
  </tr>

@endforeach

 </table>
<button class="btn btn-info" type="submit" name="name" value="editrozklad">Записати</button>
 </form>
</div>

 @endif




@endsection





@if(isset($intern))

<table class="table table-reaponsive" style="width:100%;overflow: scroll;">
   <tr>
     <th>База</th>
     <th>Отделения</th>
     <th>Интерн</th>
     <th>Месяц</th>
     <th>Коригувати</th>
     <th>Видалити</th>
   </tr>

@php $m1='';  @endphp

@foreach($intern as $item)
  <tr>
    <td>{{$item->namebaza}} </td>
    <td>{{$item->nameotdeleniya}}</td>
    <td>{{$item->surname}} {{$item->name}}\ курс - {{$item->course}}</td>
    <td>{{$item->name_month}}\{{\Carbon\Carbon::parse($item->dates)->format('Y')}}</td>
   
    <td><a href="{{route('editrozkladz',$item->id)}}"> <i class="fa fa-edit" aria-hidden="true"></i></a>
    <!-- Modal -->
 </td>

   <td> <a class="btn btn-danger listbuttonremove" type="button" id="{{$item->id}}" 
 ><i class="fa fa-trash" aria-hidden="true"></i>{{$item->id}} </a> </td>
   </tr>
   @php $m1=$item->namebaza;  @endphp
@endforeach
 </table>

 
 @endif

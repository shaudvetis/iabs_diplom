 
@if(isset($internlist))
 <table class="table table-reaponsive" style="width:100%;overflow: scroll;">
   <tr>
     <th>База</th>
     <th>Отделения</th>
     <th>Интерн</th>
     <th>Дата</th>
     <th>Месяц</th>
   </tr>

@php $m1='';  @endphp

@foreach($internlist as $item)
   <tr>
    @if($item->namebaza == $m1)
    <td></td>
    @else
     <td> {{$item->namebaza}}
    </td>
    @endif
     <td>{{$item->nameotdeleniya}}</td>
     <td title="{{$item->user}}" >{{$item->surname}}\{{$item->course}}</td>
     <td>{{\Carbon\Carbon::parse($item->dates)->format('d-m-Y')}}</td>
     <td>{{$item->name_month}}</td>
   </tr>
   @php $m1=$item->namebaza;  @endphp
@endforeach
 </table>

 @endif
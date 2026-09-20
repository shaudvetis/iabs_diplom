<div class="getrozkladzmonth">
  @if (isset($getrozkladz))
 <div class="alert  alert-dismissible fade show" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><strong>&times;</strong></span>
   </button>
   <h4> Розклад на обраний місяць </h4>
<table class="table table-reaponsive" style="width:90%;">
@foreach($getrozkladz as $item)
<tr>
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" id="{{$item->id}}" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td>{{$item->user_profiles->surname}} {{$item->user_profiles->name}}</td>
<td>{{$item->bazainternatyrs->name_baza}} </td>
<td>{{$item->otdeleniyas->name_otdeleniya}} </td>
<td>{{$item->name_month}} </td>
<td>{{$item->year}} </td>

</tr>
@endforeach
</table>
</div>
@endif

</div>

<div class="getrozkladyears" style="overflow: scroll;" >
  @if(isset($datesreqwest))
   <div class="alert  alert-dismissible fade show" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><strong>&times;</strong></span>
   </button>
   <h4 > Розклад на обраний рік</h4>
    <table class="table table-reaponsive" style="width:90%;">
      <tr>
       <th>#</th>
    <th>FIO</th>
    <th>Серпень <br> {{\Carbon\Carbon::now()->format('Y')}}</th>
    <th>Вересень <br> {{\Carbon\Carbon::now()->format('Y')}}</th>
    <th>Жовтень <br> {{\Carbon\Carbon::now()->format('Y')}}</th>
    <th>Листопад <br> {{\Carbon\Carbon::now()->format('Y')}}</th>
    <th>Грудень <br> {{\Carbon\Carbon::now()->format('Y')}}</th>
    <th>Січень <br> {{\Carbon\Carbon::now()->addYear(1)->format('Y')}}</th>
    <th>Лютий<br> {{\Carbon\Carbon::now()->addYear(1)->format('Y')}}</th>
    <th>Березень<br> {{\Carbon\Carbon::now()->addYear(1)->format('Y')}}</th>
    <th>Квітень<br> {{\Carbon\Carbon::now()->addYear(1)->format('Y')}}</th>
  </tr>

@foreach($datesreqwest as $item)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$item['surname']}} </td>
@foreach($item['baza'] as $items)
<td>{{$items}} </td>
@endforeach
</tr>
@endforeach
</table>
</div>
@endif

</div>

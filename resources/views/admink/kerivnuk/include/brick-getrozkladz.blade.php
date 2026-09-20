<div class="getrozkladz" style="overflow: scroll;"> 

 @if(isset($datesreqwest))
 <h4 > Розклад для обраного інтерна</h4>
<table class="table table-reaponsive" style="width:90%;overflow: scroll;">
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
@endif
</table>
</div>
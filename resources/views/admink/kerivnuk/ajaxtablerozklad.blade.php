
<div class="ajaxtablerozklad">
  @if(isset($n))
  <table class="table table-bordered table-striped">
<tr>
  <th>Напрямок</th>
  <th>Десяток</th>
  <th>Дата  с</th>
  <th>Delet</th>
</tr>

  @foreach($n as $moduls)
 <form class="form_delete" action="{{route('sprav_rozklad.store')}}" method="POST" >
  {{ csrf_field() }} 
<tr>
  <td>{{$moduls->name_napravlenie}} /{{$moduls->npp}}</td>
  <td>{{$moduls->decatki}}</td>
  <td>{{\Carbon\Carbon::parse($moduls->dates)->format('d/m/Y')}}</td>
  <td ><button type="button"  name="delet" id="deletrozklad" class="deletrozklad btn icons" value="{{$moduls->id}}"><i class="fa fa-trash"></i></button></td>
</tr>
</form>
  @endforeach

</table>
@endif
</div>

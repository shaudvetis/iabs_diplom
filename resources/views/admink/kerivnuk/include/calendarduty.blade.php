
<div class="internduty">
@if (isset($events))
<h3>Зміст чергування</h3>
 <div class="alert  alert-dismissible fade show" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><strong>&times;</strong></span>
   </button>
<table class="table  table-responsive">
	
<tr>
	<th>#</th>
	<th>Дата</th>
	<th>Відділення</th>
	<th>Приймальне</th>
	<th>Відповідальній</th>
	<th>Бригада</th>
	<th>Інтерни</th>
</tr>

@foreach($events as $item)
<tr>
	<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" id="{{$item->id}}" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
	<td>{!!\Carbon\Carbon::parse($item->start)->format('d-m-Y')!!}</td>
	<td>{{$item->vid}}</td>
	<td>{{$item->priom_id}}</td>
	<td>{{$item->vid_id}}</td>
	<td>{{$item->nameshort}}</td>
	<td>{{$item->surname}} {{$item->name}}</td>
</tr>
@endforeach


</table>
</div>
@endif
</div>
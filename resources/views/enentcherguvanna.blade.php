@extends('layouts.base')
@section('content')


<div class="alert alert-success" role="alert">
<h3 class="alert-heading"> Розклад чергувань </h3>
</div>

 <form class="form-row">
  <h5><mark> Оберіть потрібний місяць </mark></h5>
  <input type="month" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" name="month" style="width: 200px;">
  <h5><mark> Натисніть "Обрати" </mark></h5>
 <button type="submit" class="givroz  btn btn-success" >Обрати</button>
</form>


<div class="internduty">

<table class="table  table-responsive">
	
<tr>
	<th>Дата</th>
	<th>Відділення</th>
	<th>Приймальне</th>
	<th>Відповідальній</th>
	<th>Бригада</th>
	<th>Інтерни</th>
</tr>
@foreach($events as $item)
<tr>
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



@endsection
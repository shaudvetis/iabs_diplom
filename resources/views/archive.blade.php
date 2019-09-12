@extends('layouts.base')

@section('content')
<h1>Курація хворих на заочному циклі</h1>
<p>
</p>

<form>
   <p>Выберите период </p>
   <p> c: <input type="date" name="calendar">
    по: <input type="date" name="calendar">
   <input type="submit" value="Получить"></p>
  

@foreach ($inputforms as $inputform)

	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th style="width: 100px">фио студента</th>
				<th style="width: 300px"><center>диагноз</th>
				<th style="width: 80px">номер</th>
				<th style="width: 100px">дата курации</th>
				<th style="width: 100px">дата введения данных</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{!! $inputform->user->name !!}</td>
				<td>{!! $inputform->diagnoses !!}</td>
				<td>{!! $inputform->num_card !!}</td>
				<td>{!! $inputform->apdate !!}</td>
				<td>{!! $inputform->created_at !!}</td>
			</tr>
		</tbody>
	</table>

@endforeach


</form>





@endsection
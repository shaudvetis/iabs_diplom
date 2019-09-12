@extends('layouts.baseteacher')

@section('content')



@foreach ($firstindex as $firstindexs)


	<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
			<tr>
				<th>id_student</th>
				<th>диагноз</th>
				<th>номер</th>
				<th>дата курации</th>
				<th>дата введения данных</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{!! $firstindexs->id_student !!}</td>
				<td><textarea>{!! $firstindexs->diagnoses !!}</textarea></td>
				<td>{!! $firstindexs->num_card !!}</td>
				<td>{!! $firstindexs->apdate !!}</td>
				<td>{!! $firstindexs->created_at !!}</td>
		
				
			</tr>
		</tbody>
	</table>
@endforeach

@endsection 


@extends ('layouts.navteacher')

@section('navteacher')
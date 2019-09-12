@extends('layouts.baseteacher')

@section('content')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="{{ asset('firstgrade')}}">Курація хворих</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="surgerycoursen">Хірургічні втручання</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="firstcoursen">Практичні навички</a>
  </li>
 </ul>


    @foreach ($firstcoursen as $firstcoursens)


	<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
			<tr>
				<th>id_student</th>
				<th>диагноз</th>
				<th>номер</th>
				<th>дата введения данных</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{!! $firstcoursens->id !!}</td>
				<td><textarea>{!! $firstcoursens->get_skills !!}</textarea></td>
				<td>{!! $firstcoursens->sum_number !!}</td>
				<td>{!! $firstcoursens->created_at !!}</td>
		
				
			</tr>
		</tbody>
	</table>
@endforeach


    firstcoursen

@endsection
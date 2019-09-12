@extends('layouts.baseteacher')

@section('content')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="{{ asset('firstgrade')}}">Курація хворих</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{asset('surgerycoursen')}}">Хірургічні втручання</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="firstcoursen">Практичні навички</a>
  </li>
 </ul>
@foreach ($surgerycoursen as $surgerycoursens)


	<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
			<tr>
				<th>id_student</th>
				<th>диагноз</th>
				<th>номер</th>
				<th>дата курации</th>
				
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{!! $surgerycoursens->id !!}</td>
				<td><textarea>{!! $surgerycoursens->viewsurgery !!}</textarea></td>
				<td>{!! $surgerycoursens->num_card !!}</td>
				<td>{!! $surgerycoursens->type_work !!}</td>
		
		
				
			</tr>
		</tbody>
	</table>



@endforeach

    

@endsection
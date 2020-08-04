@extends('layouts.base')

@section('content')
<h1>Практичні навички на заочному циклі </h1>
<p>
</p>

<!-- <form>
   <p>Выберите период </p>
   <p> c: <input type="date" name="calendar">
    по: <input type="date" name="calendar">
   <input type="submit" value="Получить"></p> -->
  
<style> 
  table {
    width: 100%;
   border: 1px solid #dee2e6;
  }
 th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  }
 td { border: 1px solid #dee2e6;
   } /**/
  thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
  }
  .layer {
    overflow: scroll; /* Добавляем полосы прокрутки */
   }
</style>
<div class="table-responsive">
    <table >
     <thead>
        <tr>
				<th style="width: 100px">фио студента</th>
				<th style="width: 300px"><center>Навички</th>
				<th style="width: 80px">Кількість</th>
			  <th style="width: 100px">дата введення данних</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($get_skills as $get_skillss)
			<tr>

				<td>{!! $get_skillss->user->name !!}</td>
				<td>{!! $get_skillss->get_skills !!}</td>
				<td>{!! $get_skillss->sum_number !!}</td>
				<td>{!! $get_skillss->created_at !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>




<!-- </form> -->





@endsection
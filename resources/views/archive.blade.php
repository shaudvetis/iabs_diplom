@extends('layouts.base')

@section('content')
<h1>Курація хворих на заочному циклі</h1>
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
        <th style="width: 100px">Напрямок</th>
   			<th style="width: 300px"><center>диагноз</th>
				<th style="width: 80px">номер</th>
				<th style="width: 100px">дата курации</th>
				<th style="width: 100px">дата введения данных</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($inputforms as $inputform)
			<tr>

				<td>{!! $inputform->user->name !!}</td>
        <td>{!! $inputform->direction !!}</td>
 
				<td>{!! $inputform->diagnoses !!}</td>
				<td>{!! $inputform->num_card !!}</td>
				<td>{!! $inputform->apdate !!}</td>
				<td>{!! $inputform->created_at !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>




<!-- </form> -->





@endsection
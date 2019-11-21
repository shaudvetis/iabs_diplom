@extends('layouts.base')

@section('content')
<h1>Курація хворих на заочному циклі - Хірургічні втручання</h1>
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
        <th style="width: 80px">Напрямок</th>
        <th style="width: 100px">початок курації</th>
        <th style="width: 80px">номер операції</th>
        <th style="width: 100px">вид участі</th>
        <th style="width: 100px">види хірургічних втручань</th>
        <th style="width: 100px">дата введения данных</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($formssurgery as $formssurgerys)
			<tr>

				<td>{!! $formssurgerys->user->name !!}</td>
        <td>{!! $formssurgerys->direction !!}</td>
        <td>{!! $formssurgerys->apdate !!}</td>
        <td>{!! $formssurgerys->num_surgery !!}</td>
        <td>{!! $formssurgerys->type_work !!}</td>
        <td>{!! $formssurgerys->viewsurgery !!}</td>
				<td>{!! $formssurgerys->created_at !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>




<!-- </form> -->





@endsection
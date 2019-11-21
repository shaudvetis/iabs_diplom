@extends('layouts.base')

@section('content')
<h3>Засвоєні навички на очному циклі </h3>
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
				<th style="width: 100px">ПІБ інтерна</th>
        <th style="width: 100px">Хірургічні напрямки</th>
				<th style="width: 300px"><center>Навички</th>
				<th style="width: 80px">Кількість</th>
			  <th style="width: 100px">Дата введення</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($formspracticeday as $formspracticedays)
			<tr>

				<td>{!! $formspracticedays->user->name !!}</td>
        <td>{!! $formspracticedays->direction !!}</td>
				<td>{!! $formspracticedays->get_skills !!}</td>
				<td>{!! $formspracticedays->sum_number !!}</td>
				<td>{!! $formspracticedays->created_at !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>




<!-- </form> -->





@endsection
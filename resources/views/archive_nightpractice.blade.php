@extends('layouts.base')

@section('content')
<h3>Інформація про нічні чергування у приймальному відділенні - оглянуті хворі </h3>
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
        <th style="width: 80px">Номер карти</th>
        <th style="width: 100px">ФІО Хворого</th>
        <th style="width: 100px">Початок курації</th>
        <th style="width: 300px"><center>Діагноз</th>
        <th style="width: 100px">Що зроблено</th>
        <th style="width: 300px"><center>Виконані маніпуляції</th>
        <th style="width: 100px">Місце роботи</th>
        <th style="width: 100px">Дата введения</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($nightpractic as $nightpractics)
			<tr>

				<td>{!! $nightpractics->user->name !!}</td>
        <td>{!! $nightpractics->num_card !!}</td>
        <td>{!! $nightpractics->fio !!}</td>
        <td>{!! $nightpractics->apdate !!}</td>
        <td>{!! $nightpractics->diagnoses !!}</td>
        <td>{!! $nightpractics->work !!}</td>
        <td>{!! $nightpractics->practic !!}</td>
        <td>{!! $nightpractics->station !!}</td>
        <td>{!! $nightpractics->created_at !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>




<!-- </form> -->





@endsection
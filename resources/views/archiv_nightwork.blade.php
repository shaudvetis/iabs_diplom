@extends('layouts.base')

@section('content')
<h1>Курація хворих на заочному циклі - Нічні чергквання</h1>
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
 
  td { 
  border: 1px solid #dee2e6;
   } 

  thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
  }
  .layer {
  overflow: scroll; /* Добавляем полосы прокрутки */
   }
</style>
<!-- <div class="table"> -->
<table >
 <thead class="layer">
  <tr>
      	<th>ФІО інтерна</th>
        <th>ФІО хворого</th>

				<th><center>№ стац.карти</th>
				<th>Дата госпіталізації</th>
        <th>Час госпіталізації</th>
        <th>Дата спостереження</th>
        <th >Діагноз Діагноз Діагноз Діагноз</th>
        <th>Що зроблено</th>
        <th>Місце чергування</th>
			  <th>дата введення данних</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($formsnight as $formsnights)
			<tr>

				<td>{!! $formsnights->user->name !!}</td>
				<td>{!! $formsnights->fio !!}</td>
				<td>{!! $formsnights->num_card !!}</td>
        <td>{!! $formsnights->date_arrival !!}</td>
        <td>{!! $formsnights->time_arrival !!}</td>
        <td>{!! $formsnights->apdate !!}</td>

        <td>{!! $formsnights->diagnoses !!}</td>
        <td>{!! $formsnights->work !!}</td>
        <td>{!! $formsnights->station !!}</td>
 				<td>{!! $formsnights->created_at !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>




<!-- </form> -->





@endsection
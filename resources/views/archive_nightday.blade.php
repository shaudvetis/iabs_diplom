@extends('layouts.base')

@section('content')
<h3>Нічні чергування< у відділенні на очному циклі/h3>
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

				<th><center>№ стац.карти</th></center>
				<th>Дата госпіталізації</th>
        <th>Час госпіталізації</th>
        <th>Дата спостереження</th>
        <th >Діагноз </th>
        <th>Виконані маніпуляції</th>
        <th>Участь у оперативних втручаннях</th>
        <th>Місце чергування</th>
			  <th>дата введення данних</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($nightworkday as $nightworkdays)
			<tr>

				<td>{!! $nightworkdays->user->name !!}</td>
        <td>{!! $nightworkdays->fio !!}</td>
				<td>{!! $nightworkdays->num_card !!}</td>
        <td>{!! $nightworkdays->date_arrival !!}</td>
        <td>{!! $nightworkdays->time_arrival !!}</td>
        <td>{!! $nightworkdays->apdate !!}</td>
        <td>{!! $nightworkdays->diagnoses !!}</td>
        <td>{!! $nightworkdays->work !!}</td>
        <td>{!! $nightworkdays->practic !!}</td>
        <td>{!! $nightworkdays->station !!}</td>
 				<td>{!! $nightworkdays->created_at !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>




<!-- </form> -->





@endsection
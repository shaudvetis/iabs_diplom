@extends('layouts.base')

@section('content')
<h1>Облік роботи, яка виконувалась інтерном на очному циклі - Участь у операціях</h1>
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
        <th style="width: 100px">Хірургічний напрямок</th>
        
        <th style="width: 100px">Дата</th>
        <th style="width: 80px">Номер стац.карти</th>
        <th style="width: 80px">Номер операції</th>
        <th style="width: 100px">Вид участі</th>
				<th style="width: 300px"><center>Коментар</th>
				<th style="width: 100px">Дата введения</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($formssurgeryday as $formssurgerydays)
			<tr>

				<td>{!! $formssurgerydays->user->name !!}</td>
        <td>{!! $formssurgerydays->direction !!}</td>
        <td>{!! $formssurgerydays->apdate !!}</td>
				
        <td>{!! $formssurgerydays->num_card !!}</td>
        <td>{!! $formssurgerydays->num_surgery !!}</td>
         <td>{!! $formssurgerydays->type_work !!}</td>
        <td>{!! $formssurgerydays->viewsurgery !!}</td>
        
              
				<td>{!! $formssurgerydays->created_at !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>




<!-- </form> -->





@endsection
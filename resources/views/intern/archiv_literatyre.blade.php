@extends('layouts.base')

@section('content')
<h1>Прочитана література</h1>
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
        <th>Хірургічні напрямки</th>

        <th>Прочитана література</th>
			  <th>дата введення данних</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($literatyre as $literatyres)
			<tr>

				<td>{!! $literatyres->user->name !!}</td>
        <td>{!! $literatyres->direction !!}</td>

        <td>{!! $literatyres->literatyre !!}</td>
				<td>{!! $literatyres->created_at !!}</td>
        
			</tr>
			@endforeach
		</tbody>
	</table>




<!-- </form> -->





@endsection
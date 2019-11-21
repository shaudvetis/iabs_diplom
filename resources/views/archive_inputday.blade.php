@extends('layouts.base')

@section('content')
<h1>Курація хворих на очному циклі</h1>
<p>
</p>

<form>
   <p>Выберите период </p>
   <p> c: <input type="date" name="calendar">
    по: <input type="date" name="calendar">
   <input type="submit" value="Показати"></p>
  </form>

<form>
   <p>Выберите дату</p>
   <input type="date" name="calendar">
   <input type="submit" value="Показати"></p>
  </form>

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
        <th style="width: 100px">ФІО Хворого</th>
        <th style="width: 300px"><center>Діагноз</th></center>
        <th style="width: 80px">Номер</th>
        <th style="width: 100px">Початок курації</th>
        <th style="width: 100px">Коментар</th>
        <th style="width: 100px">Кінець курації</th>
        <th style="width: 100px">Дата данных</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($inputformsday as $inputformdays)
			<tr>

				<td>{!! $inputformdays->user->name !!}</td>
        <td>{!! $inputformdays->direction !!}</td>
        <td>{!! $inputformdays->fio !!}</td>
  
				<td>{!! $inputformdays->diagnoses !!}</td>
				<td>{!! $inputformdays->num_card !!}</td>
				<td>{!! $inputformdays->apdate !!}</td>
        <td>{!! $inputformdays->comm !!}</td>
        <td>{!! $inputformdays->apdate_end !!}</td>
        <td>{!! $inputformdays->created_at !!}</td>
			</tr>
			@endforeach
		</tbody>
	</table>




<!-- </form> -->





@endsection
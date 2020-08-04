@extends('layouts.base')
@include('layouts.instruction.intern.archiv_practic')
@section('content')
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
<div class="card card-danger">
      <div class="card-header">
        <h3>Засвоєні навички на очному циклі </h3>
          <div class="card-tools">
            <a class="btn btn-tool"  href=" {{back()->getTargetUrl()}}">Назад</a>
            <a class="btn btn-tool"  href=" {{asset('archive_input_print')}}">Друк</a>
          </div>
       </div>
  </div>
  <div class="card card-body">
    <div class="row" style="margin-left: 10px">
      <form role="form" method="GET" action="">
        {{ csrf_field() }}
          <div class="form-row">
           <p><strong>Оберіть період</strong></p>
           <div class="col">
           c: <input type="date" name="calendars" class="form-control" value="@if(isset($calendars)) {{$calendars}} @else  @endif">
          </div>
          <div class="col">
          по: <input type="date" class="form-control" name="calendarpo">
          </div>
        <div class="col">
   <input type="submit" style="margin-top:24px" class="btn btn-outline-danger" value="Показати">
 </div>
</div>
  </form>

   <form role="form" method="get" action="  ">
             <!--  {{ csrf_field() }} -->
   <div class="form-row">
     <div class="col">
   <p style="margin-left: 100px"><strong>Фільтр</strong>

   <input type="hidden" name="calendarpo" value="{{date('Y-m-d')}}">
   <select type="text" name="calendars" class="form-control" style="width:80px;" value="@if(isset($calendars)) {{$calendars}} @else  @endif">
    <option>  </option>
        <option value="{{date('Y-m-d',strtotime('-14 days'))}}">За 14 днів</option>
        <option value="{{date('Y-m-d',strtotime('-30 days'))}}">За 30 днів</option>

   </select></p>
 </div>
  <div class="col">
     <!-- <input type="date" name="calendarpo"> --> 
   <input type="submit" class="btn btn-outline-danger" style="margin-top:22px " value="Показати"></p>

  </form>
</div>
</div>

<div class="table-responsive">
    <table >
     <thead>
        <tr>
				<!-- <th style="width: 100px">ПІБ інтерна</th> -->
        <th style="width: 100px">База</th>
        <th style="width: 100px">Хірургічні напрямки</th>
        <th style="width: 100px">Назва навички</th>
				<th style="width: 300px"><center>Інше</th>
				<th style="width: 80px">Кількість</th>
			  </tr>
		</thead>
	<tbody>
		@foreach ($getdate as $formspracticedays)
			<tr>

	<!-- 			<td>{!! $formspracticedays->surname !!}</td> -->
        <td>{!! $formspracticedays->baza !!}</td>
        <td>{!! $formspracticedays->direction !!}</td>

@if(!empty($formspracticedays->pract_cherevna) )
<td>{!! $formspracticedays->pract_cherevna !!}</td>
@endif
@if(!empty($formspracticedays->pract_grudna) )
<td>{!! $formspracticedays->pract_grudna !!}</td>
@endif
       
@if(!empty($formspracticedays->pract_proct) )
<td>{!! $formspracticedays->pract_proct !!}</td>
@endif

@if(!empty($formspracticedays->pract_urolog) )
<td>{!! $formspracticedays->pract_urolog !!}</td>
@endif

@if(!empty($formspracticedays->pract_vascular) )
<td>{!! $formspracticedays->pract_vascular !!}</td>
@endif

@if(!empty($formspracticedays->pract_gnoynaya) )
<td>{!! $formspracticedays->pract_gnoynaya !!}</td>
@endif

@if(!empty($formspracticedays->pract_kardio) )
<td>{!! $formspracticedays->pract_kardio !!}</td>
@endif

@if(!empty($formspracticedays->pract_opiku) )
<td>{!! $formspracticedays->pract_opiku !!}</td>
@endif
       	<td>{!! $formspracticedays->get_skills !!}</td>
				<td>{!! $formspracticedays->sum_number !!}</td>
			
			</tr>
			@endforeach
		</tbody>
	</table>
</div>



<!-- </form> -->





@endsection
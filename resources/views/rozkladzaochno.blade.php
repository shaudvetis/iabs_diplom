@extends('layouts.base')

@section('content')
 

<div class="getrozkladyears" style="overflow: scroll;" >
  @if(isset($rozkladz))
   <div class="alert  alert-dismissible fade show" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><strong>&times;</strong></span>
   </button>
   <h4 class="alert-heading"> Індивідуальні плани проходження інтернатури та проведення занять 
на заочному циклі для інтернів-хірургів. </h4>

<div class="alert alert-success" role="alert">

! Зміна заочних баз інтернатури та термінів щомісячного проходження не можлива без письмового дозволу Департаменту охорони здоров’я облдержадміністрації та кафедри хірургії №1 ДЗ «ДМА МОЗ України». Документи про зміну заочної  бази або відрахування з інтернатури необхідно в триденний строк представити на кафедру хірургії  №1 ДЗ «ДМА  МОЗУ» та в деканат ФПО!
</div>

<table class="table table-reaponsive" style="width:90%;">

  @foreach($rozkladz as $item1)
  <tr>
    <th>{{$item1->name_month}} - {{\Carbon\Carbon::parse($item1->dates)->format('Y')}}</th>
    <th>{{$item1->name_baza}}</th>
 <!--    <th>{{$item1->name_otdeleniya}}</th> -->

  </tr>
  @endforeach
</table>


 
</div>
@endif

</div>


@endsection
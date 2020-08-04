@extends('layouts.baseteacher')
@include('layouts.instruction.kerivnuk.pract')
@section('content')
<style> 
 table {
  width: 100%;
  border: 1px solid #dee2e6;
  border-collapse: separate;
  border-width: 1px 1px 1px 1px;
  margin: 3px auto;
  font-size: 20px;
  }
  th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  /*font-weight: bold;*/
  font-size: 14px;
  text-align: left;
  vertical-align: middle;
  }
  td { border: 1px solid #dee2e6;
  text-align: left;
  vertical-align: middle;
   } /**/
  thead {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
  font-size: 20px;
  }
  * {
  /* old-style reset here :) */
  border: 0px;
  padding: 0px;
}
input {
font-size: 20px;
width:100px;
}
</style>

<p style="font-size: 30px;color: green">Формування розкладу напрямків</p>
 @if (session('message-updated'))
                         @component('admink.components.alert')
                             @slot('type')
                                 success
                             @endslot
                             {!! session('message-updated') !!}
                         @endcomponent
                      @endif     
<table width="80% ">
  <tr>
    <th>Курс</th>
    <th>Десяток</th>
    <th>Викладач</th>
    <th>Напрямок</th>
    <th>Дата с:</th>
    <th>Кількість днів</th>
</tr>
<tr>
  <td>
<form method="GET"  action="">
<select name="decatki" class="form-control">
     <option selected ></option>
     <option value="1" @if(isset($_GET['decatki'])) @if($_GET['decatki'] == 1) selected @endif @endif >1</option>
     <option @if(isset($_GET['decatki'])) @if($_GET['decatki'] == 2) selected @endif @endif >2</option>
     <option @if(isset($_GET['decatki'])) @if($_GET['decatki'] == 3) selected @endif @endif >3</option>
     <option @if(isset($_GET['decatki'])) @if($_GET['decatki'] == 4) selected @endif @endif >4</option>
     <option @if(isset($_GET['decatki'])) @if($_GET['decatki'] == 9999) selected @endif @endif >9999</option>
     </select> 
 
    <button type="submit" class="btn-light" >Обрати</button>
   </form>
 </td>
 <form action="{{route('sprav_rozklad.store')}}" method="POST">
  {{ csrf_field() }} 
  <input type="hidden" name="decatkis" value="@if(isset($_GET['decatki'])) {{$_GET['decatki']}} @endif">
  <select name="course" >
     <option selected >...</option>
     <option>1</option>
     <option>2</option>
     <option>3</option>
  </select> 
 <td> <select name="teacher" class="form-control">
     <option selected ></option>
     @foreach($teacher as $teachers)
     <option  value="{!!$teachers->id!!} ">{!!$teachers->nameshort!!}</option>
     @endforeach
     </select>
   </td>
   <td> <select name="predmet" class="form-control">
     <option selected ></option>
     @foreach($napr as $naprs)
     <option  value="{!!$naprs->id!!} "> 
@php 
if ($naprs->in_days >=  $naprs->days) {

}    
else {
  echo "$naprs->name_napravlenie  - $naprs->min";
}
   
 
   @endphp
  </option>

     @endforeach
     </select> 
   </td>
   <td><input type="date" name="datas" class="form-control"></td>
   <td><input type="text" name="datap" class="form-control">
</table>


  <button type="submit" class="btn btn-success" name="enter" value="1">Enter</button>

</form>



<p style="font-size: 30px;color: green">Завантаженість напрямків</p>
<table>
<tr>
  <th>Напрямок</th>
  <th>Десяток</th>
  <th>Дата  с</th>
  <th>Дата по </th>
  <th>Дні з модуля </th>
  <th>Набрано днів </th>
</tr>
  @foreach($modul as $moduls)
<tr>
  <td>{{$moduls->name_napravlenie}}</td>
  <td>{{$moduls->decatki}}</td>
  <td>{{\Carbon\Carbon::parse($moduls->dates)->format('d/m/Y')}}</td>
  <td>{{\Carbon\Carbon::parse($moduls->datep)->format('d/m/Y')}}</td>
  <td>{{$moduls->days}}</td>
  <td>{{$moduls->in_day}}</td>
</tr>
  @endforeach
</table>
<!-- <form>
  <input type="month" name="date">
  <button type="submit" >enter</button>

</form> -->
<br>

<p style="font-size: 30px;color: green">Перегляд напрямків</p>
<p style="font-size: 25px;color: green">Вересень</p>

<table>
<!--  
  <tr style="text-align: center;">
    <th>Десятки</th>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
    <th>5</th>
    <th style="color: green">6</th>
    <th style="color: green">7</th>
    <th>8</th>
    <th>9</th>
    <th>10</th>
    <th>11</th>
    <th>12</th>
    <th style="color: green">13</th>
    <th style="color: green">14</th>
    <th>15</th>
    <th>16</th>
    <th>17</th>
    <th>18</th>
    <th>19</th>
    <th style="color: green">20</th>
    <th style="color: green">21</th>
    <th>22</th>
    <th>23</th>
    <th>24</th>
    <th>25</th>
    <th>26</th>
    <th style="color: green">27</th>
    <th style="color: green">28</th>
    <th>29</th>
    <th>30</th>
    <th>31</th>
  </tr>
-->
<!-- 
  @php
   //  $lesson = [];
  //   $lesson[1][1] = 1;
  //  dump($lesson);
  @endphp   -->
    @for($i = 1; $i <= 12; ++$i)
    @if(isset($lessons[$i]))
    <h3>{{$i}} месяц</h3>
    <table class="table-responsive">
      <tr style="text-align: center;">
        <th>Десятки</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th style="color: green">6</th>
        <th style="color: green">7</th>
        <th>8</th>
        <th>9</th>
        <th>10</th>
        <th>11</th>
        <th>12</th>
        <th style="color: green">13</th>
        <th style="color: green">14</th>
        <th>15</th>
        <th>16</th>
        <th>17</th>
        <th>18</th>
        <th>19</th>
        <th style="color: green">20</th>
        <th style="color: green">21</th>
        <th>22</th>
        <th>23</th>
        <th>24</th>
        <th>25</th>
        <th>26</th>
        <th style="color: green">27</th>
        <th style="color: green">28</th>
        <th>29</th>
        <th>30</th>
    <!--     <th>31</th> -->
      </tr>  
      @foreach($lessons[$i] as $k => $lesson)
      <tr>
        @php
         //dump($k);
        //dump($lesson); 
        @endphp
        <td>десятка {{$k}}</td>
        @for($j = 1; $j <= 30; ++$j)

           <td >@if(isset($lesson[$j])){{$lesson[$j]}}@endif</td>
        @endfor 
      </tr>
      @endforeach
    </table>
    @endif
    @endfor

   
     

 <!-- <table class="table-responsive">
      <tr style="text-align: center;">
        <th>Десят</th>
   @php
   $zapros = DB::select("
   select calendars.* FROM calendars where
curdate Between  '2020-09=01' and '2020-09-30' order by curdate asc
   ");
   @endphp     
  @foreach($zapros as $zapr)

 <th >{{$zapr->daymont}}</th>
 
  
   
      </tr>  


    
      <tr>
        @php
          //print_r($k);
          //print_r($lesson); 
        @endphp
        <td>десятка </td>
          @foreach($array as $lesson)
           <td>{{$lesson}}</td>
    
       @endforeach
      @endforeach

       </tr>
    </table> -->
  


@endsection
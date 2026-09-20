@extends('layouts.baseteacher')

@section('content')

<style>

.thtext {
 font-size: 12px;
}
</style>

 <table class="table-bordered table mt-5" id="report_table" >
      <tr>
          <th style="width:100px" >Прізвище</th>
            <th class="thtext" style="width:100px">Введення в хір</th>
            <th class="thtext" style="width:100px">Абдомінальна хірургія</th>
            <th class="thtext" style="width:100px">Торакальна хірургія</th>
            <th class="thtext" style="width:100px">Проктологія</th>
            <th class="thtext" style="width:100px">Урологія</th>
           <th class="thtext" style="width:100px">Судинна хірургія</th>
           <th class="thtext" style="width:100px">Гнійна хірургія</th>
           <th class="thtext" style="width:100px">Кардіохірургія</th>
           <th class="thtext" style="width:100px">Опіки</th>
           <th class="thtext" style="width:100px">Амбулаторна</th>
           </tr>
          @foreach ($bal as $key => $item)
          <tr>
          	<td>{{$key}} </td>
          	 @foreach ($item as $key1 => $item1)
          	<td>{{$item1}}</td>
          	 @endforeach

          </tr>
          @endforeach
 </table>

@endsection
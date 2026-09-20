<table class="table-xs" >
   <tr>
      <th colspan="4"></th>
   <th colspan="10" style="color:green"><i>С - скорочено Семінар</i></th>
   </tr>
<tr>
   <th style="width: 30px">Прізвище</th>
   <th style="height: 10px">С-1</th>
   <th style="height: 10px">С-2</th>
   <th style="height: 10px">С-3</th>
   <th style="height: 10px">С-4</th>
   <th style="height: 10px">С-5</th>
   <th style="height: 10px">С-6</th>
   <th style="height: 10px">С-7</th>
   <th style="height: 10px">С-8</th>
   <th style="height: 10px">С-9</th>
   <th style="height: 10px">С-10</th>
   <th style="height: 10px">С-11</th>
   <th style="height: 10px">С-12</th>
 </tr>

   @foreach($suma as $user_inf)
  <tr>
<td >{!! $user_inf['surname'] !!} {!! $user_inf['name'] !!}</td>
<td ><center><strong>{!! $user_inf['0'] !!}</td>

@if(isset($user_inf['1']) )

<td><center>{!!$user_inf['1']!!}</td>
@else  <td>  </td>
@endif          
               
@if(isset($user_inf['2']))
<td><center>{!! $user_inf['2'] !!}</td>
@else <td><center>{!!$user_inf['2']  = '' !!}</td>
@endif

@if(isset($user_inf['3']))
<td><center> {!! $user_inf['3'] !!}</td>
@else <td><center>{!!$user_inf['3'] = '' !!}</td>
@endif

@if(isset($user_inf['4']))
<td><center> {!! $user_inf['4'] !!}</td>
@else <td><center>{!!$user_inf['4'] = '' !!}</td>
@endif

@if(isset($user_inf['5']))
<td><center> {!! $user_inf['5'] !!}</td>
@else <td><center>{!!$user_inf['5'] = '' !!}</td>
@endif

@if(isset($user_inf['6']))
<td><center> {!! $user_inf['6'] !!}</td>
@else <td><center>{!!$user_inf['6'] = '' !!}</td>
@endif

@if(isset($user_inf['7']))
<td><center> {!! $user_inf['7'] !!}</td>
@else <td><center> {!!$user_inf['7'] = '' !!}</td>
@endif

@if(isset($user_inf['8']))
<td><center> {!! $user_inf['8'] !!}</td>
@else <td><center> {!!$user_inf['8'] = '' !!} </td>
@endif

@if(isset($user_inf['9']))
<td><center> {!! $user_inf['9'] !!}</td>
@else <td><center>{!!$user_inf['9'] = '' !!}</td>
@endif

@if(isset($user_inf['10']))
<td><center> {!! $user_inf['10'] !!}</td>
@else <td><center>{!!$user_inf['10'] = '' !!}</td>
@endif

@if(isset($user_inf['11']))
<td><center> {!! $user_inf['11'] !!}</td>
@else <td><center>{!!$user_inf['11'] = '' !!}</td>
@endif

@if(isset($user_inf['12']))
<td><center> {!! $user_inf['12'] !!}</td>
@else {!!$user_inf['12'] = '' !!}
@endif
</strong>
</center>
  </tr>
 
   @endforeach

</table>
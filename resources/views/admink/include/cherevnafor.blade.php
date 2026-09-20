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
 
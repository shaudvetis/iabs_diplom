 <tr> 
  <tbody>

  <input type="hidden" name="id_seminarus" value="{{$direction->id}}">

<input class="smol_input" type="hidden" name="user_id"  value="{{$user_inf->user_id}}"> 

<td>{!! $user_inf->user_id !!}</td>
<td>{!! $user_inf->surname !!} {!! $user_inf->name !!}</td>

<td ><input size="1px" type="text" title="{{$user_inf->surname}}"  name="one" value="{{$user_inf->one}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="two" value="{{$user_inf->two}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="three" value="{{$user_inf->three}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="four" value="{{$user_inf->four}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="five" value="{{$user_inf->five}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="six" value="{{$user_inf->six}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="seven" value="{{$user_inf->seven}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="eight" value="{{$user_inf->eight}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="nine" value="{{$user_inf->nine}}"></td>
<td style="width:5px;" class="col-md-6 col-sm-6 col-xs-6  widthbutton"> <button  type="submit" ><i class="fa fa-edit" aria-hidden="true"></i> </button></td>
<td <?php if ($user_inf->suma1 < 18) {$t="red";} 
  else {$t="green";} ?>
   style="color:<?php echo $t; ?>;">{!! $user_inf->suma1 !!}/18</td>
</tr>
</tbody>

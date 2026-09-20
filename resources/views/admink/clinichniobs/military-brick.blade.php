
<table style="text-align:center;" class="table table-sm">
  <thead class="thead-light table-success">
  <tr>
  <!-- <th >ID</th> -->
  <th >Призвище</th>
  <th style="width: 80px;">1</th>
  <th style="width: 90px; ">2</th>
  <th style="width: 90px;">3</th>
  <th style="width: 100px;">4</th>
  <th style="width: 120px;">5</th>
  <th style="width: 120px;">6</th>
  <th style="width: 80px;">7</th>
  <th style="width: 110px;">8</th>
  <th style="width: 110px;">9</th>
  <th style="width: 1px;" class="no_print"></th>
  <th style="width: 120px;">Разом</th>
  </tr>
  </thead>
  <tr>
  <th></th>
  <!-- <th></th> -->
  <td >1-0</td>
  <td >1-0</td>
  <td >1-0</td>
  <td>1-0</td>
  <td >1-0</td>
  <td >1-0</td>
  <td >1-0</td>
  <td >1-0</td>
  <td >1-0</td>
  <th class="no_print"></th>
  <td >9-0</td>
 </tr>
@foreach($results1 as $user_inf)
<form  method="post" action="{{route('practnavpost')}}">
                 {{ csrf_field() }}  

<tr> 
  <tbody>

  <input type="hidden" name="id_seminarus" value="{{$id}}">

<input class="smol_input" type="hidden" name="user_id"  value="{{$user_inf->user_id}}"> 

<!-- <td>{!! $user_inf->user_id !!}</td> -->
<td>{!! $user_inf->surname !!} {!! $user_inf->name !!}</td>

<td ><input size="1px" type="text" title="{{$user_inf->user_id}}"  name="one" value="{{$user_inf->one}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="two" value="{{$user_inf->two}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="three" value="{{$user_inf->three}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="four" value="{{$user_inf->four}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="five" value="{{$user_inf->five}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="six" value="{{$user_inf->six}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="seven" value="{{$user_inf->seven}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="eight" value="{{$user_inf->eight}}"></td>
<td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="nine" value="{{$user_inf->nine}}"></td>
<td style="width:5px;" class="col-md-6 col-sm-6 col-xs-6  widthbutton no_print"> <button  type="submit" ><i class="fa fa-edit no_print" aria-hidden="true"></i> </button></td>
<td <?php if ($user_inf->suma1 < 9) {$t="red";} 
  else {$t="green";} ?>
   style="color:<?php echo $t; ?>;">{!! $user_inf->suma1 !!}</td>
</tr>
</tbody>

</form>
@endforeach
<tr>
<td colspan="13" style="font-size: small;font-style:italic;color:green;text-align:left;">1 - Голкова декомпресія плевральної порожнини у випадку напруженого пневмотораксу.<br>
2 - Накладання оклюзійної пов’язки при відкритому пневмотораксі.<br>
3 - Асептична пов’язка на рану черевної порожнини.<br>
4 - Накладання тазового бандажу.<br>
5 - Мануальна фіксація шийного відділу хребта.<br>
6 - Накладання комірця Шанца.<br>
7 - Маневр log roll.<br>
8 - Накладання турнікету.<br>
9 - Тампонада рани, прямий тиск на рану.<br>
</td>
    </tr>
</table>


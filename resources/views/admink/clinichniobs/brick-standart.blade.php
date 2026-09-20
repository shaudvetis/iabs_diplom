<div style="text-align:center;overflow: scroll;">
<table style="text-align:center;overflow: scroll;" class="table table-sm brick" >
  <thead class="thead-light table-success">
  <tr>
  <th >Призвище</th>
  <th style="width: 80px; font-size:small;">Опит. <p>хворого</p></th>
  <th style="width: 90px; font-size:small;">Фізикальне<p>обcтеження</p></th>
  <th style="width: 90px;font-size:small;">Попередній <p>діагноз</p></th>
  <th style="width: 100px; font-size:small;">Діагностична <p>програма</p></th>
  <th style="width: 120px; font-size:small;">Аналіз даних <p>доп-них методів дослід-ня</p></th>
  <th style="width: 120px; font-size:small;">Диференційний <p>діагноз</p></th>
  <th style="width: 80px; font-size:small;">Клінічний <p>діагноз</p></th>
  <th style="width: 110px; font-size:small;">Обґрунтування <p>лікувальної тактики</p></th>
  <th style="width: 110px; font-size:small;">Обґрунтування <p>операції</p></th>
  <th style="width: 1px;" class="print"></th>
  <th style="width: 120px; font-size:small;">Разом</th>
  </tr>
  </thead>
  <tr>
  <th></th>
  <th >5-4-3-2</th>
  <th >5-4-3-2</th>
  <th >5-4-3-2</th>
  <th >5-4-3-2</th>
  <th >5-4-3-2</th>
  <th >5-4-3-2</th>
  <th >5-4-3-2</th>
  <th >5-4-3-2</th>
  <th >5-4-3-2</th>
  <th class="print"></th>
  <th >45-36-27-18</th>
 </tr>

 @foreach($results1 as $user_inf)
<form  method="post" action="{{route('practnavpost')}}">
                 {{ csrf_field() }}  
 <tr> 
  <tbody>
  <input type="hidden" name="id_seminarus" value="{{$id}}">
  <input class="smol_input" type="hidden" name="user_id"  value="{{$user_inf->user_id}}"> 
  
  <td>{!! $user_inf->surname !!} {!! $user_inf->name !!}  / {!! $user_inf->countdiagnos!!}</td>
 <!--  Если нет за последний месяц записей в курации, если не пусто -->

  <td ><input size="1px" type="text" title="{{$user_inf->user_id}}"  name="one" value="{{$user_inf->one}}"></td>
  <td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="two" value="{{$user_inf->two}}"></td>
  <td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="three" value="{{$user_inf->three}}"></td>
  <td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="four" value="{{$user_inf->four}}"></td>
  <td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="five" value="{{$user_inf->five}}"></td>
  <td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="six" value="{{$user_inf->six}}"></td>
  <td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="seven" value="{{$user_inf->seven}}"></td>
  <td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="eight" value="{{$user_inf->eight}}"></td>
  <td><input title="{{$user_inf->surname}}"  size="1px" type="text" name="nine" value="{{$user_inf->nine}}"></td>
 <td style="width:5px;" class="col-md-6 col-sm-6 col-xs-6  widthbutton print"> <button  type="submit" ><i class="fa fa-edit" aria-hidden="true"></i> </button></td>
 <td <?php if ($user_inf->suma1 < 18) {$t="red";} 
  else {$t="green";} ?>
   style="color:<?php echo $t; ?>;">{!! $user_inf->suma1 !!}/18</td>

 
</tbody>
</tr>
</form>
@endforeach
</table>

</div>



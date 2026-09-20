<td  style = "font-size:15pt;"><strong>{{ $user_inf['user_id'] }} {{ $user_inf['surname'] }}</strong></td>
</tr> 

<tr>
<th>Що зроблено</th>
<th>Асистенція</th>
<th>№ операції</th>
<th>Дата</th>
<th>Дата вводу</th>
 @foreach($user_inf['viewsurgery'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $viewsurgery = '';
  $type_work = '';
  $num_surgery = '';
  $apdate = '';
  $created_at = '';
  //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['viewsurgery']))
 {
 $viewsurgery = $user_inf['viewsurgery'][$index];
 $type_work = $user_inf['type_work'][$index];
 $num_surgery = $user_inf['num_surgery'][$index];
 $apdate = $user_inf['apdate'][$index];
 $created_at = $user_inf['created_at'][$index];
 } ?>
        
  <tr>
<td>{!!$viewsurgery!!}</td>
<td>{!!$type_work!!}</td>
<td>{!!$num_surgery!!}</td>
<td>{!!$apdate!!}</td>
<td>{!!$created_at!!}</td>
   </tr>
   
 @endforeach

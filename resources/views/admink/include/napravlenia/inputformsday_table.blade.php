<td  style = "font-size:15pt;"><strong>{{ $user_inf['user_id'] }} {{ $user_inf['surname'] }}</strong></td>
</tr> 

<tr>
<th>ФІО хворого</th>
<th>Діагноз</th>
<th>№ карти</th>
<th>Дата(початок курації)</th>
<th>Коментар</th>
<th>Дата(кінець курації)</th>
<th>Дата вводу</th>

 @foreach($user_inf['viewsurgery'] as $index => $value)
<?php  
//Формируем пустые ячейки для таблицы
  $fio = '';
  $diagnoses = '';
  $num_card = '';
  $apdate = '';
  $comm = '';
  $apdate_end = '';
  $created_at = '';
  //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
 if(isset($user_inf['viewsurgery']))
 {
 $fio = $user_inf['fio'][$index];
 $diagnoses = $user_inf['diagnoses'][$index];
 $num_card = $user_inf['num_card'][$index];
 $apdate = $user_inf['apdate'][$index];
 $comm = $user_inf['comm'][$index];
 $apdate_end = $user_inf['apdate_end'][$index]; 
 $created_at = $user_inf['created_at'][$index];
 } ?>
        
  <tr>
<td>{!!$fio!!}</td>
<td>{!!$diagnoses!!}</td>
<td>{!!$num_card!!}</td>
<td>{!!$apdate!!}</td>
<td>{!!$comm!!}</td>
<td>{!!$apdate_end!!}</td>
<td>{!!$created_at!!}</td>
   </tr>
 @endforeach

 <button type="button" class="btn btn-secondary" id="printButton" onclick="printit();">Друкувати</button>
<h3 style="text-align:center">ЗВІТНА ВІДОМІСТЬ</h3>
<p style="font-size: 15pt;text-align:center;">війсково-спеціальна підготовка, військово-медична підготовка (хірургічний профіль)</br>
кафедра медицини катастроф та військової медицини ДЗ «ДМА» </p>

<div id="teb" class="teb">
<table  cellpadding="0" cellspacing="0" class="tablemilitary">
 <tr>
  <td></td>
   <td></td>
    <th colspan="5">1 день </th>
    <th colspan="8">2 день</th>
    <th colspan="4">3 день </th>
    <th colspan="3">4 день</th>
    <th> </th>
  </tr>
  <tr style="background:lightgrey">
  <th>#</th>
  <th>ПІБ</th>
  <th>Т1</th>
  <th>ПН1</th>
  <th>ПН2</th>
  <th>ПН3</th>
  <th>ПН4</th>
  <th>Т2</th>
  <th>Т3</th>
  <th>Т4</th>
  <th>ПН5</th>
  <th>ПН6</th>
  <th>ПН7</th>
  <th>ПН8</th>
  <th>ПН9</th>
  <th>Т5</th>
  <th>Т6</th>
  <th>Т7</th>
  <th>Т8</th>
  <th>Т9</th>
  <th>Т10</th>
  <th>Т11</th>
  <th>Разом/Бал</th>
 </tr>
    
 <tr> 
  <tbody>
    <?php $y=1; ?>
    <form method="post" action="{{asset('military')}}">
     {{ csrf_field() }}
@foreach($result1 as  $user_inf)
<td>{!!$y!!}</td>
<td style="width: 200px;">{{$user_inf['surname']}} {{$user_inf['name']}}</td>
<?php foreach($res as $key => $value) : 
 //Формируем пустые ячейки для инпутов
  $bal = '';
  $suma = '';
  if(isset($user_inf['bal'][$key])) {
  $bal = $user_inf['bal'][$key];
}

//    if(isset($user_inf['bal'][$key])) {
//   $suma = $user_inf['suma1'][$key];
// }

   //$index это номер по порядку ключа, просто вывод
  //$id = $user_inf['id'][$index];говорим, если что то есть в єтой переменной то дай эти значения переменным

   ?>


<td>{{$bal}}</td>

 <?php endforeach; ?>
 <td>
<?php  $suma=$user_inf['suma1']; 
if (($suma<=64)&&($suma>=59))
{
echo " / 5";
}elseif (($suma<=59)&&($suma>=49)) {
echo " / 4";
}elseif (($suma<=48)&& ($suma>=42)) {
echo " / 3";
}elseif (($suma<42))  {
echo '<i style="color:red">'." / 2".'</i>';}     ?></td>
</tr>

<tr>
  <?php $y++ ?>
  @endforeach
 
<td colspan="2" style="font-size: small;font-style:italic;color:green;text-align:left;margin-top: 0">Т1-10 / 2-5 балів <br>
ПН1-9  / 0-1 бал
</td>
<td colspan="8" style="font-size: small;font-style:italic;color:green;text-align:left;margin-top: 0">Т1 - Пошкодження та поранення внутрішніх органів <br>
ПН1 -  голкова декомпресія плевральної порожнини у випадку напруженого пневмотораксу<br>
ПН2 -  накладання оклюзійної пов’язки при відкритому пневмотораксі<br>
ПН3 - асептична пов’язка на рану черевної порожнини<br>
ПН4 -  накладання тазового бандажу
</td>
<td colspan="5" style="font-size: small;font-style:italic;color:green;text-align:left;margin-top: 0">Т2 -  Травматична хвороба та травматичний шок<br>
Т3 -  Пошкодження кінцівок, мінно-вибухові поранення <br>
Т4 -  Сучасна ранева хвороба і вогнепальна рана<br>
ПН5 -  мануальна фіксація шийного відділу хребта<br>
ПН6 -  накладання комірця Шанца<br>
ПН7 -  маневр log roll<br>
ПН8 -  накладання турнікету<br>
ПН9 -  тампонада рани, прямий тиск на рану
</td>
<td colspan="4" style="font-size: small;font-style:italic;color:green;text-align:left;margin-top: 0">Т5 -  Інфекційні ускладнення ран<br>
Т6 -  Опікова хвороба та опіковий шок<br>
Т7 -  Синдром тривалого розчавлювання<br>
Т8 -  Синдром тривалого розчавлювання<br>
</td>
<td colspan="4" style="font-size: small;font-style:italic;color:green;text-align:left;margin-top: 0">Т9 -  Актуальні питання організації медичного забезпечення військ воєнного та мирного часу<br>
Т10 -  Сучасна система лікувально-евакуаційного забезпечення Збройних сил України<br>
Т11 Медична служба оперативних об’єднань
</td>
</tr>
</tbody>
</table>
</div>


<p style="font-size: 15pt;text-align:left;">Зав. кафедри медицини катастроф
та військової медицини, д.мед.н., проф.    <span style="float:right;"> О.Ю. Сорокіна</span> </p>


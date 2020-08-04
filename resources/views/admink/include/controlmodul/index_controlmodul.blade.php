<table class="table table-sm">
   <thead class="thead-light">
     <tr>
   <th style="width: 10px; font-size:small;padding-bottom:25px">ID</th>
   <th style=" font-size:small;padding-bottom:25px">Призвище</th>
   <th style=" font-size:small;">Всі поточні контролі  <p>по семінарам</p></th>
   <th style="font-size:small;padding-bottom:25px">Курація хворого</th>
   <th style="font-size:small;padding-bottom:25px">Тестування</th>
   <th style="font-size:small;padding-bottom:25px">Разом</th>
   <th style="font-size:small;padding-bottom:25px">ЕСТS</th>
   <th style=" font-size:small;padding-bottom:25px">Оцінка</th>
    </tr>
   </thead>
     <tr>
   <th></th>
   <th></th>
      @foreach($direction as $user_inf)
   <th style=" font-size:small;padding-top:50px">{!!$user_inf->all_control1 !!}</th>
   <th style=" font-size:small;padding-top:50px">{!!$user_inf->all_control2 !!}</th>
   <th style=" font-size:small;padding-top:50px">{!!$user_inf->test !!}</th>
   <th style=" font-size:small;padding-top:50px">{!!$user_inf->all_control3 !!}</th>
   <th style=" font-size:small;">
   
    <table width="100%" class="table-striped" cellspacing="0" cellpadding="4"><tr valign=middle><td id="col1" style="height: 5px;padding:0px;padding-left: 0px;margin-left: 5px;" >{!!$user_inf->all_control4!!} ({!!$user_inf->all_control5!!}-{!!$user_inf->all_control6!!}%)</td></tr>
      <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control7!!}  ({!!$user_inf->all_control8!!}-{!!$user_inf->all_control9!!}%)</td>
   </tr>
   <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control10 !!} ({!!$user_inf->all_control11 !!}-{!!$user_inf->all_control12 !!}%)</td></tr>
   <tr> 
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control13 !!} ({!!$user_inf->all_control14 !!}-{!!$user_inf->all_control15 !!}%)</td>  
   </tr>
   <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control16 !!} ({!!$user_inf->all_control17 !!}-{!!$user_inf->all_control18 !!}%)</td></tr>
   <tr>
   <td style=" font-size:small;height: 5px;padding:0px;padding-left: 0px">{!!$user_inf->all_control19 !!} ({!!$user_inf->all_control20 !!}-%)</td>
   </tr>
   </table></th>
   <th style=" font-size:small;padding-top:50px">{!!$user_inf->all_control21 !!}</th>
   </tr>
   @endforeach
   @foreach($results1 as $user_inf)
   <tr> 
  <tbody>
  <td>{!! $user_inf->user_id !!}</td>
  <td>{!! $user_inf->surname !!} {!! $user_inf->name !!}</td>

  <td>  <?php if ($user_inf->suma1 < 22) {$t="red";} 
  else {$t="green";} ?>
  <p style="color:<?php echo $t; ?>;">{!! $user_inf->suma1 !!}</td>



  <td>  <?php if ($user_inf->suma < 27) {$t="red";} 
  else {$t="green";} ?>  
  <p style="color:<?php echo $t; ?>;">{!! $user_inf->suma !!}</td>
  
  <td>{{$user_inf->suma3}}</td>

  <td><!-- <input type="text" class="form-control"value="@if(isset($user_inf->suma1)){{$user_inf->suma1+$user_inf->suma}} @else  @endif"> -->{{$user_inf->suma1+$user_inf->suma+$user_inf->suma3}}</td>
 
@foreach($direction as $user_inf1)
  <td><?php $y=($user_inf->suma1+$user_inf->suma+$user_inf->suma3); $x=$y*100/$user_inf1->max;  if (($x<=$user_inf1->all_control5)&&($x>=$user_inf1->all_control6))
 {
 echo ceil($x).'%'.' '.'A';
 }elseif (($x<=$user_inf1->all_control8)&&($x>=$user_inf1->all_control9)) {
   echo ceil($x).'%'.' '.'B';
 }elseif (($x<=$user_inf1->all_control11)&& ($x>=$user_inf1->all_control12)) {
   echo ceil($x).'%'.' '.'C';
 }
 elseif (($x<=$user_inf1->all_control14)&& ($x>=$user_inf1->all_control15)) {
   echo ceil($x).'%'.' '.'D';
 }
  elseif (($x<=$user_inf1->all_control17)&& ($x>=$user_inf1->all_control18)) {
   echo ceil($x).'%'.' '.'E';
 }
elseif ($x<=$user_inf1->all_control20) {
   echo ceil($x).'%'.' '.'FX';
 }
  ?> </td>

 <td> <?php 
 $y=($user_inf->suma1+$user_inf->suma+$user_inf->suma3); $x=$y*100/$user_inf1->max;
  if (($x<=$user_inf1->all_control5)&&($x>=$user_inf1->all_control6))
 {
echo "5";
 }elseif (($x<=$user_inf1->all_control8)&&($x>=$user_inf1->all_control9)) {
   echo "4";
 }
elseif (($x<=$user_inf1->all_control11)&& ($x>=$user_inf1->all_control12)) {
   echo "4";
 }
 elseif (($x<=$user_inf1->all_control14)&& ($x>=$user_inf1->all_control15)) {
   echo "3";
 }
  elseif (($x<=$user_inf1->all_control17)&& ($x>=$user_inf1->all_control18)) {
   echo "3";
 }
elseif ($x<=$user_inf1->all_control20) {
   echo "2";
 }
?></td>
  </tr>
  </tbody>
   @endforeach
 @endforeach
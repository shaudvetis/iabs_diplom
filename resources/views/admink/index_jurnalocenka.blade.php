@if (isset($_GET))
<a style="padding: 0;" class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Загальні оцінки</a>
<div class="collapse" id="collapseExample">
   @include ('admink.include.cherevnainc')
   @foreach($suma as $user_inf)
   @include ('admink.include.cherevnafor')

   @endforeach
    </table>
  </div>
<!-- Таблица с оценками закончилась-->
<!-- Таблица с журналом! Две таблицы в одной -->
<table  class="toptable" border="0" cellpadding="0" cellspacing="0">
<tr>
@foreach($result1 as $user_inf)
<td colspan="4" > 
  <div class='topFixed'>
  <a href="<?= '/cherevna/?b2=test' . '&user_id=' . $user_inf['user_id'] ?>">
  {!! $user_inf['surname'] !!}<br> {!! $user_inf['name'] !!}</a>
  </div>
@foreach($direction as $directions)
  <?php if ($user_inf['suma1'] < $directions->min_bal) {$t="red";} 
  else {$t="green";} ?>
  <p style="color:<?php echo $t; ?>; padding-top: 50px">{!! $user_inf['suma1'] !!}/{!!$directions->min_bal!!}</p> 
@endforeach
  <table style="width: 100%" border="0" cellpadding="0" cellspacing="70" class="layer">
  <tr>
    <th >#</th>
    <th >О</th>
    <th >С</th>
    <th >K</th>
  </tr>
  </tr>
  <tr>
  <?php foreach($res as $index => $value) : 
  //Формируем пустые ячейки для инпутов
  $lessons = '';
  $bal = '';
  //$index это номер по порядку ключа, просто вывод
  //говорим, если что то есть в єтой переменной то дай эти значения переменным
  if(isset($user_inf['bal'][$index]))
  {
  $bal = $user_inf['bal'][$index];
  $lessons = $user_inf['lessons'][$index];
  }
  if(isset($user_inf['lessons'][$index]))
  {
  $bal = $user_inf['bal'][$index];
  $lessons = $user_inf['lessons'][$index];
  }
  ?>
  <!-- выводим по значению коротое в переменных -->
  <td style="height: 1px; font-size: small;background:lightgrey;">{{ $value->npp }}</td>
  <form role="form" method="post"  action="{{route('grudna_klituna.store')}}">
               {{ csrf_field() }}  
  <input type="hidden" name="id_seminarus" value="{{$value->teor_nav}}">
  <input type="hidden" name="id_seminar"  value="{!!$value->id_seminar!!}">
  <input class="smol_input" type="hidden" name="user_id"  value="{{$user_inf['user_id']}}"> 
  <td class="smol_td"><input class="smol_input" title="{{$user_inf['surname']}}"  type="text" name="bal"  value="<?= $bal ?>"></td>
  <td><select class="smol_select" name="lessons">
  <option value="0" @if(isset($lessons)) @if($lessons == 0) selected @endif @endif> </option>
  <option value="1" @if(isset($lessons)) @if($lessons == 1)selected @endif @endif>З</option>
  <option value="2" @if(isset($lessons)) @if($lessons == 2)selected @endif @endif>Н\Б</option></select></td>
 <td class="smol_td" class="col-md-6 col-sm-6 col-xs-6  widthbutton"> <button type="submit" class="smol_input" name="tema" value="<?= $value->id ?>" ><i class="fa fa-edit" aria-hidden="true"></i> </button></td>
 </tr>
 </form>
 <?php endforeach; ?>
 </table>
 </td>
@endforeach 
</tr>
</table>
@endisset
</div>

 <div  style='float:left; /*margin-top:280px;*/'>
  <div style="margin-left: 0px!important; " id="collapseOne" class="bd-example-modal-lg" aria-labelledby="headingOne" data-parent="#accordion">
  <!-- <div class="card-body>  --> 
  <!-- Задает длинну узкую самого общего блока в котором находятся все темі  -->      
  <div class="modal-dialog modal-sm ">
  <!-- Задает блок кард на котором держаться все єлементі  --> 
  <div class="modal-content ">
  <ul class="nav nav-pills nav-fill">
  <li class="nav-item">
  <h5><strong>Учбові елементи з модулю <p> 
    @foreach ($direction as $directions)
    "{!!$directions->direction!!}"</strong> </h5></p>
  @endforeach
  </li>
  </ul> 
  <table>
  <tr>  
  @foreach ($seminar as $seminars)
  @if(stristr($seminars->tema, 'span') === FALSE)
  <td><button type="button" class="btn-sm btn-info"><input type="hidden" name="element[]" value="{{$seminars->element}}"> {!! $seminars->npp !!}</button></td>

  <td ><button type="button" class="btn-sm btn-primary"  data-id="{{ $seminars->id }}"   data-toggle="modal" data-target="#exampleModal{{ $seminars->id }}" data-whatever="@mdo"> <input type="hidden" value="{{$seminars->element}}">?</button>{!! $seminars->tema !!}</td>
        </tr>
     @else
        <tr> <td></td>
        <td  style="size: 80px" >{!! $seminars->tema !!}</td>
     </tr>
     @endif

<div class="modal fade" id="exampleModal{{ $seminars->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Питання</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <textarea rows="10" cols="60" type="text"  >{!! $seminars->pract_nav !!}</textarea>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Вихід</button>
  </div>
  </div>
  </div>
  @endforeach
  </table>


</div>
</div>
</div>
</div>
</div>
</div>  
</div>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
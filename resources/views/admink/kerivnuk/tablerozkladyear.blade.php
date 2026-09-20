<div class="tablerozkladyear">
@if(isset($datesreqwest))

@for($i = 2017; $i <= 2099; ++$i)
    <!-- объявили и просто от 1 до 12 сколько месяцев, потом говорим, если что то есть в нашей переменной то и это будет месяц. В переменной храниться числа но віводит только то число которое есть в массиве -->
  @if(isset($datesreqwest[$i]))
   <h3>{{$i}} рік</h3>
   @foreach($datesreqwest[$i] as $key => $value)
   <h3>
   @php
      if ($key=="8") echo "Серпень - $year";
      if ($key=="9") echo "Вересень";
      if ($key=="10") echo "Жовтень";
      if ($key=="11") echo "Листопад";
      if ($key=="12") echo "Грудень";
      if ($key=="1") echo "Січень";
      if ($key=="2") echo "Лютий";
      if ($key=="3") echo "Березень";
      if ($key=="4") echo "Квітень";
      if ($key=="5") echo "Травень";
      if ($key=="6") echo "Червень";
    @endphp
    </h3>
     <table class="table-responsive">
    <tr style="text-align: center;">
    <th style="text-align: center;" class="table-responsive">Дата <br> \Десятки</th>
       @for($j = 1; $j <= 31; ++$j)
   <th > {{$j}}</th>
   @endfor 
   </tr>  
   
   @foreach($value as $k => $lesson1)
    <tr>
    <td style="text-align: center;">{{$k}}</td>
    @for($j = 1; $j <= 31; ++$j)
    <td >
    @if(isset($lesson1[$j]))
    {!!$lesson1[$j]!!}
    
    @endif
    </td>
    @endfor 
    </tr>
    @endforeach
    </table>
    @endforeach
    @endif
    @endfor
 @endif
  </div>
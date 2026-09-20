<style type="text/css">
  .table-print{
    text-align: center;
  }
  @media print {
    #panel {
      display:none;
 }
   .print {
      display:none;
 }
 #printButton{
  display:none;
 }
 .btn  {
   display:none;
 }
 .body-print{
   display:none;
 }
 .pract_print{
  display:none;
 }
}
</style>
<div class="show" style="display: none">
<button class="btn btn-danger" style="width: 100px;height:60px; float:right; margin:0 2px; " onclick="printit();">Друкуваті</button>  
 Дата:{!!\Carbon\Carbon::now()->format('d-m-Y')!!}
<h1 style="text-align: center;"> Дніпропетровський Державний <br> Медичний Університет</h1>
<h2 style="text-align: center;">Кафедра хірургіі №1 </h2>
<h4 style="text-align: center;">Звіт по оволодінню практичними та хірургічними <br>навичками по семінару @php if(isset($_GET['direction'])) $name=($_GET['direction']); else $name= ''; @endphp  
  @if($name == 2)
     Абдомінальна хірургія 
  @elseif($name == 1)
    Введення в хірургію
  @elseif($name == 3)
    Торакальна хірургія
  @elseif($name == 4)
    Проктологія
  @elseif($name == 5)
   Урологія
  @elseif($name == 6)
   Судинна хірургія
  @elseif($name == 7)
  Гнійна хірургія
  @elseif($name == 8)
  Кардіохірургія
  @elseif($name == 9)
  Опіки та основи пластичної хірургії
  @elseif($name == 11)
  Амбулаторна хірургія
   @endif  </h4>
<!-- 
<p style="text-align: left;">Інтерн </p> -->
<table class="table-print">
    <tr>
      <th>#</th>
      <th>Назва</th>
      <th>Вміє \ Володіє\ Ознайомлен</th>
    </tr>
    <?php  $i=1  ?>
     @foreach ($product as $item)
    <tr>
      <td>{!!$i!!}</td>
      <td style="text-align:left;">{{$item->pract_name}}</td>
      <td></td>
       <?php  $i++ ?>
    </tr>
    @endforeach
  </table>

<br>
<h3>Пройдені практичні та хірургічні навички</h3>
<table>
    <tr>
      <th>#</th>
      <th style="text-align:left;">Назва</th>
      <th>Кількість</th>
    </tr>
    <?php  $i=1  ?>
     @foreach ($archiv as $items)
    <tr>
      <td>{!!$i!!}</td>
      @if(!empty($items->pract_cherevna))
      <td>{{$items->pract_cherevna}}</td>

      @elseif(!empty($items->pract_opiku))
      <td>{{$items->pract_opiku}}</td>

       @elseif(!empty($items->pract_grudna))
      <td>{{$items->pract_grudna}}</td>

       @elseif(!empty($items->pract_proct))
      <td>{{$items->pract_proct}}</td>

       @elseif(!empty($items->pract_urolog))
      <td>{{$items->pract_urolog}}</td>

       @elseif(!empty($items->pract_vascular))
      <td>{{$items->pract_vascular}}</td>

       @elseif(!empty($items->pract_gnoynaya))
      <td>{{$items->pract_gnoynaya}}</td>

      @elseif(!empty($items->pract_kardio))
      <td>{{$items->pract_kardio}}</td>

       @elseif(!empty($items->pract_amsurgery))
      <td>{{$items->pract_amsurgery}}</td>

      @endif
      <td style="text-align: center">{{$items->sum_number}}</td>
       <?php  $i++ ?>
    </tr>
    @endforeach
   </table>
  <div style="padding-top: 100px;">
<span style="padding-left: 300px;">Підпис викладача:</span>
 <br>

 </div>
 <span style="text-align: center;font-size:9px;"> Затверджено ЦМК ДДМУ 21.05.2019р. Протокол 8  </span>
</div>


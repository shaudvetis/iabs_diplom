<style> 
  table {
   width: 100%;
   border: 1px solid #dee2e6;
}
th {
  border-radius: 0.25rem;
  border: 1px solid #dee2e6;
  text-align: center;
  }
td { 
  border: 1px solid #dee2e6;
  text-align: center;
   } 

</style>
 <a class="btn btn-light" href="{{back()->getTargetUrl()}}" style="float: right;"> Повернутися</a>
 <button type="button" class="btn btn-primary"  onclick="printit()" style="float: right;">Друк</button>

<div class="body-print">
 <h5>Облік роботи, яка виконувалась інтерном по курації хворого  <br> <span style="text-align: center;font-size:9px;"> Затверджено ЦМК ДДМУ 21.05.2019р. Протокол 8  </span> </h5>
   <!--  <h6 >База стажування: Очна</h6> -->
  <h6>ПІБ інтерна:  @foreach($result as $getdateochs) 
       @if ($loop->first)
        {{$getdateochs->surname}}  {{$getdateochs->name}}
    @endif @endforeach</h6>
   <table >
      <tr>
        <th>№</th>
        <th>Хірургічні напрямки</th>
        <th><center>Діагноз</center></th>
        <th>Номер карти</th>
        <th>Назва операції</th>
        <th>Вид участі</th>
        <th>№операції</th>
        <th>Початок курації</th>
        <th>Кінець курації</th>
      </tr>
      <?php $y=1; ?>
       @foreach($result as $getdateochs)
      <tr>
        <td style="width: 20px"><center><?= $y  ?></center></td>
        <td>{!! $getdateochs->direction !!}</td>
        <td>{!! $getdateochs->diagnoses !!}</td>
        <td>{!! $getdateochs->num_card !!}</td>
        <td>{!! $getdateochs->oper !!}</td>
        <td>{!! $getdateochs->type_work !!}</td>
        <td>{!! $getdateochs->comm !!}</td>
        <td>{!! \Carbon\Carbon::parse($getdateochs->apdate)->format('d/m/Y') !!}</td>
        <td>{!! \Carbon\Carbon::parse($getdateochs->apdate_end)->format('d/m/Y') !!}</td>
      <?php  $y++;?> 
      </tr>
      @endforeach
      </table>
      </div>
<script>
function printit(){
if (window.print) { 
window.print(); 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6, 2); 
}
}
</script>

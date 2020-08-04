@extends ('layouts.baseteacher')

@section('content')
<style>
  @media print {
    #printButton {
        display:none;
    }
 
</style>
<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<button type="button" class="btn btn-primary" id="printButton" onclick="printit();">Друкувати</button>
 <a class="btn btn-light" href="{{route('admink.user_details', [$details->id])}}" id="printButton">Повернутися</a>
    <!-- SELECT2 EXAMPLE -->
   
<div class="card-header">
 <h3 class="card-title"><strong>Формування картки інтерна</strong></h3>
</div>
 <div class="card-body">
 <div class="row">
  <div class="form-group col-md-4">
  <label>Прізвище :</label>
  <div>{{$details->surname}} {{$details->name}} {{$details->lastname}}</div>
  </div>
  <div class="form-group col-md-4">
  <label>Стать:</label>
  <div>{{$details->gender}}</div>
  </div>
  <div class="form-group col-md-4">
  <label>ПІБ інтерна англійською мовою:</label>
  <div>{{$details->fullname_en}}</div>
  </div>
  <div class="form-group col-md-4">
  <label>ПІБ, які використ. раніше (здебільшого для жінок):</label>
  <div>{{$details->surnamefirst}}</div>
  </div>
  <div class="col-4">
    <label>Дата  бак.посів та коментар:</label>
    <div>{{$details->date_bak}}</div>
  </div>
  <div class="col-4">
    <label>Флюрографія норма:</label>
    <div>{{$details->fl_norm}}</div>
  </div>
    
<br>
 
     <div class="card-body">
        <h3 class="card-title"><strong>Поштова адреса місця мешкання інтерна</strong></h3>
       <div class="row">
   <div class="form-group col-md-2">
   <label>Країна:</label>
   <div>{{$details->country}}</div>          
   </div>
   <div class="form-group col-md-2">
   <label for="inputCity">Місто:</label>
   <div>{{$details->city}}</div>       
   </div>
   <div class="form-group col-md-2">
   <label>ПГТ</label>
   <div>{{$details->village}}</div>                         
   </div>
   <div class="form-group col-md-2">
   <label for="inputZip">Індекс:</label>
   <div>{{$details->index}}</div>           
   </div>
   <div class="form-group col-md-2">
   <label for="inputfio">Вулиця:</label>
   <div>{{$details->adress}}</div>          
   </div>
   <div class="form-group col-md-2">
   <label for="inputAddress">Будинок</label>
   <div>{{$details->house}}</div>      
   </div>
   <div class="form-group col-md-2">
   <label for="inputAddress">Квартира</label>
   <div>{{$details->apartment}}</div>      
   </div>
   <div class="form-group col-md-2">
   <label for="inputAddress">Особисті контактні телефони </label>
   <div>{{$details->telc}}</div>    
   </div>
   <div class="form-group col-md-2">
   <label for="inputAddress">Особисті контактні телефони</label>
   <div>{{$details->telm}}</div>       
   </div>
   </div>
   </div>
   </div>

 <h3 class="card-title"><strong>Поштова адреса місця прописки інтерна</strong></h3>
 <div class="row">
 <div class="form-group col-md-2">
 <label>Країна</label>
 <div>{{$details->country1}}</div>         
 </div>
 <div class="form-group col-md-2">
 <label>Місто</label>
 <div>{{$details->city1}}</div>         
 </div>
 <div class="form-group col-md-2">
 <label>ПГТ</label>
 <div>{{$details->village1}}</div>         
 </div>
 <div class="form-group col-md-2">
 <label>Індекс</label>
 <div>{{$details->index1}}</div>       
 </div>
 <div class="form-group col-md-2">
 <label>Вулиця</label>
 <div>{{$details->adres1}}</div>       
 </div>
 <div class="form-group col-md-1">
 <label>Будинок</label>
 <div>{{$details->house1}}</div>    
 </div>
 <div class="form-group col-md-1">
 <label>Квартира</label>
 <div>{{$details->apartment1}}</div>      
 </div>
 </div>
  <br>
 <h3 class="card-title"><strong>Поштова адреса батьків</strong></h3>
 <br>
 <div class="row">
 <div class="form-group col-md-2">
 <label>Країна</label>
 <div>{{$details->country2}}</div>           
 </div>
 <div class="form-group col-md-2">
 <label>Місто</label>
 <div>{{$details->city2}}</div>         
 </div>
 <div class="form-group col-md-2">
 <label>ПГТ</label>
 <div>{{$details->village2}}</div>        
 </div>
 <div class="form-group col-md-2">
 <label>Індекс</label>
 <div>{{$details->index2}}</div>           
 </div>
 <div class="form-group col-md-2">
  <label>Вулиця</label>
  <div>{{$details->adres2}}</div>
  </div>
  <div class="form-group col-md-2">
  <label>Будинок</label>
  <div>{{$details->house2}}</div>
  </div>
  <div class="form-group col-md-2">
  <label>Квартира</label>
  <div>{{$details->apartment2}}</div>
  </div>
  <div class="form-group col-md-2">
    <label>Телефон батьків</label>
   <div>{{$details->tel1}}</div>
  </div>
 </div>
<br>
<h3 class="card-title"><strong>Заочна база</strong></h3>
<br>
 <div class="row">
 
   
  <div class="form-group col-md-2">
  <label>Країна</label>
  <div>{{$details->country3}}</div>
  </div>
  <div class="form-group col-md-2">
  <label>Місто</label>
  <div>{{$details->city3}} </div>
 </div>
  <div class="form-group col-md-2">
  <label>СМТ</label>
  <div>{{$details->village3}}</div>
  </div>    
  <div class="form-group col-md-2">
  <label>Індекс</label>
  <div>{{$details->index3}}</div>
   </div> 
  <div class="form-group col-2">
  <label>Вулиця</label>
  <div>{{$details->adres3}}</div>
</div>
  <div class="form-group col-2">
  <label>Будинок</label>
  <div> {{$details->house3}}</div>
  </div>
  <div class="form-group col-2">
  <label>ПІБ головного лікаря</label>
  <div>{{$details->doctor1}}</div>
</div>

  <div class="form-group col-2">
  <label>Службові телефони базової лікарні</label>
  <div>{{$details->tel2}}</div>
  </div>
  
  <div class="form-group col-2">
  <label>ПІБ базового керівника </label>
  <div>{{$details->bos}}</div>
  </div>
  <div class="form-group col-2">
  <label>Стаж базового керівника </label>
  <div>{{$details->boswork}}</div>
  </div>
  <div class="form-group col-2">
  <label>Атестаційна категорія базового керівника </label>
  <div>{{$details->boskat}}</div>
 </div>
</div>
<br>
<h3 class="card-title"><strong>Розподіл після інтернатури (держбюджет)</strong></h3>
 <br>      
  <div class="row">
  <div class="form-group col-md-2">
  <label>Країна</label>
  <div>{{$details->country4}}</div>
  </div>
  
  <div class="form-group col-md-2">
  <label>Місто</label>
  <div>{{$details->city4}}</div>
  </div>

  <div class="form-group col-md-2">
  <label>СМТ</label>
  <div>{{$details->village4}}</div>
  </div>
      
  <div class="form-group col-md-2">
  <label>Індекс</label>
  <div>{{$details->index4}}</div>
  </div>

  <div class="form-group col-md-3">
  <label>Лікарня</label>
  <div>{{$details->healt1}}</div>
  </div>
    
  <div class="form-group col-md-2">
  <label>Вулиця</label>
  <div>{{$details->adres4}}</div>
  </div>

  <div class="form-group col-md-2">
  <label>Будинок</label>
  <div>{{$details->house4}}</div>
  </div> 
  
  <div class="form-group col-md-3">
  <label>ПІБ головного лікаря</label>
  <div>{{$details->doctor2}}</div>
  </div>

  <div class="form-group col-md-4">
  <label>Службові телефони лікарні</label>
  <div>{{$details->tel3}}</div>
</div>

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
@endsection
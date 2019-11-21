@extends('layouts.base')

@section('content')

<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

    <!-- SELECT2 EXAMPLE -->
    <div class="card">

                          <div class="card-footer">
 <button type="button" class="btn btn-primary" onclick="printit();">Друкувати</button>
 

        <div class="card-header">

            <h3 class="card-title">Особисті данні інтерна</h3>

        </div>
        <div class="card-body">
            <div class="row">
    <div class="form-group col-md-5">
      <label>Email</label>
      <div>{{$details->email}}</div>
    </div>

<div class="col-6">
    <label>Прізвище</label>
    <div>{{$details->surname}}</div>    
  </div>
      <div class="col-4">
    <label>Ім'я</label>
    <div>{{$details->name}}</div>      
  </div>
  <div class="col-5">
    <label>По батькові</label>
    <div>{{$details->lastname}}</div>
  </div> 
 
 <div class="col-3">
    <label>Стать</label>
    <div>{{$details->gender}}</div>   
    </div>
<div class="col-5">
    <label>ПІБ інтерна англійською мовою</label>
    <div>{{$details->fullname_en}}</div>    
  </div>

<div class="col-6">
    <label>ПІБ, які використ. раніше (здебільшого для жінок)</label>
    <div>{{$details->surnamefirst}}</div>        
  </div>
<div class="col-4">
    <label>Дата  бак.посів та коментар</label>
    <div>{{$details->date_bak}}</div>
</div>
<div class="col-4">
    <label>Флюрографія норма</label>
    <div>{{$details->fl_norm}}</div>
</div>
<div class="col-4">
    <label>Кафедра</label>
    <div>{{$details->kafedra}}</div>
</div>

  </div>
</div>
    </div>
    <!-- SELECT2 EXAMPLE -->
      <div class="card">

          <div class="card-header">

              <h3 class="card-title">Поштова адреса місця мешкання інтерна</h3>

          </div>
          <div class="card-body">
              <div class="row">


     <div class="form-group col-md-4">
      <label>Країна</label>
      <div>{{$details->country}}</div>          
    </div>

    <div class="form-group col-md-4">
      <label for="inputCity">Місто</label>
      <div>{{$details->city}}</div>       
    </div>
                  <div class="form-group col-md-4">
                      <label>ПГТ</label>
                      <div>{{$details->village}}</div>                         
                  </div>

    <div class="form-group col-md-2">
        <label for="inputZip">Індекс</label>
        <div>{{$details->index}}</div>           
     </div>

  <div class="col-5">
    <label for="inputfio">Вулиця</label>
    <div>{{$details->adress}}</div>          
  </div>
  <div class="col">
    <label for="inputAddress">Будинок</label>
    <div>{{$details->house}}</div>      
  </div>
  <div class="col">
    <label for="inputAddress">Квартира</label>
    <div>{{$details->apartment}}</div>      
  </div>

<div class="col-5">
    <label for="inputAddress">Особисті контактні телефони </label>
    <div>{{$details->telc}}</div>    
     </div>
     <div class="col-5">
    <label for="inputAddress">Особисті контактні телефони</label>
    <div>{{$details->telm}}</div>       
     </div>
   </div>
          </div>
          </div>
              <!-- SELECT2 EXAMPLE -->
              <div class="card">

                  <div class="card-header">

                      <h3 class="card-title">Поштова адреса місця прописки інтерна</h3>

                  </div>
                  <div class="card-body">
                      <div class="row">
     <div class="form-group col-md-4">
      <label>Країна</label>
      <div>{{$details->country1}}</div>         
     </div>
  
    <div class="form-group col-md-4">
      <label>Місто</label>
      <div>{{$details->city1}}</div>         
    </div>
    <div class="form-group col-md-4">
      <label>ПГТ</label>
      <div>{{$details->village1}}</div>         
     </div>
      <div class="form-group col-md-2">
      <label>Індекс</label>
      <div>{{$details->index1}}</div>       
    </div>
<div class="col-5">
    <label>Вулиця</label>
    <div>{{$details->adres1}}</div>       
  </div>
  <div class="col">
    <label>Будинок</label>
    <div>{{$details->house1}}</div>    
  </div>
  <div class="col">
    <label>Квартира</label>
    <div>{{$details->apartment1}}</div>      
  </div>
                      </div>
                  </div>
                  </div>
                      <!-- SELECT2 EXAMPLE -->
                      <div class="card">

                          <div class="card-header">

                              <h3 class="card-title">Поштова адреса батьків</h3>

                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="form-group col-md-5">
      <label>Країна</label>
      <div>{{$details->country2}}</div>           
    </div>
  
    <div class="form-group col-md-6">
      <label>Місто</label>
      <div>{{$details->city2}}</div>         
    </div>

<div class="form-group col-md-7">
      <label>ПГТ</label>
      <div>{{$details->village2}}</div>        
    </div>
      <div class="form-group col-md-2">
      <label>Індекс</label>
      <div>{{$details->index2}}</div>           
    </div>
    
<div class="col-7">
    <label>Адреса батьків</label>
    <div>{{$details->adres2}}</div>      
  </div>
  
  <div class="col-7">
    <label>Телефон батьків</label>
    <div>{{$details->tel1}}</div>    
  </div>
  

                              </div>
                          </div>
                          </div>
                      </div>
                    </div>

@endsection

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

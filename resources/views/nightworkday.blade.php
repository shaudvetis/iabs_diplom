@extends('layouts.base')
@include('layouts.instruction.intern.night')
@section('content')


<h3>Облік роботи, яка виконувалась інтерном на очному циклі</h3>
<p>
</p>

    <form role="form" method="post" action="{{asset('nightworkday')}}" >
  {{ csrf_field() }}


    <!-- SELECT2 EXAMPLE -->

  <div class="card card-info">
   <div class="card-header">
     <h3 class="card-title">Інформація про нічні чергування </h3>
      <div class="card-tools">
        <a  href="{{asset('archive_nightday')}}" >Архів</a>
       </div>
</div>
 <!-- /.card-header -->
<div class="card-body" >
  <div class="row">

<div style="width:200px;margin-left: 5px;">
<label>Дата чергування</label>               
<input type="date" required class="form-control" name="date_work">
</div>
<div class="was-validated">
<div style="width:200px;margin-left: 5px;">
<label style="color:red">База чергування</label>           
<select name="baza" required="" class="form-control">
        <option selected>  </option>
        <option >Очна база</option>   
        <option >Заочна база</option>    
</select>
<p class="invalid-feedback">Обов'язково оберіть базу</p>
</div>
</div>
<div style="width:200px;margin-left: 5px;">
<label>Тривалість чергування</label>           
<select name="time_work" required="" class="form-control">
        <option selected> </option>
        <option value="16">16</option>   
        <option value="24">24</option>    
</select>
</div>

<div class="row" style="margin-left: 5px;">
<label class="col-form-label col-sm-6 pt-0">
Місце чергування</label>
<div class="col-sm-10">
     
<div class="custom-control custom-radio">
<input id="myRadioButton1" type="radio" name="station_work" value="1" onclick="checkSel(this)"  class="custom-control-input">
<label class="custom-control-label" for="myRadioButton1">Відділення стаціонар
</label>
</div>

<div class="custom-control custom-radio">
<input id="myRadioButton2" type="radio" name="station_work" value="2" onclick="checkSel(this)" class="custom-control-input">
  <label class="custom-control-label" for="myRadioButton2">Приймальне відділення</label>
</div>


</div>
</div>

<div id="info" style="display:none; width: 100%">
          
      <div class="card-body">
       <!-- <label >ФІО хворого</label>
        <input type="text" class="form-control" name="fio"> -->
        <label >Діагноз</label>
        <textarea type="text" class="form-control" name="diagnosespriom"></textarea>
      </div>
    <div class="col-sm-10">
      <div class="custom-control custom-radio">
        <input id="myRadioButton3" type="radio" name="otkaz" value="1" class="custom-control-input" onclick="Selected(this)">
        <label class="custom-control-label" for="myRadioButton3">
   Відмова в госпіталізації
      </label>
      </div> 


      <div class="custom-control custom-radio">
        <input id="myRadioButton4" type="radio" name="gosp" value="2" class="custom-control-input" onclick="Selected(this)">
        <label class="custom-control-label" for="myRadioButton4">
       Госпіталізація</label>
      </div>
</div>

</div>

<div id="infogosp" style="display:none; width: 100%">
  <div class="card-body">
    <label for="formGroupExampleInput3">№ запису у журналі</label>
    <input type="text" class="form-control" id="formGroupExampleInput3" name="num_cardotkaz">

 
    <label for="formGroupExampleInput4">Причина відмови</label>
    <textarea type="text" class="form-control" id="formGroupExampleInput4" name="prichina" name="prichina"></textarea>

    <label>Виконані маніпуляції</label>
    <textarea type="text" class="form-control" name="manipulaciiotkaz"></textarea>

    <label>Вид участі</label>
    <select name="type_workotkaz" class="form-control select2" style="width: 200px;">
    <option >  </option>
    <option>Асистенція</option>
    <option >Самостійно</option>
    <option >Етапи операції</option>
    </select>
    </div>
   </div>
 </div>
     

 <!-- Початок курации у стационарному отделении -->
<div id="gospital" style="display:none; width: 100%" >
  <div  class="card card-body">
   
   
<label>№ карти стац.хворого</label>               
<input style="width:200px;" type="text" class="form-control" name="num_card">


<label>Виконані маніпуляції</label>
<textarea name="work" class="form-control">
</textarea> 

<label>Вид участі</label>
    <select name="type_workgosp" class="form-control select2" style="width: 200px;">
    <option ></option>
    <option >Асистенція</option>
    <option >Самостійно</option>
    <option >Етапи операції</option>
    </select>
</div>
</div>
<p>
</p>
</div>
</div>

<div id="Corpus" style="display:none; width: 100%">
  <div class="card card-body">
             
<!-- <label>ФІО хворого</label>
<input style="width:300px;" type="text" class="form-control" name="fiostacionar"> -->
     
 
<label>№ карти стац.хворого</label>               
<input style="width:200px;" type="text" class="form-control"  class="form-control" name="num_cardstacionar">



<label>Діагноз</label>
<textarea name="diagnosesstac"  class="form-control" ></textarea>

<label>Операція</label>
<textarea name="oper" class="form-control">
</textarea> 

<label>Вид участі</label>
    <select name="type_workstac" class="form-control select2" style="width: 200px;">
    <option > </option>
    <option >Асистенція</option>
    <option >Самостійно</option>
    <option >Етапи операції</option>
    </select>
</div>
</div>    

<script>
  // console.log('abcd');
  function checkSel(node){
    let valCheck = node.value;
    
    if(valCheck == 2) {
      let divInfo = document.getElementById('info');
      divInfo.style.display = 'block';
      let divGospital = document.getElementById('gospital');
      divGospital.style.display = 'none';
      let divCorpus = document.getElementById('Corpus');
      divCorpus.style.display = 'none';
    }
    if(valCheck == 1){
      let divCorpus = document.getElementById('Corpus');
      divCorpus.style.display = 'block';
      let divInfo = document.getElementById('info');
      divInfo.style.display = 'none';
      let divGospital = document.getElementById('gospital');
      divGospital.style.display = 'none';
    }
    
   
  }
  function Selected(node){
    let selectCheck = node.value;
    
    if(selectCheck == 1) {
      let divInfo = document.getElementById('infogosp');
      divInfo.style.display = 'block';
      let divGospital = document.getElementById('gospital');
      divGospital.style.display = 'none';
    }
   if(selectCheck == 2){
      
      let divGospital = document.getElementById('gospital');
      divGospital.style.display = 'block';
      let divInfo = document.getElementById('infogosp');
      divInfo.style.display = 'none';
    }
    
   
  }
</script>   
                  <input type="submit"  class="btn btn-secondary btn-lg btn-block" value="Відправити" >
               </form>
            </div>
    </div>
@endsection







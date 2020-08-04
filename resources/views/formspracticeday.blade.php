@extends('layouts.base')
@include('layouts.instruction.intern.forms_practic')
@section('content')

<h3>Облік роботи, яка виконувалась інтерном на очному циклі</h3>
<p>
</p>
<form role="form" method="post" action="{{asset('formspracticeday')}}" >
  {{ csrf_field() }}

      <!-- SELECT2 EXAMPLE -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Засвоєні практичні навички</h3>

            <div class="card-tools">
              <a class="btn btn-tool" href="{{asset('archiva_practiceday')}}">Архів</a>
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <div class="row" >
           <label style="color:red;font-size: 23px">База навчання</label>
           </div>
            <div class="col-sm-6">
             <div class="was-validated">
              <div class="custom-control custom-radio">
               <input id="myRadioButton1" type="radio" required="" name="fio" value="очна" class="custom-control-input">
                <label class="custom-control-label" for="myRadioButton1" style="font-size: 18px;">Очна</label>
              </div>
              <div class="custom-control custom-radio">
               <input id="myRadioButton2" type="radio" name="fio" value="заочна" class="custom-control-input">
                <label class="custom-control-label" value="заочна" for="myRadioButton2" style="font-size: 18px">Заочна</label>
              </div>
             </div>
            </div>
            <p></p>
            @component('layouts.napravleniya')
           <div class="was-validated">
           @endcomponent      
           </div>
                <div id='Label1' style='display: none;width:350px;margin-left: 5px'>
                 <label>Назва навички</label>
                  <select name="pract_cherevna" class="form-control select2" style="width: 100%">
                  <option >  </option>
                  <option > Перев’язки</option>
                  <option > Введення троакарів в черевну порожнину</option>
                  <option >Група крові та сумісність</option>
                  <option > Оглядові рентгенограми черевної та грудної порожнин</option>
                  <option >Накладання швів на шкіру</option>
                  <option >Антисептична обробка операційного поля</option>
                  <option>Введення дренажів в черевну порожнину</option>
                  <option >Лапароскопія</option>
                  <option >Введення зонду для харчування</option>
                  <option >Закрита інтубація кишечнику</option>
                  </select>
                </div>

                <div id='Label2' style="display: none;width:350px;margin-left: 5px">
                  <label>Назва навички</label>
                  <select name="pract_grudna" class="form-control select2" style="width: 100%;">
                  <option >  </option>
                  <option> Перев’язки</option>
                  <option> Санація емпіємної порожнини</option>
                  <option>Оглядові R-грами грудної клітини</option>
                  <option>Пункція плевральної порожнини</option>
                  <option>Торакоцентез, дренування плевральної порожнини</option>
                  <option>Блокада міжреберна, субплевральна, паравертебральна</option>
                  </select>
                </div>

                <div id='Label3' style="display: none;width:350px;margin-left: 5px">
                  <label>Назва навички</label>
                  <select name="pract_proct" class="form-control select2" style="width: 100%;">
                  <option > </option>
                  <option> Пальцеве обстеження прямої кишки</option>
                  <option> Дослідження прямої кишки  дзеркалом</option>
                  <option>Ректороманоскопія</option>
                  <option>Місцеве знеболення при операціях на анальному каналі</option>
                  <option>Накладання   калоприймача</option>
                  <option>Зондове дослідження прямокишкових нориць / Фарбова проба при норицях</option>
                  </select>
                </div>
                <div id='Label4' style="display: none;width:350px;margin-left: 5px">
                 <label>Назва навички</label>
                 <select name="pract_urolog" class="form-control select2" style="width: 100%;">
                 <option > </option>
                 <option> Пальпація нирок і сечового міхура </option>
                 <option> Пальцеве дослідження прямої кишки та передміхурової залози</option>
                 <option>Катетеризація сечового міхура </option>
                 <option>Уретроцистоскопія</option>
                 <option>Екскреторна урографія</option>
                 <option>Цистографія / Уретрографія</option>
                 <option>Блокада сім'яного канатика (за Лорін-Епштейном)</option>
                 <option>Ведення хворих з дренажами сечового міхура </option>
                 <option>Ведення хворих з нефростомою </option>
                 <option>Ведення хворих з постійним уретральним катетером</option>
                 </select>
                </div>
 
               <div id='Label5' style="display: none;width:350px;margin-left: 5px">
                <label>Назва навички</label>
                <select name="pract_vascular" class="form-control select2" style="width: 100%;">
                  <option > </option>   
              <option> Визначення стану клапанного апарату магістральних вен </option>
              <option> Визначення стану клапанного апарату перфорантних вен </option>
              <option> Проби при варикозній хворобі </option>
              <option> Проби при облітеруючих захворюваннях</option>
              <option>УЗ Доплерографія (показання до призначення, особливості виконання, патогномонічні зміни) </option>
              <option>КТ ангіографія (показання до призначення, особливості виконання, патогномонічні зміни) </option>
              <option>Обгрунтування призначення антикоагулянтної терапії (призначення, розрахунок дози та скасування антикоагулянтів)</option>
              <option> Визначення Лодижечно-Плечевого Індексу (ЛПІ)  та  Пальце-Плечевого Індексу  (ППІ) </option> 
              <option>Визначення температурної, тактильної, больової та вібраційної чутливості </option>
              <option>Реовазографія</option>
              </select>
              </div>
              <div id='Label6' style="display: none;width:400px;margin-left: 5px">
              <label>Назва навички</label>
              <select name="pract_gnoynaya" class="form-control select2" style="width: 100%;">
              <option > </option>
                <option>  Проведення бакпосіву з рани </option>
                <option> Проведення зіскобу при підозрі на кандидомікоз </option>
                <option>Принципи обробка та дренування гнійних хірургічних ран </option>
                <option>Вакумна терапія гнійних ран (VAC-терапія) </option>
                <option>Спосіб проточно-промивного дренування та обробка гнійної рані пульсуючою струєю </option> 
                <option> Пункція та розтин гнояків при гнійних захворюваннях кисті / стопи </option>
                <option>ПХО ран </option>
                <option> Лазерна та ультразвукова обробка гнійної рані </option>
                <option> Місцеве знеболення при гнійних захворюваннях кисті / стопи </option>
                <option> Розрахунок дози інсуліну у хірургічних хворих </option>
                </select>
                </div>

              <div id='Label7' style="display: none;width:350px;margin-left: 5px">
              <label>Назва навички</label>
              <select name="pract_kardio" class="form-control select2" style="width: 100%;">
              <option > </option>
              <option> Визначення серцевого поштовху, меж серця та аускультація клапанів серця </option> 
              <option> Визначення центрального венозного тиску </option>
              <option> Перев*язка кардіохірургічних хворих </option>
              <option> Пункція перикарду на введення лікарських препаратів (на манекені) </option>
              <option> Маніпуляції при зупинці серця (непрямий масаж серця, штучне дихання та дефібриляція) </option>
              <option> Надання медичної допомоги при кардіогенному шоці, ТЕЛА та раптовій зупинці серця</option>
              </select>
              </div>

              <div id='Label8' style="display: none;width:350px;margin-left: 5px">
              <label>Назва навички</label>
              <select name="pract_opiku" class="form-control select2" style="width: 100%;">
              <option > </option>
              <option> Визначення глибини та площі опіку</option>
              <option> Визначення Індексу тяжкості ураження</option>
              <option> Проведення дренуючих операцій (некротомій) при глибоких опіках та
              відмороженнях</option>
              <option> Розмітка розрізів з урахуванням ліній Лангера на обличчі, тулубі та
              кінцівках</option>
              <option> Особливості ПХО опікових ран</option>
              <option> Складання плану реабілітаційних заходів після пластичних втручань</option>
              </select>
              </div>

<script >
function Selected(a) {
 var label = a.value;
  if (label==2) {
        document.getElementById("Label1").style.display='block';
        document.getElementById("Label2").style.display='none';
        document.getElementById("Label3").style.display='none';
        document.getElementById("Label4").style.display='none';
        document.getElementById("Label5").style.display='none';
        document.getElementById("Label6").style.display='none';
        document.getElementById("Label7").style.display='none';
        document.getElementById("Label8").style.display='none';
     } else if (label==3) {
        document.getElementById("Label1").style.display='none';
        document.getElementById("Label2").style.display='block';
        document.getElementById("Label3").style.display='none';
        document.getElementById("Label4").style.display='none';
        document.getElementById("Label5").style.display='none';
        document.getElementById("Label6").style.display='none';
        document.getElementById("Label7").style.display='none';
        document.getElementById("Label8").style.display='none';

    } else if (label==4) {
        document.getElementById("Label1").style.display='none';
        document.getElementById("Label2").style.display='none';
        document.getElementById("Label3").style.display='block';
        document.getElementById("Label4").style.display='none';
        document.getElementById("Label5").style.display='none';
        document.getElementById("Label6").style.display='none';
        document.getElementById("Label7").style.display='none';
        document.getElementById("Label8").style.display='none';
    } 
     else if (label==5) {
        document.getElementById("Label1").style.display='none';
        document.getElementById("Label2").style.display='none';
        document.getElementById("Label3").style.display='none';
        document.getElementById("Label4").style.display='block';
        document.getElementById("Label5").style.display='none';
        document.getElementById("Label6").style.display='none';
        document.getElementById("Label7").style.display='none';
        document.getElementById("Label8").style.display='none';
 
    } else if (label==6) {
        document.getElementById("Label5").style.display='block';
        document.getElementById("Label1").style.display='none';
        document.getElementById("Label2").style.display='none';
        document.getElementById("Label3").style.display='none';
        document.getElementById("Label4").style.display='none';
        document.getElementById("Label6").style.display='none';
        document.getElementById("Label7").style.display='none';  
        document.getElementById("Label8").style.display='none';     

    } 
    else if (label==7) {
        document.getElementById("Label6").style.display='block';
        document.getElementById("Label5").style.display='none';
        document.getElementById("Label1").style.display='none';
        document.getElementById("Label2").style.display='none';
        document.getElementById("Label3").style.display='none';
        document.getElementById("Label4").style.display='none';
        document.getElementById("Label7").style.display='none';
        document.getElementById("Label8").style.display='none';
    } 
     else if (label==8) {
        document.getElementById("Label7").style.display='block';
        document.getElementById("Label6").style.display='none';
        document.getElementById("Label5").style.display='none';
        document.getElementById("Label1").style.display='none';
        document.getElementById("Label2").style.display='none';
        document.getElementById("Label3").style.display='none';
        document.getElementById("Label4").style.display='none';
        document.getElementById("Label8").style.display='none';
   } 
   else if (label==9) {
        document.getElementById("Label8").style.display='block';
        document.getElementById("Label7").style.display='none';
        document.getElementById("Label6").style.display='none';
        document.getElementById("Label5").style.display='none';
        document.getElementById("Label1").style.display='none';
        document.getElementById("Label2").style.display='none';
        document.getElementById("Label3").style.display='none';
        document.getElementById("Label4").style.display='none';
   } 
    else {
       document.getElementById("Label1").style.display='none';
       document.getElementById("Label2").style.display='none';
       document.getElementById("Label3").style.display='none';
       document.getElementById("Label4").style.display='none';
       document.getElementById("Label5").style.display='none';
       document.getElementById("Label6").style.display='none';
       document.getElementById("Label7").style.display='none';
       document.getElementById("Label8").style.display='none';

    }
}
</script>
              <div style="width:300px;margin-left: 5px">
              <label>Інше</label>
              <textarea name="get_skills" class="form-control select2"> </textarea>
              </div>
              <div style="width:300px;margin-left: 5px">
              <label>Кількість</label>
              <select name="sum_number" class="form-control select2" style="width: 20%;">
                   <option>-</option>
                   <option > 1</option>
                   <option > 2</option>
                   <option > 3</option>
                   <option > 4</option>
                   <option > 5</option>
                   <option > 6</option>
                   <option > 7</option>
                   <option > 8</option>
                   <option > 9</option>
                  </select>   
              </div>
              <p></p>
     {!! Form::submit('Відправити', ['class' => 'btn btn-secondary btn-lg btn-block']) !!}
       </div>
  </form>  
 
@endsection

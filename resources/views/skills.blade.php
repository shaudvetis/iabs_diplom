@extends('layouts.base')
@include('layouts.instruction.intern.skills')
@section('content')
<style>
table{
    font-size: 15pt;
}    

</style>

<!-- SELECT2 EXAMPLE -->
    <div class="card card-info">

        <div class="card-header">

             <h3>Перелік практичних навичок, якими повинен володіти лікар-хірург після закінчення інтернатури</h3><!-- SELECT2 EXAMPLE -->
 
</div>
</div>

<!-- Шапка категории -->

    <a class="btn-light dropdown-toggle btn-lg btn-block text-sm-left" data-toggle="collapse" href="#collapseID" aria-expanded="true" aria-label="Close" aria-controls="collapseID" align="left">
 <strong>  Введення в хірургію</strong><i class="btn btn-tool"></i>
    </a>

       <!-- Шапка уточнения -->
<div class="card-body p-0">

    <!-- Содержание категории -->
<table class="table table-striped">
<tr id="collapseID" class="collapse in" role="tabpanel" aria-labelledby="headingID">
<th style="width: 30px">№</th>
<th style="width: 300px">Назва маніпуляції</th> 
<th style="width: 300px">Ступінь оволодіння</th>
<!-- th style="width: 40px">Уточнення th -->
</tr>
        <!-- Шапка категории -->
<tr id="collapseID" class="collapse in" role="tabpanel" aria-labelledby="headingID">
    <tr id="collapseID" class="collapse in" role="tabpanel" aria-labelledby="headingID">
    <td><strong>Медична документація</strong></td>
</tr>
<tr id="collapseID" class="collapse in" role="tabpanel" aria-labelledby="headingID">
   <td>1</td>
   <td>Вимоги до написання та заповнення щоденника хворого та протоколу операції (оцінка записів в медичній карти стаціонарного хворого та  представлених зразків протоколів операції)</td>
   <td><span class="badge bg-warning">Вміти</span></td>
</tr>
<tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    <td>2.</td>
    <td>Написання посмертного епікризу на хірургічного хворого (за наданою медичною картою померлого)</td>
    <td><span class="badge bg-warning">Вміти</span></td>
</tr>
<tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    <td>3.</td>
    <td>Заповнення медичної документації на ЛКК та МСЕК</td>
    <td><span class="badge bg-warning">Вміти</span></td>
</tr>

    <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
        <th>Лапароскопічна хірургія</th>
    </tr>
    <tr id="collapseID" class="collapse in" role="tabpanel" aria-labelledby="headingID">
    <td>1.</td>
    <td>Підготовка відеоендоскопічного комплексу до роботи</td>
    <td><span class="badge bg-warning">Вміти</span></td>
</tr>
<tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    <td>2.</td>
    <td>Техніка маніпулювання основними хірургічними інструментами з переміщення дрібних предметів (норматив 20 горошин за 70 сек)</td>
    <td><span class="badge bg-warning">Вміти</span></td>
</tr>
<tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    <td>3.</td>
    <td>Техніка роботи з відеокамерою (контроль введення інструментів, утримання «горизонту», демонстрація об’єкту спостереження під різними кутами й утримання його у центрі монітору</td>
    <td><span class="badge bg-warning">Вміти</span></td>
</tr>
<tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    <th>Основи хірургічної діяльності</th>
</tr>
<tr id="collapseID" class="collapse in" role="tabpanel" aria-labelledby="headingID">
    <td>1.</td>
    <td>Виконання хірургічної антисептичної обробки рук</td>
    <td><span class="badge bg-warning">Вміти</span></td>
</tr>
<tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    <td>2.</td>
    <td>Виконання антисептичної обробки операційного поля</td>
    <td><span class="badge bg-success">Володіти</span></td>
</tr>
<tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    <td>3.</td>
    <td>Виконання прошивання та зав’язування трьох вузлів</td>
    <td><span class="badge bg-success">Володіти</span></td>
</tr>
</table>
</div>
<hr>

<a  class="btn btn-light btn-lg dropdown-toggle btn-block text-sm-left" data-toggle="collapse" href="#collapseIDpl">
<strong>Хірургія  органів черевної порожнини та передньої черевної стінки</strong><i class="btn btn-tool"></i>
</a>
<div class="card-body p-0" >
<table class="table table-striped">
<tr id="collapseIDpl" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                    <th style="width: 30px">#</th>
                    <th style="width: 300px">Назва маніпуляції</th> 
                    <th style="width: 300px">Ступінь оволодіння</th>
                    </tr>

                     <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <div class="panel-body">
                     <td>1.</td>
                     <td>Перев’язки</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>
             <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">          
          
                     <td>2.</td>
                     <td>Введення троакарів в черевну порожнину</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                  </tr>

            <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">        
      
                     <td>3.</td>
                     <td>Група крові та сумісність</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                  </tr>

            <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">       
     
                     <td>4.</td>
                     <td>Накладання пневмоперитонеума</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                  </tr>
             
             <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">        

                     <td>5.</td>
                     <td>Оглядові рентгенограми черевної та грудної порожнин</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                  </tr>
            
            <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">           
  
                     <td>6.</td>
                     <td>Накладання швів на шкіру</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                  </tr>
            
            <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">           
    
                     <td>7.</td>
                     <td>Антисептична обробка операційного поля</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                  </tr>

            <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            
       
                     <td>8.</td>
                     <td>Введення дренажів в черевну порожнину</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                  </tr>
            <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            
        
                     <td>9.</td>
                     <td>Лапароскопія</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                  </tr>
                   <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            
        
                     <td>10.</td>
                     <td>Введення зонду для харчування</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                  </tr>

                  <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                  <td>11.</td>
                     <td>Закрита інтубація кишечнику</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                  </tr>
              </table>
              </div>
<hr>

<a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDtk">
<strong>Торакальна хірургія</strong><i class="btn btn-tool"></i>
</a>

<div class="card-body p-0" >
<table class="table table-striped">
<tr id="collapseIDtk" class="collapse in" role="tabpanel" aria-labelledby="headingID">
<th style="width: 30px">#</th>
<th style="width: 300px">Назва маніпуляції</th> 
<th style="width: 300px">Ступінь оволодіння</th>
</tr>
<tr id="collapseIDtk" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">

<td>1.</td>
<td>Перев’язки</td>
<td><span class="badge bg-warning">Вміти</span></td>
<tr id="collapseIDtk" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">

<td>2.</td>
<td>Санація емпіємної порожнини</td>
<td><span class="badge bg-warning">Вміти</span></td></tr>
<tr id="collapseIDtk" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
 <td>3.</td>
<td>Оглядові R-грами грудної клітини</td>
 <td><span class="badge bg-warning">Вміти</span></td>
 </tr>

            <tr id="collapseIDtk" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">

 
                     <td>4.</td>
                     <td>Пункція плевральної порожнини</td>
                     <td><span class="badge bg-warning">Вміти</span></td></th>

            <tr id="collapseIDtk" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">

       
                     <td>5.</td>
                     <td>Торакоцентез, дренування плевральної порожнини</td>
                     <td><span class="badge bg-warning">Вміти</span></td>

            <tr id="collapseIDtk" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">

        
                     <td>6.</td>
                     <td>Блокада міжреберна, субплевральна, паравертебральна</td>
                     <td><span class="badge bg-warning">Вміти</span></td>


            <tr id="collapseIDtk" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
</tr>
</table>
</div>

<hr>
<a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDpr"><strong>Проктологія</strong><i class="btn btn-tool"></i>
</a>
<div class="card-body p-0" >
<table class="table table-striped">
<tr id="collapseIDpr" class="collapse in" role="tabpanel" aria-labelledby="headingID">
<th style="width: 30px">#</th>
<th style="width: 300px">Назва маніпуляції</th> 
<th style="width: 300px">Ступінь оволодіння</th>
</tr>
<tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
<td>1.</td>
<td>Пальцеве обстеження прямої кишки</td>
<td><span class="badge bg-warning">Вміти</span></td>
</tr>

                    <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          
                     <td>2.</td>
                     <td>Дослідження прямої кишки  дзеркалом</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    
                     <td>3.</td>
                     <td>Ректороманоскопія</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                     <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          
                     <td>4.</td>
                     <td>Місцеве знеболення при операціях на анальному каналі</td>
                    <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>
    
                    <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            
                     <td>5.</td>
                     <td>Накладання   калоприймача</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            
                     <td>6.</td>
                     <td>Зондове дослідження прямокишкових нориць / Фарбова проба при норицях</td>
                     <td><span class="badge bg-warning">Вміти
                        
                     </span></td>
                     </tr>
                    </tr>
</table>
</div>

<hr>
<a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDgn"><strong>Гнійна хірургія</strong><i class="btn btn-tool"></i>
</a>
<div class="card-body p-0" >
<table class="table table-striped">
<tr id="collapseIDgn" class="collapse in" role="tabpanel" aria-labelledby="headingID">
<th style="width: 30px">#</th>
<th style="width: 300px">Назва маніпуляції</th> 
<th style="width: 300px">Ступінь оволодіння</th>
<tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <div class="panel-body">
                     <td>1.</td>
                     <td>Проведення бакпосіву з рани</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>
                    <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>2.</td>
                     <td>Проведення зіскоблення при підозрі на кандидомікоз</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>3.</td>
                     <td>Принципи обробка та дренування гнійних хірургічних ран</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                     <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>4.</td>
                     <td>Вакумна терапія гнійних ран (VAC-терапія)</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>
    
                    <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          
                     <td>5.</td>
                     <td>Спосіб проточно-промивного дренування та обробка гнійної рані пульсуючою струєю</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          
                     <td>6.</td>
                     <td>Пункція та розтин гнояків при гнійних захворюваннях кисті / стопи</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                    <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          
                     <td>7.</td>
                     <td>ПХО ран</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                     <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          
                     <td>8.</td>
                     <td>Лазерна та ультразвукова обробка гнійної рані</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                       <td>9.</td>
                     <td>Місцеве знеболення при гнійних захворюваннях кисті </td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>10.</td>
                     <td>Розрахунок дози інсуліну у хірургічних хворих</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

</table>
</div>
<hr>
<a class="btn btn-light dropdown-toggle-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDsd" aria-expanded="true" aria-controls="collapseID">
<strong>Судинна хірургія</strong><i class="btn btn-tool"></i>
</a>

<div class="card-body p-0" >
<table class="table table-striped">
<tr id="collapseIDsd" class="collapse in" role="tabpanel" aria-labelledby="headingID">
<th style="width: 30px">#</th>
<th style="width: 300px">Назва маніпуляції</th> 
<th style="width: 300px">Ступінь оволодіння</th>
   <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">  
                     <div class="panel-body">
                     <td>1.</td>
                     <td>Визначення стану клапанного апарату магістральних вен</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>2.</td>
                     <td>Визначення стану клапанного апарату перфорантних вен</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                     </tr>

                    <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>3.</td>
                     <td>Проби при варикозній хворобі</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                     <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>4.</td>
                     <td>Проби при облітеруючих захворюваннях</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                     <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <td>5.</td>
                     <td>УЗ Доплерографія (показання до призначення, особливості виконання, патогномонічні зміни)</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <td>6.</td>
                     <td>КТ ангіографія (показання до призначення, особливості виконання, патогномонічні зміни)</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                      <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <td>7.</td>
                     <td>Обгрунтування призначення антикоагулянтної терапії (призначення, розрахунок дози та скасування антикоагулянтів)</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>
                      <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">                     
                     <td>8.</td>
                     <td>Визначення Лодижечно-Плечевого Індексу (ЛПІ)  та  Пальце-Плечевого Індексу  (ППІ)</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>
                     <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <td>9.</td>
                     <td>Визначення температурної, тактильної, больової та вібраційної чутливості</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>
                     <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <td>10.</td>
                     <td>Реовазографія</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>                     
                    </table>
                </div>
<hr>
<a class="btn btn-light dropdown-toggle-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDen" aria-expanded="true" aria-controls="collapseID"><strong>
Ендокринна хірургія</strong><i class="btn btn-tool"></i>
</a>

<div class="card-body p-0" >
<table class="table table-striped">
<tr id="collapseIDen" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                    <th style="width: 30px">#</th>
                    <th style="width: 300px">Назва маніпуляції</th> 
                    <th style="width: 300px">Ступінь оволодіння</th>
                     
                     <tr id="collapseIDen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                      <div class="panel-body">            
                     <td>1.</td>
                     <td>Пальпація щитоподібної залози</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
         
                     <td>2.</td>
                     <td>Пальпація лімфовузлів шиї</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
         
                     <td>3.</td>
                     <td>Біопсія щитоподібної залози</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>
                 </table>
             </div>

<hr>
<a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDop" aria-expanded="true" aria-controls="collapseID"><strong>
 Комбустіологія та пластична хірургія</strong><i class="btn btn-tool"></i>
</a>

<div class="card-body p-0" >
<table class="table table-striped">
<tr id="collapseIDop" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                    <th style="width: 30px">#</th>
                    <th style="width: 300px">Назва маніпуляції</th> 
                    <th style="width: 300px">Ступінь оволодіння</th>
                     
                     <tr id="collapseIDop" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
              
                     <td>1.</td>
                     <td>Визначення глибини та площі опіку</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDop" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>2.</td>
                     <td>Визначення Індексу тяжкості ураження</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDop" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>3.</td>
                     <td>Проведення дренуючих операцій (некротомій) при глибоких опіках та
                     відмороженнях</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                     <tr id="collapseIDop" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <td>4.</td>
                     <td>Розмітка розрізів з урахуванням ліній Лангера на обличчі, тулубі та
                     кінцівках</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDop" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <td>5.</td>
                     <td>Особливості ПХО опікових ран</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                     <tr id="collapseIDop" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <td>6.</td>
                     <td>Складання плану реабілітаційних заходів після пластичних втручань</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>
                  </table>
               </div>
<hr>

<a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDtr" aria-expanded="true" aria-controls="collapseID"><strong>
                     Травматологія</strong><i class="btn btn-tool"></i></a>
                    
                    

                     <div class="card-body p-0" >
                    <table class="table table-striped">
            
                    <tr id="collapseIDtr" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                    <th style="width: 30px">#</th>
                    <th style="width: 300px">Назва маніпуляції</th> 
                    <th style="width: 300px">Ступінь оволодіння</th>
                     
                     <tr id="collapseIDtr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            
                     <td>1.</td>
                     <td>Вправлення вивихів плеча і стегна</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDtr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>2.</td>
                     <td>Репозиція кісткових уламків при нескладних переломах кісток кінцівок</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                    <tr id="collapseIDtr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>3.</td>
                     <td>Гіпсова іммобілізація при переломах кісток</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDtr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            
                     <td>4.</td>
                     <td>Накладання скелетного витягу</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                    <tr id="collapseIDtr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>5.</td>
                     <td>Пункція колінного суглобу</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>
</table>
</div>

<hr>
<a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDgin"><strong>Гінекологія</strong><i class="btn btn-tool"></i>
</a>

<div class="card-body p-0" >
<table class="table table-striped">
            
                    <tr id="collapseIDgin" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                    <th style="width: 30px">#</th>
                    <th style="width: 300px">Назва маніпуляції</th> 
                    <th style="width: 300px">Ступінь оволодіння</th>
                     
                     <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                        
                     <td>1.</td>
                     <td>Вагінальне обстеження</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                     <td>2.</td>
                     <td>Пункція заднього склепіння піхви</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                    <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          
                     <td>3.</td>
                     <td>Гемодинамічні проби на гестоз</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                     </tr>

                    <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                   <td>4.</td>
                     <td>Проба на скриті набряки</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                     </tr>

                    <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          
                     <td>5.</td>
                     <td>Проба на мембраноліз</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                     </tr>

                    <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    
                     <td>6.</td>
                     <td>Проба на порушення мікроциркуляції</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                     </tr>

</table>
</div>

<hr>
<a class="btn btn-light  dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDyr" aria-expanded="true" aria-controls="collapseID"><strong>
Невідкладна урологія</strong><i class="btn btn-tool"></i>
</a>

<div class="card-body p-0" >
<table class="table table-striped">
            
                    <tr id="collapseIDyr" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                    <th style="width: 30px">#</th>
                    <th style="width: 300px">Назва маніпуляції</th> 
                    <th style="width: 300px">Ступінь оволодіння</th>

                     <tr id="collapseIDyr" class="collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
              
                     <td>1.</td>
                     <td> Пальпація нирок і сечового міхура </td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>2.</td>
                     <td>Пальцеве дослідження прямої кишки та передміхурової залози</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>3.</td>
                     <td>Катетеризація сечового міхура </td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>4.</td>
                     <td>Уретроцистоскопія</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>  

                    <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>5.</td>
                     <td>Екскреторна урографія</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>6.</td>
                     <td>Цистографія / Уретрографія</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                     <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>7.</td>
                     <td>Блокада сім'яного канатика (за Лорін-Епштейном)</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                  </tr>

                     <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>8.</td>
                     <td>Ведення хворих з дренажами сечового міхура</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                  </tr>

                  <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>9.</td>
                     <td>Ведення хворих з нефростомою</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                  </tr>

                  <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            <div class="panel-body">
                     <td>10.</td>
                     <td>Ведення хворих з постійним уретральним катетером</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                  </tr>
             </table>
</div>
<hr>
<a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDch" aria-expanded="true" aria-controls="collapseID"><strong>
Дитяча хірургія</strong>
</a>
<div class="card-body p-0" >
<table class="table table-striped">
<tr id="collapseIDch" class="collapse in" role="tabpanel" aria-labelledby="headingID">
<th style="width: 30px">#</th>
<th style="width: 300px">Назва маніпуляції</th> 
<th style="width: 300px">Ступінь оволодіння</th>
<tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
<div class="panel-body">
                     
                     <td>1.</td>
                     <td>Пункція плевральної порожнини у дітей</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                    <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          
                     <td>2.</td>
                     <td>Пункція суглобів</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                     </tr>

                    <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    
                     <td>3.</td>
                     <td>Зондування стравоходу та шлунку при вадах розвитку</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                     </tr>

                    <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
        
                     <td>4.</td>
                     <td>Діагностична та лікувальна консервативна дезінвагінація</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                    <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
       
                     <td>5.</td>
                     <td>Особливості проведення клізм у дітей різного віку</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>
                 </table>
                 </div>
<hr>

<a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDon"><strong>
Онкологія</strong><i class="btn btn-tool"></i></a>
<div class="card-body p-0" >
<table class="table table-striped">
<tr id="collapseIDon" class="collapse in" role="tabpanel" aria-labelledby="headingID">
<th style="width: 30px">#</th>
<th style="width: 300px">Назва маніпуляції</th> 
<th style="width: 300px">Ступінь оволодіння</th>

                     <tr id="collapseIDon" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                             
                     <td>1.</td>
                     <td>Пункційна біопсія пухлин</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                    <tr id="collapseIDon" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
        
                     <td>2.</td>
                     <td>Мамографія</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                     </tr>
</table>
</div>

<hr>
<a class="btn btn-light  dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDas" aria-expanded="true" aria-controls="collapseID"><strong>
Амбулаторна хірургія</strong><i class="btn btn-tool"></i>
</a>

<div class="card-body p-0" >
                    <table class="table table-striped">
            
                    <tr id="collapseIDas" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                    <th style="width: 30px">#</th>
                    <th style="width: 300px">Назва маніпуляції</th> 
                    <th style="width: 300px">Ступінь оволодіння</th>

                     <tr id="collapseIDas" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
         
                     
                     <td>1.</td>
                     <td>Заповнення лікарняного листка</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>

                    <tr id="collapseIDas" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    
                     <td>2.</td>
                     <td>Оформлення медичної документації лікаря хірургічного кабінету полікліники</td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>
                 </table>
             </div>
<hr>     
<a class="btn btn-light  dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDks" aria-expanded="true" aria-controls="collapseID"><strong>
Кардіохірургія</strong><i class="btn btn-tool"></i>
</a>

<div class="card-body p-0" >
                    <table class="table table-striped">
            
                    <tr id="collapseIDks" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                    <th style="width: 30px">#</th>
                    <th style="width: 300px">Назва маніпуляції</th> 
                    <th style="width: 300px">Ступінь оволодіння</th>
                     

                     <tr id="collapseIDks" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           <div class="panel-body">
                     
                     <td>1.</td>
                     <td>Визначення серцевого поштовху, меж серця та аускультація клапанів серця </td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr> 

                    <tr id="collapseIDks" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
  
                     <td>2.</td>
                     <td>Визначення центрального венозного тиску </td>
                     <td><span class="badge bg-warning">Вміти</span></td>
                     </tr>
                    
                    <tr id="collapseIDks" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
      
                     <td>3.</td>
                     <td>Перев*язка кардіохірургічних хворих</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                    <tr id="collapseIDks" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
    
                     <td>4.</td>
                     <td>Пункція перикарду на введення лікарських препаратів (на манекені)</td>
                     <td><span class="badge bg-success">Володіти</span></td>
                     </tr>

                    <tr id="collapseIDks" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
       
                     <td>5.</td>
                     <td>Маніпуляції при зупинці серця (непрямий масаж серця, штучне дихання та дефібриляція)</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                     </tr>
                     <tr id="collapseIDks" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                     <td>6.</td>
                     <td>Надання медичної допомоги при кардіогенному шоці, ТЕЛА та раптовій зупинці серця</td>
                     <td><span class="badge bg-primary">Ознайомлен</span></td>
                     </tr>                     
</table>
</div>
</div>

              

@endsection

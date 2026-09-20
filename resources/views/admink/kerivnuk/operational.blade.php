@extends('layouts.baseteacher')
@include('layouts.instruction.kerivnuk.xirurg')
@section('content')

<td colspan="2" >
    <div class="card card-info">

        <div class="card-header">

     <h3>Перелік оперативних втручань, якими повинен володіти лікар-хірург після закінчення інтернатури</h3><!-- SELECT2 EXAMPLE -->
 
</div>
</div>

    <a   class="btn btn-light dropdown-toggle  btn-lg btn-block text-sm-left" data-toggle="collapse" href="#collapseID" aria-expanded="true" aria-controls="collapseID">
    <strong>Xірургічне відділення (невідкладна хірургія)</strong><i class="btn btn-tool"></i></a>

    <div class="card-body p-0">
        <table class="table table-striped">
            <tr id="collapseID" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                <th style="width: 30px">#</th>
                <th style="width: 300px">Назва маніпуляції</th> 
                <th style="width: 300px">Ступінь оволодіння</th>
            </tr>
            <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
                    <td>1.</td>
                    <td>Типова апендектомія</td>
                    <td><span class="badge bg-warning">Вміти</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>2.</td>
                    <td>Ретроградна апендектомія</td>
                    
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>
                
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>3.</td>
                    <td>Розкриття періапендикулярного абсцесу</td>

                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>

                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>4.</td>
                    <td>Зашивання проривної виразки шлунка і 12-палої кишки</td>
                    
                    <td><span class="badge bg-warning">Вміти</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>5.</td>
                    <td>Пілоропластика в поєднанні зі стовбуровою ваготомією</td>

                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>6.</td>
                    <td>Гастро-, дуоденотомія, прошивання кровоточивої судини у виразці</td>
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>7.</td>
                    <td>Операції при защемлених грижах</td>

                    <td><span class="badge bg-warning">Вміти</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>8.</td>
                    <td>Гастротомія. Прошивання варикозно-розширених вен стравоходу</td>
                    
                    <td><span class="badge bg-primary">Ознайомлен</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>9.</td>
                    <td>Розвантажуюча інтубація тонкої кишки</td>

                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>10.</td>
                    <td>Роз’єднання зрощень при злуковій кишковій непрохідності</td>
                    
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>11.</td>
                    <td>Лапаротомія при перитонітах, дренування черевної порожнини</td>

                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>

                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>12.</td>
                    <td>Інтраперитонеальний лаваж</td>
                    
                    <td><span class="badge bg-primary">Ознайомлен</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>13.</td>
                    <td>Розкриття міжпетлевих абсцесів</td>

                    <td><span class="badge bg-success">Володіти
                    </span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>14.</td>
                    <td>Розкриття абсцесу Дугласового простору</td>                    
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>15.</td>
                    <td>Розкриття піддіафрагмального абсцесу</td>
                    
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>

                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>16.</td>
                    <td>Дренування сальникової сумки при панкреатитах</td>
                    
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>17.</td>
                    <td>Секвестректомія і резекція підшлункової залози</td>
                    
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>

                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>18.</td>
                    <td>Дренування заочеревинного простору</td>
                    
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>
                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>19.</td>
                    <td>Спленектомія</td>
                    
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>

                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>20.</td>
                    <td>Зашивання рани печінки</td>
                    
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>

                <tr id="collapseID" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>21</td>
                    <td>Зашивання пошкоджень кишок</td>
                    
                    <td><span class="badge bg-success">Володіти</span></td>
                </tr>
</table>
</div>
<hr>
<a  class="btntest btn-light dropdown-toggle btn-lg btn-block" data-toggle="collapse" href="#collapseIDpl" aria-expanded="true" aria-controls="collapseIDpl"><strong>
 Xірургічне відділення (планова хірургія)</strong><i class="btn btn-tool"></i></a>
       
<div class="card-body p-0" >
<table class="table table-striped">
 <tr id="collapseIDpl" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                            <th style="width: 30px">#</th>
                            <th style="width: 300px">Назва маніпуляції</th> 
                            <th style="width: 300px">Ступінь оволодіння</th>
                        </tr>

                        <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                         <!--   <div class="panel-body">-->
                              <td>1.</td>
                              <td>Ентеротомія, резекція тонкої кишки</td>
                              <td><span class="badge bg-success">Володіти
                              </span></td>
                          </tr>


                          <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                             
                              <td>2.</td>
                              <td>Лапароскопічна холецистектомія</td>
                              <td><span class="badge bg-primary">Ознайомлен</span></td>
                          </tr>

                          <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                             
                              <td>3.</td>
                              <td>Холецистостомія</td>
                              <td><span class="badge bg-success">Володіти</span></td>
                          </tr>

                          <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                             
                 
                              <td>4.</td>
                              <td>Холецистектомія „від дна”, „від шийки”</td>
                              <td><span class="badge bg-success">Володіти
                              </span></td>
                          </tr>
                          
                          <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                             
            
                              <td>5.</td>
                              <td>Холедохотомія і холедохостомія</td>
                              <td><span class="badge bg-success">Володіти
                              </span></td>
                          </tr>
                          
                          <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                             
                              <td>6.</td>
                              <td>Накладання біліодигестивних анастомозів</td>
                              <td><span class="badge bg-primary">Ознайомлен</span></td>
                          </tr>
                          
                          <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                             
             
                              <td>7.</td>
                              <td>Дуоденотомія, папілотомія, папілопластика</td>
                              <td><span class="badge bg-primary">Ознайомлен</span></td>
                          </tr>

                          <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                             
                 
                              <td>8.</td>
                              <td>Операція при кістах підшлункової залози: марсупілізація, внутрішнє дренування</td>
                              <td><span class="badge bg-primary">Ознайомлен</span></td>
                          </tr>
                          <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                             
                   
                              <td>9.</td>
                              <td>Резекція шлунка за Більрот-1, Більрот-2</td>
                              <td><span class="badge bg-primary">Ознайомлен</span></td>
                          </tr>

                          <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
                    
                               <td>10.</td>
                               <td>Селективна проксимальна ваготомія</td>
                               <td><span class="badge bg-primary">Ознайомлен</span></td>
                           </tr>

                           <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
              
                               <td>11.</td>
                               <td>Операції при грижах стравохідного отвору діафрагми</td>
                               <td><span class="badge bg-success">Володіти</span></td>
                           </tr>

                           <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
            
                               <td>12.</td>
                               <td>Операції при грижах білої лінії живота</td>
                               <td><span class="badge bg-warning">Вміти</span></td>
                           </tr>

                           <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
            
                               <td>13.</td>
                               <td>Операції при пахвинних грижах</td>
                               <td><span class="badge bg-warning">Вміти</span></td>
                           </tr>

                           <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
              
                               <td>14.</td>
                               <td>Операції при стегнових грижах</td>
                               <td><span class="badge bg-warning">Вміти</span></td>
                           </tr>

                           <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">

                               <td>15.</td>
                               <td>Операції при післяопераційних грижах</td>
                               <td><span class="badge bg-success">Володіти</span></td>
                           </tr>

                           <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
       
                               <td>16.</td>
                               <td>Резекція шлунка при раку</td>
                               <td><span class="badge bg-primary">Ознайомлен</span></td>
                           </tr>

                           <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
     
                               <td>17.</td>
                               <td>Проксимальна резекція шлунка</td>
                               <td><span class="badge bg-primary">Ознайомлен</span></td>
                           </tr>
                           <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
  
                               <td>18.</td>
                               <td>Гастректомія</td>
                               <td><span class="badge bg-primary">Ознайомлен</span></td>
                           </tr>
                           <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
  
                               <td>19.</td>
                               <td>Гастротомія</td>
                               <td><span class="badge bg-warning">Володіти</span></td>
                           </tr>

                           <tr id="collapseIDpl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
       
                               <td>20.</td>
                               <td>Гастроентеротомія</td>
                               <td><span class="badge bg-success">Володіти</span></td>
                           </tr>
           </table>
           </div>
           <hr>                
                        
                            <a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left "  data-toggle="collapse" href="#collapseIDpr" aria-expanded="true" aria-controls="collapseID">
                               <strong> Проктологія</strong><i class="btn btn-tool"></i>
                            </a>
                     
                    </hr>
                    <div class="card-body p-0" >
                        <table class="table table-striped">
                            <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                                <th style="width: 10px">#</th>
                                <th>Назва маніпуляції</th> 
                                <th style="width: 600px">Ступінь оволодіння</th>
                            </tr>
                            
                            <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
                              <td>1.</td>
                              <td>Ілеотрансверзостомія</td>
                              <td><span class="badge bg-success">Володіти</span></td>
                          </tr>

                          <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
                              <td>2.</td>
                              <td>Цеко-, трансверзо-, сигмостомія</td>
                              <td><span class="badge bg-success">Володіти</span></td>
                          </tr>

                          <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
                              <td>3.</td>
                              <td>Операції при геморої</td>
                              <td><span class="badge bg-success">Володіти</span></td>
                          </tr>

                          <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
                              <td>4.</td>
                              <td>Правобічна і лівобічна геміколектомія.</td>
                              <td><span class="badge bg-primary">Ознайомлен</span></td>
                          </tr>
                          
                          <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
                              <td>5.</td>
                              <td>Резекція поперечно-ободової кишки</td>
                              <td><span class="badge bg-primary">Ознайомлен</span></td>
                          </tr>

                          <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                           
                              <td>6.</td>
                              <td>Резекція сигмовидної кишки</td>
                              <td><span class="badge bg-primary">Ознайомлен</span></td>
                          </tr>

                          <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
                              <td>7.</td>
                              <td>Операція Гартмана</td>
                              <td><span class="badge bg-success">Ознайомлен</span></td>
                          </tr>

                          <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                            
                              <td>8.</td>
                              <td>Екстирпація прямої кишки</td>
                              <td><span class="badge bg-primary">Ознайомлен</span></td>
                          </tr>

                          <tr id="collapseIDpr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                           
                              <td>9.</td>
                              <td>Місцеве знеболення при операціях на анальному каналі</td>
                              <td><span class="badge bg-warning">Вміти</span></td>
                          </tr>
</table>
</div>

<hr>

   <a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDen" aria-expanded="true" aria-controls="collapseID">
                           <strong> Ендокринна хірургія</strong><i class="btn btn-tool"></i></a>
                      
                    </hr>

                    <div class="card-body p-0" >
                        <table class="table table-striped">
                            
                            <tr id="collapseIDen" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                                <th style="width: 10px">#</th>
                                <th>Назва маніпуляції</th> 
                                <th style="width:600px">Ступінь оволодіння</th>
                                
                                <tr id="collapseIDen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                                    
                                       <td>1.</td>
                                       <td>Субтотальна резекція щитоподібної залози</td>
                                       <td><span class="badge bg-primary">Ознайомлен</span></td>
                                   </tr>
</table>
</div>

<hr>
<a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDsd" aria-expanded="true" aria-controls="collapseID">
                              <strong>Судинна хірургія</strong><i class="btn btn-tool"></i></a>
           </hr>

                            <div class="card-body p-0" >
                                <table class="table table-striped">
                                    
                                    <tr id="collapseIDsd" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                                        <th style="width: 10px">#</th>
                                        <th>Назва маніпуляції</th> 
                                        <th style="width: 600px">Ступінь оволодіння</th>
                                        
                                        <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                                                                                          
                                               <td>1.</td>
                                               <td>Операції при варикозному розширенні вен нижньої кінцівки: Маделунга, Нарата, Бебкока, Кляппа </td>
                                               <td><span class="badge bg-warning">Володіти</span></td>
                                           </tr>

                                           <tr id="collapseIDsd" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                                 
                                               <td>2.</td>
                                               <td>Операція Лінтона-Кокета</td>
                                               <td><span class="badge bg-warning">Володіти</span></td>
                                           </tr>
    </table>
  </div>

<hr>
 <a class="btn btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDop" aria-expanded="true" aria-controls="collapseID">
                                      <strong>Опікове відділення</strong><i class="btn btn-tool"></i></a>
                                

                                    <div class="card-body p-0" >
                                        <table class="table table-striped">
                                            
                                            <tr id="collapseIDop" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                                                <th style="width: 10px">#</th>
                                                <th>Назва маніпуляції</th> 
                                                <th style="width:600px"><strong>Ступінь оволодіння</strong></th>
                                                
                                                <tr id="collapseIDop" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                                                                                                          
                                                       <td>1.</td>
                                                       <td>Первинна хірургічна обробка опіків</td>
                                                       <td><span class="badge bg-success">Володіти</span></td>
                                                   </tr>

                                                   <tr id="collapseIDop" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                                                  
                                                       <td>2.</td>
                                                       <td>Пересадка шкіри</td>
                                                       <td><span class="badge bg-success">Володіти</span></td>
                                                   </tr>
                                    </table>
                                  </div>
<hr>
   <a class="btn dropdown-toggle btn-light btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDtor" aria-expanded="true" aria-controls="collapseID">
       <strong>Торакальна хірургія</strong><i class="btn btn-tool"></i></a>
                                         
                       <div class="card-body p-0" >
             <table class="table table-striped">
             <tr id="collapseIDtor" class="collapse in" role="tabpanel" aria-labelledby="headingID">
                   <th style="width: 10px">#</th>
                     <th>Назва маніпуляції</th> 
             <th style="width:600px">Ступінь оволодіння</th>
                                                 
 <tr id="collapseIDtor" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                                                                
              <td>1.</td>
  <td>Операції при пневмотораксі, гідропневмотораксі</td>
<td><span class="badge bg-success">Володіти</span></td>
                              </tr>
             <tr id="collapseIDtor" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">

        <td>2.</td>
  <td>Операції при проникаючих травмах грудної клітини</td>
   <td><span class="badge bg-success">Володіти</span></td>
     </tr>
            <tr id="collapseIDtor" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
         
                      <td>3.</td>
    <td>Торакотомія</td>
   <td><span class="badge bg-success">Володіти</span></td>
         </tr>
  </table>
</div>
 <hr>
  <a class="btn dropdown-toggle btn-light btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDgn" aria-expanded="true" aria-controls="collapseID">
      <strong> Гнійна хірургія</strong><i class="btn btn-tool"></i></a>

  <div class="card-body p-0" >
        <table class="table table-striped">
        <tr id="collapseIDgn" class="collapse in" role="tabpanel" aria-labelledby="headingID">
             <th style="width: 10px">#</th>
              <th>Назва маніпуляції</th> 
              <th style="width: 600px">Ступінь оволодіння</th>
              
     <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                             <td>1.</td>
                               <td>Секвестректомія</td>
        <td><span class="badge bg-success">Володіти</span></td>
                        </tr>
       <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                    <td>2.</td>
       <td>Операції при бурситах</td>
 <td><span class="badge bg-success">Володіти</span></td>
        </tr>
     <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
              <td>3.</td>
 <td>Ампутація кінцівок</td>
                       <td><span class="badge bg-success">Володіти</span></td>
                                 </tr>
  <tr id="collapseIDgn" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
      
        <td>4.</td>
           <td>Розтин абсцесу</td>
     <td><span class="badge bg-warning">Вміти</span></td>
             </tr>
 </table>
 </div>
 <hr>
<a class="btn dropdown-toggle btn-light btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDyr" aria-expanded="true" aria-controls="collapseID">
 <strong>    Урологічне відділення</strong><i class="btn btn-tool"></i>
            </a>
    
                 <div class="card-body p-0" >
     <table class="table table-striped">
    <tr id="collapseIDyr" class="collapse in" role="tabpanel" aria-labelledby="headingID">
 <th style="width: 10px">#</th>
       <th>Назва маніпуляції</th> 
     <th style="width: 600px">Ступінь оволодіння</th>
      <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
        
             <td>1.</td>
          <td>Епіцистостомія</td>
      <td><span class="badge bg-success">Володіти</span></td>
         </tr>
      <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                 
          <td>2.</td>
    <td>Операції при водянках яєчка і сім’яного канатику</td>
      <td><span class="badge bg-success">Володіти</span></td>
           </tr>
    <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
       
            <td>3.</td>
      <td>Операції при варикозному розширенні вен сім’яного канатика</td>
         <td><span class="badge bg-success">Володіти</span></td>
                              </tr>
                                 <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
   
       <td>4.</td>
       <td>Зашивання ран сечового міхура</td>
    <td><span class="badge bg-success">Володіти</span></td>
                       </tr>
   <tr id="collapseIDyr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
   
           <td>5.</td>
    <td>Розкриття паранефриту</td>
  <td><span class="badge bg-success">Володіти</span></td>       </tr>
</table>
</div>

<hr>
    <a class="btn dropdown-toggle btn-light btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDgin" aria-expanded="true" aria-controls="collapseID">
   <strong> Гінекологічне відділення</strong><i class="btn btn-tool"></i></a>
     
  <div class="card-body p-0" >
         <table class="table table-striped">
        <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          <th style="width: 10px">#</th>
             <th>Назва маніпуляції</th> 
             <th style="width:600px">Ступінь оволодіння</th>
     <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
        
           <td>1.</td>
             <td>Видалення труби при позаматковій вагітності</td>
      <td><span class="badge bg-warning">Вміти</span></td>
                               </tr>
  <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel"belledby="headingID">
       
                                            <td>2.</td>
           <td>Видалення кісти яєчника</td>
        <td><span class="badge bg-warning">Вміти</span></td>
              </tr>
   <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
         
             <td>3.</td>
 <td>Клиновидна резекція яєчника</td>
      <td><span class="badge bg-warning">Вміти</span></td>
         </tr>
          <tr id="collapseIDgin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
     <td>4.</td>
      <td>Хірургічна зупинка гінекологічної та післяпологової кровотечі</td>
 <td><span class="badge bg-primary">Ознайомлен</span></td>
</tr>
</table>
</div>
<hr>
<a class="btnt btn-light dropdown-toggle btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDon" aria-expanded="true" aria-controls="collapseID">
<strong>   Онкологічне відділення</strong><i class="btn btn-tool"></i></a>
     <div class="card-body p-0" >
     <table class="table table-striped">
     <tr id="collapseIDon" class="collapse in" role="tabpanel" aria-labelledby="headingID">
      <th style="width: 10px">#</th>
                 <th>Назва маніпуляції</th> 
      <th style="width: 600px">Ступінь оволодіння</th>
       <tr id="collapseIDon" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           
              <td>1.</td>
     <td>Операції при мастопатіях і доброякісних пухлинах молочної залози</td>
      <td><span class="bade bg-warning">Володіти</span></td>
        </tr>
    <tr id="collapseIDon" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
         
      <td>2.</td>
       <td>Секторальна резекція молочної залози</td>
          <td><span class="badge bg-warning">Ознайомлен</span></td>
     </tr>
   <tr id="collapseIDon" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
         
      <td>3.</td>
      <td>Радикальна мастектомія при раку молочної залози</td>
        <td><span class="badge bg-primary">Ознайомлен</span></td>
                        </tr>
                      </table>
                    </div>
                    <hr>
   

    <a class="btn dropdown-toggle btn-light btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDtr" aria-expanded="true" aria-controls="collapseID">
 <strong>    Травматологічне і нейрохірургічне відділення</strong><i class="btn btn-tool"></i>
             </a>
       <div class="card-body p-0" >
  <table class="table table-striped">
   <tr id="collapseIDtr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
         <th style="width: 10px">#</th>
          <th>Назва маніпуляції</th> 
              <th style="width: 600px">Ступінь оволодіння</th>
         <tr id="collapseIDtr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
                  
                  <td>1.</td>
    <td>Первинна хірургічна обробка ран м’яких тканин</td>
          <td><span class="badge bg-warning">Вміти</span></td>
                         </tr>
  <tr id="collapseIDtr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
            
      <td>2.</td>
   <td>Трепанація черепа</td>
   <td><span class="badge bg-primary">Ознайомлен</span></td>
        
        <tr id="collapseIDtr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
      <td>3.</td>
           <td>Первинна хірургічна обробка проникаючих ран черепа</td>
                <td><span class="badge bg-primary">Ознайомлен</span></td>
                                  </tr>
</table>
</div>
<hr>
      <a class="btn dropdown-toggle btn-light btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDch" aria-expanded="true" aria-controls="collapseID">
<strong>        Поліклініка</strong><i class="btn btn-tool"></i></a></td>
      <div class="card-body p-0" >
         <table class="table table-striped">
                                                                                                                                        
        <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
     <th style="width: 10px">#</th>
      <th>Назва маніпуляції</th> 
       <th style="width: 600px">Ступінь оволодіння</th>
     <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
           <div class="panel-body">
                <td>1.</td>
   <td>Операції при фурункулах, карбункулах, гідраденітах</td>
        <td><span class="badge bg-warning">Вміти</span></td>
            </tr>
        <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
     <div class="panel-body">
          <td>2.</td>
    <td>Розкриття абсцесів підшкірної клітковини</td>
      <td><span class="badge bg-warning">Вміти</span></td>
    </tr>
    <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
         <div class="panel-body">
               <td>3.</td>
  <td>Операції при підшкірному, шкірному панариції, пароніхії</td>
  <td><span class="badge bg-warning">Вміти</span></td>
       </tr>
  <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
 <div class="panel-body">
      <td>4.</td>
  <td>Операції при сухожильному і кістковому панариціях, розкриття гнійників</td>
 <td><span class="badge bg-success">Володіти</span></td>
       </tr>
   <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
   <div class="panel-body">
         <td>5.</td>
    <td>Видалення чужорідних тіл з м’яких тканин</td>
      <td><span class="badge bg-warning">Вміти</span></td>
   </tr>
  <tr id="collapseIDch" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
   <div class="panel-body">
   <td>6.</td>
   <td>Видалення доброякісних пухлин м’яких тканин (атером, ліпом, фібром,гігром)</td>
    <td><span class="badge bg-warning">Вміти</span></td>
       </tr>

</table>
</div>
<hr>

  <a class="btn dropdown-toggle btn-light btn-lg btn-block text-sm-left"  data-toggle="collapse" href="#collapseIDks" aria-expanded="true" aria-controls="collapseID">
  <strong>  Кардіохірургія</strong><i class="btn btn-tool"></i></a></td>
       
                         <div class="card-body p-0" >
      <table class="table table-striped">
      <tr id="collapseIDks" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
        <th style="width: 10px">#</th>
      <th>Назва маніпуляції</th> 
         <th style="width: 600px">Ступінь оволодіння</th>
    <tr id="collapseIDks" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
          <div class="panel-body">
             <td>1.</td>
         <td>Ушивання рани серця</td>
    <td><span class="badge bg-warning">Володіти</span></td>
                                 </tr>
    <tr id="collapseIDks" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingID">
      <div class="panel-body">
         <td>2.</td>
      <td>Операції при проникаючих ранах грудної порожнини та перикарда  </td>
    <td><span class="badge bg-warning">Володіти</span></td>
            </tr>
                </div>
    </table>
       </div>
          
                   @endsection
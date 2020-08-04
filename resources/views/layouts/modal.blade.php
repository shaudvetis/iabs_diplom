<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
<!-- Начало меню справочника -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1==01)     
                 <p>{{$value->name_diagnoses }}</p></a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1==01)))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p> {{$value->name_diagnoses }}</p>  </a>
                 <ul class="nav nav-treeview">
                 <?php $x=$value->gr2; ?>
                    @foreach($ws2 as $value1)
                     @if ($value1->gr2==$x and $value1->gr3!='')
                      <li class="nav-item">
                       <a href="#" class="nav-link"> <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p> </a>
                  </li>
                    @endif
                     @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 2  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1==02)     
                 <p>{{$value->name_diagnoses }}</p>  
    <!-- <i class="right fas fa-angle-left"></i> -->
              </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1==02)))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>
     {{$value->name_diagnoses }}</p>
                 <!--   <i class="right fas fa-angle-left"></i> -->
                </a>
                 <ul class="nav nav-treeview">
<?php $x=$value->gr2; ?>
@foreach($ws2 as $value1)
  @if ($value1->gr2==$x and $value1->gr3!='')
   <li class="nav-item">
                    <a href="#" class="nav-link">
                     <!--  <i class="far fa-dot-circle nav-icon"></i> -->
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" ></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
   @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>

<!-- 3  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1==03)     
                 <p>{{$value->name_diagnoses }}</p>  
    <!-- <i class="right fas fa-angle-left"></i> -->
              </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1==03)))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>
     {{$value->name_diagnoses }}</p>
                 <!--   <i class="right fas fa-angle-left"></i> -->
                </a>
                 <ul class="nav nav-treeview">
<?php $x=$value->gr2; ?>
@foreach($ws2 as $value1)
  @if ($value1->gr2==$x and $value1->gr3!='')
   <li class="nav-item">
                    <a href="#" class="nav-link">
                     <!--  <i class="far fa-dot-circle nav-icon"></i> -->
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
   <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
   @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
      
<!-- 4  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1==03)     
                 <p>{{$value->name_diagnoses }}</p>  
    <!-- <i class="right fas fa-angle-left"></i> -->
              </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1==03)))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p> {{$value->name_diagnoses }}</p>
                     </a>
                 <ul class="nav nav-treeview">
              <?php $x=$value->gr2; ?>
              @foreach($ws2 as $value1)
                @if ($value1->gr2==$x and $value1->gr3!='')
                 <li class="nav-item">
                    <a href="#" class="nav-link">    <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                     @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 4  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1==04)     
                 <p>{{$value->name_diagnoses }}</p>  
    <!-- <i class="right fas fa-angle-left"></i> -->
              </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1==04)))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>
     {{$value->name_diagnoses }}</p>
                 <!--   <i class="right fas fa-angle-left"></i> -->
                </a>
                 <ul class="nav nav-treeview">
<?php $x=$value->gr2; ?>
@foreach($ws2 as $value1)
  @if ($value1->gr2==$x and $value1->gr3!='')
   <li class="nav-item">
                    <a href="#" class="nav-link">
                     <!--  <i class="far fa-dot-circle nav-icon"></i> -->
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
   <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
   @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
  <!-- 5  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1==05)     
                 <p>{{$value->name_diagnoses }}</p>  </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1==05)))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p> {{$value->name_diagnoses }}</p>  </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">       <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal">
   <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                     @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>        
<!-- 6  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1==06)     
                 <p>{{$value->name_diagnoses }}</p>   </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1==06)))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p> {{$value->name_diagnoses }}</p>   </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">  <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal">
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                   @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 7  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1==07)     
                 <p>{{$value->name_diagnoses }}</p>  </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1==07)))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>  {{$value->name_diagnoses }}</p>        </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">   <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal">
    <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
   @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 8  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='08')     
                 <p>{{$value->name_diagnoses }}</p>    </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='08')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>  {{$value->name_diagnoses }}</p>    </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">                     
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal">
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
   @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!--9  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='09')     
                 <p>{{$value->name_diagnoses }}</p>   </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='09')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p> {{$value->name_diagnoses }}</p>      </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal">
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
   @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 10  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='10')     
                 <p>{{$value->name_diagnoses }}</p>  </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='10')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p> {{$value->name_diagnoses }}</p>    </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                     <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                   @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 11  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='11')     
                 <p>{{$value->name_diagnoses }}</p>  
                  </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='11')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>  {{$value->name_diagnoses }}</p>   </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                  @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 12  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='12')     
                 <p>{{$value->name_diagnoses }}</p>  
                 </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='12')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p> {{$value->name_diagnoses }}</p>            
                </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                  @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 13  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='13')     
                 <p>{{$value->name_diagnoses }}</p>  
               </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='13')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p> {{$value->name_diagnoses }}</p>               
                </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                 @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 14  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='14')     
                 <p>{{$value->name_diagnoses }}</p>  
                </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='14')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p> {{$value->name_diagnoses }}</p>
                       </a>
                 <ul class="nav nav-treeview">
                        <?php $x=$value->gr2; ?>
                        @foreach($ws2 as $value1)
                          @if ($value1->gr2==$x and $value1->gr3!='')
                           <li class="nav-item">
                    <a href="#" class="nav-link">
                    <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                 @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 15  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='15')     
                 <p>{{$value->name_diagnoses }}</p>  
                 </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='15')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>  {{$value->name_diagnoses }}</p>
                         </a>
                 <ul class="nav nav-treeview">
                <?php $x=$value->gr2; ?>
                @foreach($ws2 as $value1)
                  @if ($value1->gr2==$x and $value1->gr3!='')
                   <li class="nav-item">
                    <a href="#" class="nav-link">
                     <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
   <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                 @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 16  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='16')     
                 <p>{{$value->name_diagnoses }}</p>  
                 </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='16')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>  {{$value->name_diagnoses }}</p>
                     </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                     <!--  <i class="far fa-dot-circle nav-icon"></i> -->
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 17  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='17')     
                 <p>{{$value->name_diagnoses }}</p>  
                 </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='17')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>   {{$value->name_diagnoses }}</p>
                      </a>
                 <ul class="nav nav-treeview">
                <?php $x=$value->gr2; ?>
                @foreach($ws2 as $value1)
                  @if ($value1->gr2==$x and $value1->gr3!='')
                   <li class="nav-item">
                    <a href="#" class="nav-link">
                         <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                 @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 18  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='18')     
                 <p>{{$value->name_diagnoses }}</p>  
                </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='18')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p> {{$value->name_diagnoses }}</p>
                       </a>
                 <ul class="nav nav-treeview">
                <?php $x=$value->gr2; ?>
                @foreach($ws2 as $value1)
                  @if ($value1->gr2==$x and $value1->gr3!='')
                   <li class="nav-item">
                    <a href="#" class="nav-link">
                       <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                  @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 19  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='19')     
                 <p>{{$value->name_diagnoses }}</p>  
                 </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='19')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>   {{$value->name_diagnoses }}</p>
                     </a>
                 <ul class="nav nav-treeview">
                <?php $x=$value->gr2; ?>
                @foreach($ws2 as $value1)
                  @if ($value1->gr2==$x and $value1->gr3!='')
                   <li class="nav-item">
                    <a href="#" class="nav-link">
                     <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
              @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>

<!-- 20  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='20')     
                 <p>{{$value->name_diagnoses }}</p>  
                 </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='20')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>   {{$value->name_diagnoses }}</p>
                         </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                     <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                 @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 21  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='21')     
                 <p>{{$value->name_diagnoses }}</p>  
                 </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='21')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>  {{$value->name_diagnoses }}</p>
                         </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
  <i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
                 @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- 22  -->          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               @foreach ($ws as $value)
                @if ($value->ur1=='22')     
                 <p>{{$value->name_diagnoses }}</p>  
                </a>
                @endif 
                 @endforeach
          <ul class="nav nav-treeview">
            @foreach ($ws1 as $value)
             @if (empty($value->gr3) and (!empty($value->gr2) and  ($value->ur1=='22')))
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>  {{$value->name_diagnoses }}</p>
                       </a>
                 <ul class="nav nav-treeview">
                  <?php $x=$value->gr2; ?>
                  @foreach($ws2 as $value1)
                    @if ($value1->gr2==$x and $value1->gr3!='')
                     <li class="nav-item">
                    <a href="#" class="nav-link">
                   
                      <p>
  <p><button type="button" name="class1" class="otpr"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >
    <input type="hidden" name="class1" class="class1"  value="{{$value1->gr3}}"><i class="far fa-dot-circle nav-icon"></i></button>
 <!-- {{$value1->gr2}} / --> {{$value1->name_diagnoses }} </p>     </a>
                  </li>
                    @endif
   @endforeach
               </ul>
              </li>
           @endif
              @endforeach 
            </ul>
<!-- Конец главного окна -->
        </ul> 
<!-- Общий модальный окно для всех -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Зміст</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <p id="datar" >
<?php   ?>   
</p>       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        <button type="button" class="btn btn-primary"  data-dismiss="modal" data-toggle="collapse" data-target="#collapseExample" >Записати діагноз</button>
      </div>
    </div>
  </div>
</div>


<script>

  function mkb() {
  document.getElementById("collapseExample").style.display='none';
}
</script>   
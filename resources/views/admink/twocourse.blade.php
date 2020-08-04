
@extends ('layouts.baseteacher')

@section ('content')
@foreach ($profiles as $student)
        <div id="foto<?php echo $student['id']; ?>" style="width: 50%;  position: absolute; background: white; margin-top: 80px; margin-left: 30%; z-index: 5<?php echo $student['id']; ?>; display: none; border: 2px solid black">

        <button onclick="close<?php echo $student['id']; ?>()">закрити</button>
        <br>
         <?php
         $user_id = $student['user_id'];
           //$img = 'SELECT * FROM `download_profiles` WHERE `id_student` = $user_id';
           $query = DB::select("SELECT * FROM `download_profiles` WHERE `id_student` = $user_id", array(1));
           //$array = (array) $query;
           $array = json_decode(json_encode($query), true);
          // извлечение строки  
           foreach ($array as $foto) {
              $array_pas = $foto['pasport'];
              $array_dip = $foto['diplom'];
              $array_idcod = $foto['ident_code'];
              $array_dipl_compl = $foto['diplom_compl'];
              $array_cert = $foto['certificate'];
              $array_book = $foto['health_book'];
              $array_foto = $foto['foto'];

          }
          //pasport
           echo '<br>'.'паспорт '.'<br>';
           $pasport =  explode(",", $array_pas);
           $amaz_pasport = array_pop($pasport);
           foreach ($pasport as $img) {
            echo '<a href="/images/Foldername/pasport/'.$user_id.'/'.$img.'"><img style = "width: 200px; height: 180px; "src="/images/Foldername/pasport/'.$user_id.'/'.$img.'" alt="альтернативный текст"></a>';
           }
           //diplom
           echo '<br>'.'диплом '.'<br>';
           $diplom =  explode(",", $array_dip);
           $amaz_diplom = array_pop($diplom);
           foreach ($diplom as $img) {
            echo '<a href="/images/Foldername/diplom/'.$user_id.'/'.$img.'"><img style = "width: 200px; height: 180px; "src="/images/Foldername/diplom/'.$user_id.'/'.$img.'" alt="альтернативный текст"></a>';
           }
           //ident_cod
           echo '<br>'.'ідентифікаційний код '.'<br>';
           $ident_cod =  explode(",", $array_idcod);
           $amaz_ident = array_pop($ident_cod);
           foreach ($ident_cod as $img) {
            echo '<a href="/images/Foldername/ident_code/'.$user_id.'/'.$img.'"><img style = "width: 200px; height: 180px; "src="/images/Foldername/ident_code/'.$user_id.'/'.$img.'" alt="альтернативный текст"></a>';
           }
           //diplom_compl
           echo '<br>'.'додаток до диплома '.'<br>';
           $dipl_compl =  explode(",",  $array_dipl_compl);
           $amaz_dipl_compl = array_pop($dipl_compl);
           foreach ($dipl_compl as $img) {
            echo '<a href="/images/Foldername/diplom_compl/'.$user_id.'/'.$img.'"><img style = "width: 200px; height: 180px; "src="/images/Foldername/diplom_compl/'.$user_id.'/'.$img.'" alt="альтернативный текст"></a>';
           }
           //certificate
            echo '<br>'.'сертифікат '.'<br>';
           $cert =  explode(",", $array_cert);
           $amaz_cert = array_pop( $cert);
           foreach ($cert as $img) {
            echo '<a href="/images/Foldername/certificate/'.$user_id.'/'.$img.'"><img style = "width: 200px; height: 180px; "src="/images/Foldername/certificate/'.$user_id.'/'.$img.'" alt="альтернативный текст"></a>';
           }
           //health_book
           echo '<br>'.'санітарна книжка'.'<br>';
           $san =  explode(",", $array_book);
           $amaz_san = array_pop($san);
           foreach ($san as $img) {
            echo '<a href="/images/Foldername/health_book/'.$user_id.'/'.$img.'"><img style = "width: 200px; height: 180px; "src="/images/Foldername/health_book/'.$user_id.'/'.$img.'" alt="альтернативный текст"></a>';
           }
           //foto
           echo '<br>'.'фото'.'<br>';
           $fot =  explode(",", $array_foto);
           $amaz_foto = array_pop($fot);
           foreach ($fot as $img) {
            echo '<a href="/images/Foldername/foto/'.$user_id.'/'.$img.'"><img style = "width: 200px; height: 180px; "src="/images/Foldername/foto/'.$user_id.'/'.$img.'" alt="альтернативный текст"></a>';
           }
           
         ?>
        </div>

@endforeach


<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Зареєстровані</a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link" href="{{asset('admink.timetableone')}}">Розклад</a>
  </li>
</ul>
<style> 
  table {
    width: 100%;
   border: 1px solid #dee2e6;
   
  }
  
  th {
  border-radius: 0.25rem;
   border: 1px solid #dee2e6;

  }
 
   td { border: 1px solid #dee2e6;
   } /**/
  thead {
    color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
  }
  .layer {
    overflow: scroll; /* Добавляем полосы прокрутки */
     }
       
  </style>
<div class="table-responsive" style="height: 600px">
    <table >
     <thead>
        <tr>
            <td>№ </td>
            <th>#</th>
            <th style="width:100px">Прізвище</th>
            <th style="width:100px">Ім'я</th>
            <th style="width:100px">По батькові</th>
            <th style="width:100px">Стать</th>
            
            <th style="width:100px">ПІБ en</th>
            <th style="width:150px">ПІБ раніше</th>
            <th>Кафедра</th>
            <th>Дата  бак.посів</th>
            <th>Флюрографія норма</th>
            <th style="width:100px">Країна</th>
            <th style="width:100px">Місто</th>
            <th style="width:100px">СМТ</th>
             <th style="width:100px">Індекс</th>
             <th style="width:100px">Вулиця</th>
             <th style="width:100px">Будинок</th>
             <th style="width:100px">Квартира</th>
             <th> Моб тел</th>
             <th>Адреса прописки Країна</th>
             <th> Місто</th>
             <th>СМТ</th>
             <th> Індекс</th>
             <th> Вулиця</th>
             <th>Будинок</th>
             <th>Квартира</th>
             <th> Адреса батьків Країна</th>
             <th> Місто</th>
             <th>СМТ</th>
             <th> Індекс</th>
             <th> Адреса</th>
             <th>Телефон батьків</th>
             <th>Заочна база/Країна</th>
             <th> Місто</th>
             <th>СМТ</th>
             <th>Індекс</th>
             <th>Вулиця</th>
             <th>Будинок</th>
             <th>ПІБ головного лікаря</th>
             <th>Службові телефони базової лікарні</th>
             <th>ПІБ базового керівника</th>
             <th>Стаж базового керівника</th>
             <th>Атестаційна категорія базового керівника</th>
             <th>Розподіл Країна</th>
             <th>Місто</th>
             <th>СМТ</th>
             <th>Індекс</th>
             <th>Лікарня</th>
             <th>Вулиця</th>
             <th>Будинок</th>
             <th>ПІБ головного лікаря</th>
             <th>Службові телефони лікарні</th>

             <!-- 
                <th>Email</th> 
  -->
        </tr>
      </thead>
   <tbody>
     <?php  $i=1;?>
        @foreach ($profiles as $student)

            <tr>
<td><?= $i   ?> </td>
        
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="{{ route('admink.user_details', [$student->id]) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
 <button onclick="show<?php echo $student['id']; ?>Img()">img</button>
    <script type="text/javascript">
    
        function show<?php echo $student['id']; ?>Img() {
             let img = document.getElementById('foto'+<?php echo $student['id']; ?>);
             if(img.style.display = 'none') {
                img.style.display = 'block';}
             else {
                img.style.display = 'none'; }

                
        
            
            console.log(img);
        };
        function close<?php echo $student['id']; ?>() {
             let img = document.getElementById('foto'+<?php echo $student['id']; ?>);
                img.style.display = 'none';
        }


    </script></td>
    <td>{{$student->surname}}</td>
                <td>{{$student->name}}</td>
                
                <td>{{$student->lastname}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->fullname_en}}</td>
                <td>{{$student->surnamefirst}}</td>
                <th>{{$student->kafedra}}</th>
                <th>{{$student->date_bak}}</th>
                <th>{{$student->fl_norm}}</th>
                <td>{{$student->country}}</td>
                <td>{{$student->city}}</td>
                <td>{{$student->village}}</td>
                <td>{{$student->index}}</td>
                <td>{{$student->adress}}</td>
                <td>{{$student->house}}</td>
                <td>{{$student->apartment}}</td>
                 <td>{{$student->telm}}</td>
                <td>{{$student->country1}}</td>
                <td>{{$student->city1}}</td>
                <td>{{$student->village1}}</td>
                 <td>{{$student->index1}}</td>
                <td>{{$student->adres1}}</td>
                <td>{{$student->house1}}</td>
                <td>{{$student->apartment1}}</td>
                <td>{{$student->country2}}</td>
                <td>{{$student->city2}}</td>
                <td>{{$student->village2}}</td>
                <td>{{$student->index2}}</td>
                <td>{{$student->adres2}}</td>
                <td>{{$student->tel1}}</td>
                <td>{{$student->country3}}</td>
                <th>{{$student->city3}}</th>
             <th>{{$student->village3}}</th>
             <th>{{$student->index3}}</th>
             <th>{{$student->adres3}}</th>
             <th>{{$student->house3}}</th>
             <th>{{$student->doctor1}}</th>
             <th>{{$student->tel2}}</th>
             <th>{{$student->bos}}</th>
             <th>{{$student->boswork}}</th>
             <th>{{$student->boskat}}</th>
             <th>{{$student->country4}}</th>
             <th>{{$student->city4}}</th>
             <th>{{$student->village4}}</th>
             <th>{{$student->index4}}</th>
             <th>{{$student->healt1}}</th>
             <th>{{$student->adres4}}</th>
             <th>{{$student->house4}}</th>
             <th>{{$student->doctor2}}</th>
             <th>{{$student->tel3}}</th>
                <!-- <td>{{$student->email}}</td>
              
 -->
               </tr>
              <?php $i++;  ?>
        @endforeach
        </tbody>
    </table>



@endsection
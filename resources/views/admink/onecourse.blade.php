@extends ('layouts.baseteacher')

@section ('content')
<!-- Modal -->
@include('layouts.instruction.kerivnuk.onecourse')
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
@media print {
    #printButton {
        display:none;
    }
   
  .shad{
  text-decoration: none;
  outline: none;
  display: inline-block;
  color:red;
  padding: 20px 30px;
  margin: 10px 20px;
  border-radius: 10px;
  font-family: 'Montserrat', sans-serif;
  text-transform: uppercase;
  letter-spacing: 2px;
  background-image: linear-gradient(to right, #9EEFE1 0%, #4830F0 51%, #9EEFE1 100%);
  background-size: 200% auto;
  box-shadow: 0 0 20px rgba(0,0,0,.1);
  transition: .5s;
}

</style>
<form method="post" action="{{asset('admink.onecourse')}}">
      {{ csrf_field() }}
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Зареєстровані</a></li>
   <!-- <li class="nav-item">
    <a class="nav-link" href="{{asset('admink.timetableone')}}">Розклад</a>
  </li> -->
</ul>
 

<div class="table-responsive" style="height: 600px">
    <table >
     <thead>
       <tr>
        <th>#<th>

            <th style="width:100px">Прізвище</th>
            <th style="width:100px">Ім'я</th>
            <th style="width:100px">По батькові</th>
            <th style="width:100px">Курс</th>
            <th style="width:100px">Десяток</th>
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
<td><?= $i   ?><br><input type=checkbox name=id_intern1[] value="{{$student->id}}"> </td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="{{ route('admink.user_details', [$student->id]) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
<!-- 
 <button onclick="show<?php echo $student['id']; ?>Img()">img </button> -->
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
                <td>{{$student->course}}</td>
                <td>{{$student->decatki }}</td>
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

</form>

@endsection
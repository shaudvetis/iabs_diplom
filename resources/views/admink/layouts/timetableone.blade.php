@extends ('admink.layouts.app_admink')

@section ('content')


 <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Розклад інтернів 1 курс</h3>
           <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>


    <!-- Содержание категории -->

        <!-- Шапка категории -->

 <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <thead>
                <th style="width: 30px">#</th>
                <th style="width: 200px">ПІБ</th>
                <th style="width: 50px">Основна база</th>
                <th style="width: 50px">Серпень</th>
                <th style="width: 50px">Березень</th>
                <th style="width: 120px">Травень</th>
                <th style="width: 50px">Червень</th>
                <th style="width: 50px">Серпень</th>
                <th style="width: 50px">Вересень</th>
                <th style="width: 50px">Жовтень</th>
                <th style="width: 120px">Листопад</th>
                <th style="width: 50px">Грудень</th>
                <th style="width: 50px">Травень 2020</th>
                <th style="width: 50px">Червень2020</th>
              
            </thead>
            <tbody>
                
   <!--   <form role="form" method="post" action="{{asset('atestat_profiles')}}"> -->
    {{ csrf_field() }}
 
    
    
<tr>
    

<td><input type="text" name="" class="form-control"> </td>
<td><input type="text" name="" class="form-control"></td>
<td><input type="text" name=""  class="form-control"></td>
<td>  
<select name="" class="form-control">
    <option> </option>
    
</select>
</td>
<td><input type="text" name=""  class="form-control" ></td>


</tr>



 </tbody>


</table>
</div>









@endsection
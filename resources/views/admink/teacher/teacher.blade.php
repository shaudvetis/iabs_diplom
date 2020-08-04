@extends('layouts.baseteacher')
@include('layouts.instruction.kerivnuk.teather')
@section('content')


 <div class="row">
        <a href="{{asset('students_course')}}" class="text" data-toggle="tooltip" data-placement="top" title="Всередині опис роботи">
           <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner" style="height:90px">
                <h6>Інтерни +1</h6>
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
             </div>
           </div>
          </div> 
        </a>

<a href="{{asset('rozklad')}}" class="text" data-toggle="tooltip" data-placement="top" title="Всередині опис роботи">
           <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner" style="height:90px">
                <h6>Виробничий календар</h6>
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
             </div>
           </div>
          </div> 
        </a>

    <a href="{{asset('sprav_hoursandfio')}}" class="text" data-toggle="tooltip" data-placement="top" title="Всередині опис роботи">
           <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-pink">
              <div class="inner" style="height:90px">
                <h6>Напрямки \ години</h6>
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
             </div>
           </div>
          </div> 
        </a>

    <a href="{{asset('sprav_rozklad')}}" class="text" data-toggle="tooltip" data-placement="top" title="Всередині опис роботи">
           <div class="btn-sm" style="width: 200px">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner" style="height:90px">
                <h6>Формування розкладу</h6>
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
             </div>
           </div>
          </div> 
        </a>

</div>





<!-- <div class="card card-body">
</div> -->
@endsection

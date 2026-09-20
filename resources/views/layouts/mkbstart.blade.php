<h3 style="color: red;text-align: center;"> Довідник МКБ </h3>
 
 <q><span style="color: green;"><em> <mark>Натисніть на назву групи щоб відкрити підгрупу</mark> </em></span></q>
 
 <hr>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
<!-- Начало меню справочника -->
  @foreach ($ws as $value)
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
               <p class="ur1" id="{{$value->ur1}}">{{$value->name_diagnoses }}</p></a>
                 
            <ul class="nav nav-treeview">
               @include('layouts.mkbur2')
       

</li>
</ul>
</li>


      @endforeach
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

        @include('layouts.modal')
        </div>
  </div>
</div>

<script>

  function mkb() {
  document.getElementById("collapseExample").style.display='none';
}


</script>   
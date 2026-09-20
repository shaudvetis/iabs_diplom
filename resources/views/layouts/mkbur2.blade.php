 <hr>
 <div class="mkbur2" style="margin-left: 20px;">
  @if(isset($ws1))
  @foreach ($ws1 as $value)
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="far fa-circle nav-icon"></i>
       <p class="url2" id="{{$value->gr2}}"> {{$value->name_diagnoses }} </p></a>
       <ul class="nav nav-treeview">
        @include('layouts.mkbur3')
       </ul>
  @endforeach
  @endif
  </div>
     

<script>
  $(document).on('click', '.url2',function(e){
 // var c= $(this).attr('id');
//alert('c');
  e.preventDefault();
  BaseRecord.ur2($(this).attr('id'));

});  
</script>   
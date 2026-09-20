<div class="mkbur4" style="margin-left: 20px;">
  @if(isset($ws2))
    @foreach($ws2 as $value1)
     <li class="nav-item">
      <a href="#" class="nav-link"> 
       <p><button type="button" name="class1" class="gr5 btn btn-light btn-sm"  value="{{$value1->gr3}}"   data-toggle="modal" data-target="#exampleModal" >{{$value1->name_diagnoses }}
     </button> 
       </p>
       </a>
     </li>
     @endforeach

   @endif
</div>


<script>
 $(document).on('click','.gr5', function(){
//  var c= $(this).val();
// alert(c);
  BaseRecord.ur3($(this).val());
  });
 
</script>   
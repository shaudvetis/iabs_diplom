<div class="mkbsearch">
<!-- Общий модальный окно для всех для  справочника МКБ -->

  @if(isset($namemkb))

  <h4 style="color: red;text-align: center;"> В довіднику знайдені такі діагнози МКБ </h4>
  <q><span style="color: green;"><em> <mark>Оберіть потрібне, встановивши крапку перед назвою діагноза</mark> </em></span></q>
 
 <hr>
    @foreach($namemkb as $value1)
     <p><input class="mkb" type="radio" name="mkb" value="{!!$value1->namedia!!} ({!!$value1->code!!})">  {!!$value1->code!!} {{$value1->namedia }}  </p>
     @endforeach 

      <div class="modal-footer">
       <button type="button" class="btn btn-secondary close-search">Закрити</button>
     </div> 
  @endif

     

</div>


<script>

$('body').on('click','.close-search', function(){
$(".mkbsearch").hide();
});
$("body").on('click','input[type=radio]', function() {
$(".mkbsearch").hide();
});


</script>
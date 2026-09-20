<div class="mkbur5">
<!-- Общий модальный окно для всех для  справочника МКБ -->
 <div class="modal-body">
  @if(isset($ys))
    @foreach($ys as $value1)
     <p><input class="mkb" type="checkbox" name="mkb" value="{!!$value1->namedia!!} ({!!$value1->code!!})">  {!!$value1->code!!} {{$value1->namedia }}  </p>
     @endforeach  
  @endif
  </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
       <button type="button" class="btn btn-primary"  data-dismiss="modal" data-toggle="collapse" data-target="#collapseExample" >Записати діагноз</button>
      </div>

</div>

<script>

  function mkb() {
  document.getElementById("collapseExample").style.display='none';
}
</script>   
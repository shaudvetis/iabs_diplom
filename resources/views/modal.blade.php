<div id="data" >

@foreach ($ys as $key)

<p><input class="mkb" type="radio" name="mkb" value="{!!$key->namedia!!} ({!!$key->code!!})">  {!!$key->code!!} {!!$key->namedia!!}  </p>

@endforeach

</div>





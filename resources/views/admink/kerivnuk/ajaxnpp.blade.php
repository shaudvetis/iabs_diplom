<!-- Файл подключается для расписания -->
<div class="enternpp">
  @if (isset($npp))
 @foreach ($npp as $items)
<input type="checkbox" name="npptema" id="npptema" multiple="" @if ($items->uchtema == $items->npptema)) disabled @endif value="{{$items->npptema}}">{{$items->npptema}} 

@endforeach

<input type="checkbox" name="npptema" id="npptema" value="333">
@endif
</div>


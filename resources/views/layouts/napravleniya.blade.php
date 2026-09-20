<!-- Подключается файл с направлениями через ViewComposer -->
<div class="was-validated">
 <div class="row">
  <label>Хірургічні напрямки</label>
   <select name="direction"  class="custom-select" required style="width: 300px;"class="custom-select"onChange="Selected(this)" >
     <option value="">Відкрийте меню</option>
     @foreach($direction as $dir)

 
     <option value="{{$dir->id}}">{!!$dir->direction!!}</option>
    
     @endforeach
   </select>
 <div class="invalid-feedback">Оберіть хірургічний напрямок</div>
  </div>
</div>

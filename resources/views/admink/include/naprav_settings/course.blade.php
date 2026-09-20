<form method="GET"  action="">
  <div id="panel" style="width: 100%">
<label style="font-size: 15pt;">Панель налаштування журналу оцінок</label>
        <label style="margin-left: 60px;font-size: 15pt">Курс</label>
          <select  name="course" style="width: 50px;height: 25px;margin-left: 10px;">
           <option selected></option>
            <option  value="1"  @if(isset($c)) @if($c == 1) selected @endif @endif >1</option>
            <option value="2" @if(isset($c)) @if($c == 2) selected @endif @endif>2</option>
            <option value="3"  @if(isset($c)) @if($c == 3) selected @endif @endif>3</option>
          </select>

      <button type="submit" class="btn-light" style="margin-left: 10px;width: 80px;">Обрати</button>
   </form>
</div>
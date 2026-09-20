<form method="GET"  action="">
  <div id="panel" style="width: 100%">
   <label style="font-size: 15pt;">Панель налаштування журналу оцінок</label>
     <div class="setting>">
      <label style="margin-left: 60px;font-size: 15pt">Курс</label>
        <select  name="course" class="courses" style="width: 50px;height: 25px;margin-left: 10px;">
        @php if(!empty($ids)) $ids = $ids; elseif(!empty($id)) $ids = $id; else $ids = ''; @endphp
        
          <option selected></option>
    
            <option  value="1"  @if(isset($c)) @if($c == 1) selected @elseif(old('course')){{old('course')}}@endif @endif>1</option>
            <option value="2" @if(isset($c)) @if($c == 2) selected @elseif(old('course')){{old('course')}} @endif @endif>2 </option>
           <option value="3"  @if(isset($c)) @if($c == 3) selected @elseif(old('course')){{old('course')}} @endif @endif>3</option>

      


        </select>
      
         <label style="margin-left: 10px;font-size: 15pt">Десяток</label>
          <select name="decatki" class="decatki" style="width: 50px;height: 25px;margin-left: 10px;">
          <option selected></option>
          <option  value="1"  @if(isset($d)) @if($d == 1) selected @endif @endif>1</option>
          <option value="2"  @if(isset($d)) @if($d == 2) selected @endif @endif>2</option>
          <option value="3"  @if(isset($d)) @if($d == 3) selected @endif @endif>3</option>
          <option value="4"  @if(isset($d)) @if($d == 4) selected @endif @endif>4</option>
          <option value="5"  @if(isset($d)) @if($d == 5) selected @endif @endif>5</option>
        </select>
     
           <button type="submit" class="btn-light" style="margin-left: 10px;width: 80px;">Обрати</button>


      <div style="float: right;margin-right:250px;">
       <label style="font-size: 15pt">Курс</label>
        <select  name="courses" class="courses" style="width: 50px;height: 25px;margin-left: 10px;">
          <option selected></option>
          <option  value="1"  @if(isset($_GET['courses'])) @if($_GET['courses'] == 1) selected @elseif(old('course')){{old('course')}}@endif @endif>1</option>
          
          <option value="2" @if(isset($_GET['courses'])) @if($_GET['courses'] == 2) selected @elseif(old('course')){{old('course')}} @endif @endif>2</option>

          <option value="3"  @if(isset($_GET['courses'])) @if($_GET['courses'] == 3) selected @elseif(old('course')){{old('course')}} @endif @endif>3</option>
           <option value="4"  @if(isset($_GET['courses'])) @if($_GET['courses'] == 4) selected @elseif(old('course')){{old('course')}} @endif @endif>4</option>
            <option value="5"  @if(isset($_GET['courses'])) @if($_GET['courses'] == 5) selected @elseif(old('courses')){{old('courses')}} @endif @endif>5</option>
        </select>
      <button type="submit" name="ordinator" class="btn-light"  value="1">Ординатор</button>
      </div>
   </form>
  </div>
</div>
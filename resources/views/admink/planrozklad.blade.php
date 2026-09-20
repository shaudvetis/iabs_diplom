@extends ('admink.layouts.app_admink')

@section ('content')

<form method="GET"  action="">
<fieldset class="scheduler-border">
  <legend class="scheduler-border">Панель налаштування звіту</legend>
   <div style="margin-left: 10px;" class="row">
    <div class="form-group col-md-2">
     <label >Курс</label>
      <select  name="course" class="form-control">
        <option @if(isset($c)) @if($c == 0) selected @endif @endif>Оберіть...</option>
        <option name="1" value="1"  @if(isset($c)) @if($c == 1) selected @endif @endif >1</option>
        <option value="2" @if(isset($c)) @if($c == 2) selected @endif @endif>2</option>
        <option value="3"  @if(isset($c)) @if($c == 3) selected @endif @endif>3</option>
      </select>
    </div>
    <div class="form-group col-md-2">
     <label >Десяток</label>
      <select name="decatki" class="form-control">
        <option selected>Оберіть...</option>
        <option  name="1" value="1"  @if(isset($d)) @if($d == 1) selected @endif @endif>1</option>
        <option value="2"  @if(isset($d)) @if($d == 2) selected @endif @endif>2</option>
        <option value="3"  @if(isset($d)) @if($d == 3) selected @endif @endif>3</option>
        <option value="4"  @if(isset($d)) @if($d == 4) selected @endif @endif>4</option>
      </select>
    </div>
    <div class="form-group col-md-3">
     <label >Напрямок</label>
      <select name="direction" class="form-control">
        <option selected>Оберіть...</option>
        @foreach($direction as $direct)
        <option value="{!!$direct->id!!}" @if(isset($napr)) @if($napr == $direct->id) selected @endif @endif> {!!$direct->direction!!}  </option>
        @endforeach
        </select>
    </div>
  <div class="form-group">
  <button type="submit"  style="margin-top: 31px;margin-left: 1px;" class="btn btn-primary">Показати</button>
  </div>
  <a class="float-rifht" href="{{route('printplanroz')}}"> Для друку </a>
 </div>
</fieldset>
</form>

<form method="post" action="{{asset('planrozklad')}}">
      {{ csrf_field() }}
<input type="hidden" name="course" value="@if(isset($c)) {{$c}} @endif">
<input type="hidden" name="decatki" value="@if(isset($d)) {{$c}} @endif">
<input type="hidden" name="direction" value="@if(isset($napr)) {{$napr}} @endif">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"> Название </th>
      <th scope="col"> Дата </th>
      <th scope="col"> Практика </th>
      <th scope="col"> Семінар </th>
    </tr>
  </thead>
  <tbody>
  	 @foreach($seminarse as $key => $value)
    <tr>
      <th scope="row"><input type="hidden" name="seminar_title[]" value="{!!$value->id!!}">  {!!$value->tema!!}  </th>
      <td> <input  class="form-control" type="date" name="date[]"> </td>
      <td> 
      <select class="form-control" name="pract[]">
       <option selected value="0" >Оберіть </option>
       <option value="1"> 1 </option>
       <option value="2"> 2 </option>
       <option value="3"> 3 </option>
       <option value="3"> 4 </option>
       <option value="3"> 5 </option>
       <option value="3"> 6 </option>
       <option value="3"> 7 </option>
       </select></td>
      <td> <select class="form-control" name="seminar[]">
       <option selected value="0" >Оберіть </option>
       <option value="1"> 1 </option>
       <option value="2"> 2 </option>
       <option value="3"> 3 </option>
       <option value="3"> 4 </option>
       <option value="3"> 5 </option>
       <option value="3"> 6 </option>
       <option value="3"> 7 </option>
       </select> </td>
    </tr>
   </tbody>
   @endforeach
</table>
<button type="submit"  style="margin-top: 31px;margin-left: 1px;" class="btn btn-primary">Показати</button>
</form>
<!-- <div class="d-flex flex-row bd-highlight mb-3">
  <div class="p-2 bd-highlight"> Название </div>
  <div class="p-2 bd-highlight"> Дата </div>
  <div class="p-2 bd-highlight"> Практика </div>
  <div class="p-2 bd-highlight"> Семінар </div>
  </div>
    @foreach($seminarse as $key => $value)
    <div class="d-flex flex-row bd-highlight mb-3">
  <div class="p-2 w-30 bd-highlight"> {!!$value->tema!!} </div>
  <div class="p-2 bd-highlight"> <input type="date" name=""> </div>
  <div class="p-2 bd-highlight"> <input type="text" name=""> </div>
  <div class="p-2 bd-highlight"> <input type="text" name=""> </div>
</div>
@endforeach -->




@endsection
<style>
.red {
color: MediumVioletRed; 
}
</style>

<div class="tab-content" id="nav-tabContent">

                      @if (session('message-updated'))
                         @component('admink.components.alert')
                             @slot('type')
                                 success
                             @endslot
                             {!! session('message-updated') !!}
                         @endcomponent
                      @endif          

  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

    <form role="form" method="post" action="{{route('user_profile_update', [$details->id])}}">
    {{ csrf_field() }}
    <input type="hidden" class="form-control" name="id" value="{{$details->id}}">
    <input type="hidden" class="form-control" name="user_id" value="{{$details->user_id}}">    
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-danger">

        <div class="card-header">

            <h3 class="card-title">Особисті данні інтерна</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
    <div class="form-group col-md-5">
      <label>Email</label>
      <input type="text" class="form-control" name="email" placeholder="Email" value="@if(old('email')){{old('email')}}@else{{$details->email}}@endif">
    {!! $errors->first('email', '<small class="help-block red">:message</small>') !!}      
    </div>

<div class="col-6">
    <label>Прізвище</label>
    <input type="text" class="form-control" name="surname" value="@if(old('surname')){{old('surname')}}@else{{$details->surname}}@endif">
    {!! $errors->first('surname', '<small class="help-block red">:message</small>') !!}
  </div>
      <div class="col-4">
    <label>Ім'я</label>
    <input type="text" class="form-control" name="name" value="@if(old('name')){{old('name')}}@else{{$details->name}}@endif">
    {!! $errors->first('name', '<small class="help-block red">:message</small>') !!}    
  </div>
  <div class="col-5">
    <label>По батькові</label>
    <input type="text" class="form-control" name="lastname" value="@if(old('lastname')){{old('lastname')}}@else{{$details->lastname}}@endif">
    {!! $errors->first('lastname', '<small class="help-block red">:message</small>') !!}    
  </div> 
 
 <div class="col-3">
                   {!! Form::label('gender', 'Стать') !!}
                   <select name="gender" class="form-control select2" style="width: 100%;">
                    <option @php if(strpos($details->gender,'іноча')) echo 'selected'; @endphp>Жіноча</option>
                    <option @php if(strpos($details->gender,'оловіча')) echo 'selected'; @endphp>Чоловіча</option>
                    </select>
                </div>
<div class="col-5">
    <label>ПІБ інтерна англійською мовою</label>
    <input type="text" class="form-control" name="surnamefirst" value="{{$details->surnamefirst}}">
  </div>

<div class="col-6">
    <label>ПІБ, які використовувались раніше (здебільшого для жінок)</label>
    <input type="text" class="form-control" name="fullname_en" value="{{$details->fullname_en}}">
  </div>

  </div>
</div>
    </div>
    <!-- SELECT2 EXAMPLE -->
      <div class="card card-danger">

          <div class="card-header">

              <h3 class="card-title">Поштова адреса місця мешкання інтерна</h3>

              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
              </div>
          </div>
          <div class="card-body">
              <div class="row">


     <div class="form-group col-md-4">
      <label>Країна</label>
      <input type="text" class="form-control" name="country" value="{{$details->country}}">
    </div>

    <div class="form-group col-md-4">
      <label for="inputCity">Місто</label>
      <input type="text" class="form-control" name="city" value="{{$details->city}}">
    </div>
                  <div class="form-group col-md-4">
                      <label>ПГТ</label>
                      <input type="text" class="form-control" name="village" value="{{$details->village}}">
                  </div>

    <div class="form-group col-md-2">
        <label for="inputZip">Індекс</label>
        <input type="text" class="form-control" name="index" value="{{$details->index}}">
    </div>

  <div class="col-5">
    <label for="inputfio">Вулиця</label>
    <input type="text" class="form-control" name="adress" placeholder="Вулиця" value="{{$details->adress}}">
  </div>
  <div class="col">
    <label for="inputAddress">Будинок</label>
    <input type="text" class="form-control" name="house" placeholder="будинок" value="{{$details->house}}">
  </div>
  <div class="col">
    <label for="inputAddress">Квартира</label>
    <input type="text" class="form-control" name="apartment" placeholder="номер" value="{{$details->apartment}}">
  </div>

<div class="col-5">
    <label for="inputAddress">Особисті контактні телефони </label>
    <input type="text" class="form-control" name="telc" placeholder="домашній" value="{{$details->telc}}">
     </div>
     <div class="col-5">
    <label for="inputAddress">Особисті контактні телефони</label>
    <input type="text" class="form-control" name="telm" placeholder="мобільний" value="{{$details->telm}}">
     </div>
   </div>
          </div>
              <!-- SELECT2 EXAMPLE -->
              <div class="card card-danger">

                  <div class="card-header">

                      <h3 class="card-title">Поштова адреса місця прописки інтерна</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="row">
     <div class="form-group col-md-4">
      <label>Країна</label>
      <input type="text" class="form-control" name="country1" value="{{$details->country1}}">
    </div>
  
    <div class="form-group col-md-4">
      <label>Місто</label>
      <input type="text" class="form-control" name="city1" value="{{$details->city1}}">
    </div>
    <div class="form-group col-md-4">
      <label>ПГТ</label>
      <input type="text" class="form-control" name="village1" value="{{$details->village1}}">
    </div>
      <div class="form-group col-md-2">
      <label>Індекс</label>
      <input type="text" class="form-control" name="index1" value="{{$details->index1}}">
    </div>
<div class="col-5">
    <label>Вулиця</label>
    <input type="text" class="form-control" name="adres1" placeholder="Вулиця" value="{{$details->adres1}}">
  </div>
  <div class="col">
    <label>Будинок</label>
    <input type="text" class="form-control" name="house1" placeholder="будинок" value="{{$details->house1}}">
  </div>
  <div class="col">
    <label>Квартира</label>
    <input type="text" class="form-control" name="apartment1" placeholder="номер" value="{{$details->apartment1}}">
  </div>
                      </div>
                  </div>
                      <!-- SELECT2 EXAMPLE -->
                      <div class="card card-danger">

                          <div class="card-header">

                              <h3 class="card-title">Поштова адреса батьків</h3>

                              <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i></button>
                                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-remove"></i></button>
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="form-group col-md-5">
      <label>Країна</label>
      <input type="text" class="form-control" name="country2" value="{{$details->country2}}">
    </div>
  
    <div class="form-group col-md-6">
      <label>Місто</label>
      <input type="text" class="form-control" name="city2" value="{{$details->city2}}">
    </div>

<div class="form-group col-md-7">
      <label>ПГТ</label>
      <input type="text" class="form-control" name="village2" value="{{$details->village2}}">
    </div>
      <div class="form-group col-md-2">
      <label>Індекс</label>
      <input type="text" class="form-control" name="index2" value="{{$details->index2}}">
    </div>
    
<div class="col-7">
    <label>Адреса батьків</label>
    <input type="text" class="form-control" name="adres2" placeholder=" Вулиця будинок\квартира" value="{{$details->adres2}}">
  </div>
  
  <div class="col-7">
    <label>Телефон батьків</label>
    <input type="text" class="form-control" name="tel1" placeholder="номер" value="{{$details->tel1}}">
  </div>
                              </div>
                          </div>
                          <div class="card-footer">
 <button type="submit" class="btn btn-primary">Відправити</button>

    <a href="{{route('admink.user_print', [$details->id])}}" role="button" class="nav-item nav-link red" >Друк</a>     
                          </div>
                      </div>
                    </div>
</form>
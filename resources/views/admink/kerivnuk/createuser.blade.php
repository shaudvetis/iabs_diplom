@extends('layouts.baseteacher')

@section('content')

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Рєестрація ітернів</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Рєестрація вчителів</a>
  </li>
</ul>
@if (session('card-ok'))
                @component('admink.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('card-ok') !!}
                @endcomponent
            @endif
<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  	 
  	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Обліковий запис') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('createuser.store') }}">
                        @csrf
                         <div class="form-group row">
                            <label for="fio" class="col-md-4 col-form-label text-md-right">{{ __('Призвище') }}</label>

                            <div class="col-md-6">
                                <input id="fio" type="text" class="form-control @error('fio') is-invalid @enderror" name="fio" value="{{ old('fio') }}" required autocomplete="fio" autofocus placeholder="Петренко">

                                @error('fio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(" Ім'я ") }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Петренко Петро Петрович">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

<div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('По-Батькові') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus placeholder="Петрович">

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Рік навчання') }}</label>

                            <div class="col-md-6">
                                <select name="course" id="course" class="form-control" required>
                                    <option value="1"  selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>

                              <!--  <input id="course" type="number" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course') }}" required autocomplete="name" autofocus> -->

                                @error('course')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="role" value="0">


 <div class="form-group row">
    <label for="clordinator" class="col-md-4 col-form-label text-md-right">{{ __('Клінічний ординатор') }}</label>
     <div class="col-md-6">
      <select name="clordinator" id="clordinator" class="form-control" required>
       <option > </option>
       <option value="1">Так</option>
       <option value="2">Ні</option>
      </select>
        @error('form')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
  </div>

<div class="form-group row">
    <label for="form" class="col-md-4 col-form-label text-md-right">{{ __('Форма навчання') }}</label>
     <div class="col-md-6">
      <select name="form" id="form" class="form-control" required>
       <option > </option>
       <option value="бюджет">Бюджет</option>
       <option value="контракт">Контракт</option>
       </select>
        @error('form')
       <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
       </span>
       @enderror
      </div>
</div>
         <div class="form-group row">
                            <label for="kafedra" class="col-md-4 col-form-label text-md-right">{{ __('Кафедра') }}</label>

                            <div class="col-md-6">
                                <select name="kafedra" id="kafedra" class="form-control" reqired>
                                    <option value="1"  selected>Хірургії №1</option>
                                                                </select>

                                @error('kafedra')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Повторіть пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                      <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="student" value="student">
                                    {{ __('Створити запис') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


  </div>

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Обліковий запис') }}</div>

<div class="card-body">
  <form method="POST" action="{{ route('createuser.store') }}">
                       @csrf
    <div class="form-group row">
         <label for="fio" class="col-md-4 col-form-label text-md-right">{{ __('Призвище') }}</label>
            <div class="col-md-6">
                <input id="fio" type="text" class="form-control @error('fio') is-invalid @enderror" name="fio" value="{{ old('fio') }}" required autocomplete="fio" autofocus placeholder="Петренко">
                @error('fio')
             <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
</div>

 <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(" Ім'я ") }}</label>
          <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Петренко Петро Петрович">
                @error('name')
            <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
</div>

<div class="form-group row">
  <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('По-Батькові') }}</label>
    <div class="col-md-6">
       <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus placeholder="Петрович">
           @error('surname')
               <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
               </span>
            @enderror
    </div>
</div>

 <div class="form-group row">
    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Роль') }}</label>
     <div class="col-md-6">
      <select name="role" id="role" class="form-control" required>
      <!--  <option > </option> -->
       <option value="4" selected >Вчитель</option>
      </select>
        @error('role')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
  </div>

<div class="form-group row">
  <label for="kafedra" class="col-md-4 col-form-label text-md-right">{{ __('Кафедра') }}</label>
    <div class="col-md-6">
     <select name="kafedra" id="kafedra" class="form-control" reqired>
      <option value="1"  selected>Хірургії №1</option>
     </select>
       @error('kafedra')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}
    </label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}
                         </strong>
                    </span>
                @enderror
        </div>
</div>

<div class="form-group row">
  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}
  </label>
    <div class="col-md-6">
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
         @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
         @enderror
    </div>
</div>


<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary" name="teacher" value="teacher">
            {{ __('Створити запис') }}
        </button>
       </div>
      </div>
     </form>
    </div>
   </div>
  </div>
 </div>
</div>

  </div>
</div>
@endsection
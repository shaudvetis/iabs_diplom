@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Обліковий запис') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
                                </select>

                              <!--  <input id="course" type="number" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course') }}" required autocomplete="name" autofocus> -->

                                @error('course')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

 <div class="form-group row">
    <label for="clordinator" class="col-md-4 col-form-label text-md-right">{{ __('Ви Клінічний ординатор ?') }}</label>
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

<input type="hidden" name="role" value="0">

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
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                      <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection

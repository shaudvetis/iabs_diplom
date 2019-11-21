@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                Вітаємо!!!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
     
                    Ви зареєструвались на сайті Кафедри хірургії!
                    <p>Для подальшої роботи вам необхідно Увійти в свій кабінет інтерна!</p>
                    <p>Для переходу натисніть на кнопку</p>
                        

                  <a class="btn btn-secondary btn-lg active" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                     {{ __('Увійти') }}          </a>
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

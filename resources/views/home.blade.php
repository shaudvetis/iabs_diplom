@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ви зайшли в вікно сміни користувача</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вам необхідно клікнути по ПІБ зверху у правому кутку и вибрати слово Logout!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.form')

@section('title', 'Авторизация')


@section('content')
<form class="contact100-form ajax-form" method="POST" action="/start">
    <span class="contact100-form-title">
        Вход в мир еды
    </span>

    {{ csrf_field() }}

    <div class="wrap-input100">
        <input class="input100" type="email" name="email" placeholder="Почта" require>
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100">
        <input class="input100" type="password" name="password" placeholder="Пароль" require>
        <span class="focus-input100"></span>
    </div>

    <div class="container-contact100-form-btn">
        <button class="contact100-form-btn">
            <span>
                Авторизация
            </span>
        </button>
    </div>
</form>
@endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todoshka</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="antialiased">
<div style="margin-left: 30%; margin-top: 20%">
    <label>Чтобы использовать тудушку необходимо зарегестрироваться или войти под существующим аккаунтом. <br/>
        Тестовый аккаунт: <br/>
        Email: <strong>test@test.com</strong><br/>
        Пароль: <strong>1234567890</strong>
    </label>
</div>
@if (Route::has('login'))
    <div style="margin-left: 43%; margin-top: 1em">
        @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">
                <x-button class="ml-3">Войти</x-button>
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    <x-button class="ml-3">Регистрация</x-button>
                </a>
            @endif
        @endauth
    </div>
@endif
</body>
</html>

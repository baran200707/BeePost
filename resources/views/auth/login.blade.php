@extends('layouts.main')

@section('title')
    Аунтефикация
@endsection

@section('content')
    <div class="auth-container">
    <a href="{{ route('auth.register.index') }}" class="auth-link"> Регистрация </a>
        <form action="{{ route('auth.login') }}" method="post" class="auth-form">
            @csrf
            <input type="email" name="email" placeholder="Введите электронную почту" class="auth-input" >
            <input type="password" name="password" placeholder="Введите пароль" class="auth-input" >
            <button type="submit" class="auth-button"> Подтвердить </button>
        </form>
    </div>
@endsection

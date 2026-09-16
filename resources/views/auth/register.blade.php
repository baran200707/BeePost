@extends('layouts.main')

@section('title')
    Аунтефикация
@endsection

@section('content')
    <div class="auth-container">
        <a href="{{ route('auth.login.index') }}" class="auth-link"> Уже есть аккаунт? Войти </a>
        @error('password')
        <div style="margin-top: 10px">{{ $message }}</div>
        @enderror
        @error('name')
        <div style="margin-top: 10px">{{ $message }}</div>
        @enderror
        @error('email')
        <div style="margin-top: 10px">{{ $message }}</div>
        @enderror
        <form style="width: auto" action="{{ route('auth.register') }}" method="post" class="auth-form">
            @csrf
            <input type="text" name="name" placeholder="Введите имя" class="auth-input" value="{{ old('name') }}">
            <input type="email" name="email" placeholder="Введите электронную почту" class="auth-input" value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Введите пароль" class="auth-input">
            <input type="password" name="password_confirmation" placeholder="Подтвердите пароль" class="auth-input">
            <button type="submit" class="auth-button"> Подтвердить </button>
        </form>
    </div>
@endsection

@extends('layouts.main')

@section('title')
    Аунтефикация
@endsection

@section('content')
    <div class="auth-container">
        <a href="{{ route('auth.login.index') }}" class="auth-link"> Уже есть аккаунт? Войти </a>
        @error('password')
        <div class="form-error">{{ $message }}</div>
        @enderror
        @error('name')
        <div class="form-error">{{ $message }}</div>
        @enderror
        @error('email')
        <div class="form-error">{{ $message }}</div>
        @enderror
        <form action="{{ route('auth.register') }}" method="post" class="auth-form">
            @csrf
            <input type="text" name="name" placeholder="Введите имя" class="auth-input" value="{{ old('name') }}">
            <input type="email" name="email" placeholder="Введите электронную почту" class="auth-input" value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Введите пароль" class="auth-input">
            <input type="password" name="password_confirmation" placeholder="Подтвердите пароль" class="auth-input">
            <button type="submit" class="btn btn-primary"> Подтвердить </button>
        </form>
    </div>
@endsection

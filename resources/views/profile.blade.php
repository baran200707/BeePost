@extends('layouts.main')

@section('title')
    profile
@endsection

@section('content')
    @include('layouts.header')
    @auth
        <p>{{ auth()->getUser()->name }}</p>
        <form action="{{ route('auth.logout') }}" method="post">
            <button>Выйти из аккаунта</button>
        </form>
    @endauth
    @guest
        Ввойдите чтобы увидеть профиль
    @endguest
@endsection

@extends('layouts.main')

@section('title')
    profile
@endsection

@section('content')
    @include('layouts.header')
    @auth
        <div class="profile">
            <p>{{ auth()->getUser()->name }}</p>
            <div class="avatar">
                @if(auth()->user()->avatar)
                    <img class="profile_img" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="avatar">
                @else
                    <img class="profile_img" src="{{ asset('user.png') }}" alt="noAvatar">
                @endif
            </div>
            <form class="avatar-form" action="{{ route('profile.avatar') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="avatar" accept="image/png,image/jpeg,image/webp">
                <button type="submit">Загрузить аватар</button>
            </form>
            <form action="{{ route('auth.logout') }}" method="post">
                @csrf
                <button type="submit">Выйти из аккаунта</button>
            </form>
        </div>
    @endauth
    @guest
        <p>Войдите, чтобы увидеть профиль</p>
    @endguest
@endsection


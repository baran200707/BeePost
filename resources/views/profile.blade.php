@extends('layouts.main')

@section('title')
    profile
@endsection

@section('content')
    @include('layouts.header')
    @auth
        <div class="profile">
            <p>{{ auth()->getUser()->name }}</p>
            @error('image')
            <div style="margin-top: 10px">{{ $message }}</div>
            @enderror
            <div class="avatar">
                @if(auth()->user()->avatar)
                    <img class="profile_img" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="avatar">
                @else
                    <img class="profile_img" src="{{ asset('user.png') }}" alt="noAvatar">
                @endif
            </div>
            <form class="avatar-form" action="{{ route('profile.avatar') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="avatar" accept=".png,.jpg,.jpeg,.webp">
                <button class="btn btn-primary" type="submit">Загрузить аватар</button>
            </form>
            <form action="{{ route('auth.logout') }}" method="post">
                @csrf
                <button type="submit">Выйти из аккаунта</button>
            </form>
            <form action="{{ route('user.delete') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ auth()->getUser()->id }}">
                <button class="btn btn-danger" onclick="return confirm('Вы хотите удалить?');" type="submit">
                    Удалить
                </button>
            </form>
        </div>
    @endauth
    @guest
        <p>Войдите, чтобы увидеть профиль</p>
    @endguest
@endsection


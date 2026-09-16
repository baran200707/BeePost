@extends('layouts.main')

@section('title')
    profile
@endsection

@section('content')
    @include('layouts.header')
    @auth
        <p>{{ auth()->getUser()->name }}</p>
    @endauth
    @guest
        Ввойдите чтобы увидеть профиль
    @endguest
@endsection

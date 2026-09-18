@extends('layouts.main')

@section('content')
    @include('layouts.header')
    <form class="auth-form" action="{{ route('posts.create') }}" method="post" enctype="multipart/form-data">
        @if(session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif
        @csrf
        <label>Отправить пост</label>
        <input class="auth-input" type="text" name="title" placeholder="Название вашего поста">
        <textarea class="auth-input" name="content" placeholder="Например: Сегодня прекрасная погода"></textarea>
        <input class="auth-input" type="file" name="image[]" multiple>
        <button class="auth-button" type="submit">Опубликовать</button>
    </form>
@endsection

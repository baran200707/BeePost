@extends('layouts.main')

@section('content')
    @include('layouts.header')
    <form class="auth-form" action="{{ route('posts.create') }}" method="post" enctype="multipart/form-data">
        @if(session('error'))
            <div class="form-error">
                {{ session('error') }}
            </div>
        @endif
        @csrf
        <label>Отправить пост</label>
        <input class="auth-input" type="text" name="title" placeholder="Название вашего поста" value="{{ old('title') }}">
        <textarea class="auth-input" name="content" placeholder="Например: Сегодня прекрасная погода">{{ old('content') }}</textarea>
        <input class="auth-input" type="file" name="image[]" multiple>
        <button class="btn btn-primary" type="submit">Опубликовать</button>
    </form>
@endsection

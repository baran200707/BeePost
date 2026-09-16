@extends('layouts.main')

@section('title')
    Welcome
@endsection

@section('content')
    @include('layouts.header')
    <div class="posts-container">
        <h1>Приветствую смотрящих</h1>
        @forelse($posts as $post)
            <article class="post">
                <h2 class="post-title">{{ $post->title }}</h2>
                <p class="post-content">{{ $post->content }}</p>
                @foreach($post->attachments as $attachment)
                    <img class="post-image" alt="{{ $attachment->file_name }}" src="{{ asset('storage/' . $attachment->file_path) }}">
                @endforeach
            </article>
        @empty
            <h1>Постов нету</h1>
        @endforelse
        {{ $posts->links() }}
    </div>
    @auth
        <a href="{{ route('posts.create.index') }}">Создать пост</a>
    @endauth
@endsection

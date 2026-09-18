@extends('layouts.main')

@section('title')
    Welcome
@endsection

@section('content')
    @include('layouts.header')
    <div class="posts-container">
        <h1>Приветствую смотрящих</h1>
        @auth
            <a href="{{ route('posts.create.index') }}">Создать пост</a>
        @endauth
        @forelse($posts as $post)
            <article class="post">
                <div class="post-author">
                    <img class="post-avatar" src="{{ asset('storage/' .$post->user->avatar) }}" alt="avatar">
                    <p class="post-author-name">{{ $post->user->name }}</p>
                </div>
                <h2 class="post-title">{{ $post->title }}</h2>
                <p class="post-content">{{ $post->content }}</p>
                <div class="post-images">
                @foreach($post->attachments as $attachment)
                    <img class="post-image" alt="{{ $attachment->file_name }}" src="{{ asset('storage/' . $attachment->file_path) }}">
                @endforeach
                </div>
                @auth
                    @if(auth()->user() == $post->user)
                        <form action="{{ route('posts.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <button onclick="return confirm('Вы хотите удалить?');" type="submit">Удалить</button>
                        </form>
                    @endif
                @endauth
            </article>
        @empty
            <h1>Постов нету</h1>
        @endforelse
        {{ $posts->links() }}
    </div>
@endsection

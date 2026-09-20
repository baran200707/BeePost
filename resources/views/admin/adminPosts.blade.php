@extends('layouts.main')
@section('content')
    @include('layouts.header')
    @forelse($posts as $post)
        <div class="posts-container">
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
                    <form action="{{ route('posts.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <button class="delete-button" onclick="return confirm('Вы хотите удалить?');" type="submit">Удалить</button>
                    </form>
                @endauth
            </article>
        @empty
            <h1>Постов нету</h1>
    @endforelse
            {{ $posts->links() }}
        </div>
@endsection

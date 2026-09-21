@extends('layouts.main')

@section('title')
    Welcome
@endsection

@section('content')
    @include('layouts.header')
    <div class="posts-container">
        <div class="feed-intro">
            <div>
                <p class="eyebrow">Лента сообщества</p>
                <h1>Место для мыслей,<br><em>которые хочется сохранить.</em></h1>
            </div>
            <p class="feed-note">Истории, наблюдения и маленькие открытия пользователей BeePost.</p>
        </div>
        @forelse($posts as $post)
            <article class="post">
                <div class="post-author">
                    @if($post->user->avatar)
                        <img class="post-avatar" src="{{ asset('storage/' .$post->user->avatar) }}" alt="">
                    @else
                        <img class="post-avatar" src="{{ asset('user.png') }}" alt="">
                    @endif
                    <div>
                        <p class="post-author-name">{{ $post->user->name }}</p>
                        <p class="post-meta">Автор публикации</p>
                    </div>
                </div>
                <h2 class="post-title">{{ $post->title }}</h2>
                <p class="post-content">{{ $post->content }}</p>
                <div class="post-images">
                @foreach($post->attachments as $attachment)
                    <button class="post-image-button" type="button" data-lightbox-open aria-label="Открыть изображение">
                        <img class="post-image" alt="{{ $attachment->file_name }}" src="{{ asset('storage/' . $attachment->file_path) }}">
                    </button>
                @endforeach
                </div>
                @auth
                    @if(auth()->user() == $post->user)
                        <form action="{{ route('posts.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <button class="btn btn-danger" onclick="return confirm('Вы хотите удалить?');" type="submit">Удалить пост</button>
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

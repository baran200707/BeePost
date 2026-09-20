@extends('layouts.main')
@section('content')
    @include('layouts.header')
    @forelse($users as $user)
        <div class="posts-container">
            <article class="post">
                <div class="post-author">
                    <img class="post-avatar" src="{{ asset('storage/' .$user->avatar) }}" alt="avatar">
                    <p class="post-author-name">{{ $user->name }}</p>
                </div>
                @auth
                    <form action="{{ route('user.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button class="delete-button" onclick="return confirm('Вы хотите удалить?');" type="submit">
                            Удалить
                        </button>
                    </form>
                @endauth
            </article>
            @empty
                <h1>Пользователей нету</h1>
            @endforelse
            {{ $users->links() }}
        </div>
        @endsection

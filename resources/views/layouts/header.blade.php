<header>
    <div class="header-inner">
        <a href="/" class="brand" aria-label="BeePost — на главную">
            <span class="brand-mark">B</span>
            <span class="brand-name">BeePost</span>
        </a>
        <div class="header-actions">
            @auth
                <a class="header-create" href="{{ route('posts.create.index') }}">Новый пост <span>+</span></a>
            @endauth
    @auth
        <a class="profile-link" href="{{ route('auth.profile') }}" aria-label="Открыть профиль">
            @if(auth()->getUser()->avatar != null)
                <img class="header_avatar" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="avatar">
            @else
                <img class="header_avatar" alt="noAvatar" src="{{ asset('user.png') }}">
            @endif
        </a>
    @endauth

    @guest
        <a class="header-login" href="{{ route('auth.login.index') }}">Войти</a>
    @endguest
        </div>
    </div>
</header>


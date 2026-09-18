<header>
    <a href="/" class="logo"><img class="logo-png" alt="logo" src="{{ asset('logo.png') }}"></a>
    <h1>BeePost</h1>
    @auth
        <a href="{{ route('auth.profile') }}">
            @if(auth()->getUser()->avatar != null)
                <img class="header_avatar" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="avatar">
            @else
                <img class="header_avatar" alt="noAvatar" src="{{ asset('user.png') }}">
            @endif
        </a>
    @endauth

    @guest
        <a href="{{ route('auth.login.index') }}">Войти</a>
    @endguest
</header>


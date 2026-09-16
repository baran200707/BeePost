<header>
    <a href="/" class="logo"><img class="logo-png" alt="logo" src="{{ asset('logo.png') }}"></a>
    @auth
        <a href="{{ route('auth.profile') }}">{{ auth()->getUser()->name }}</a>
    @endauth

    @guest
        <a href="{{ route('auth.login.index') }}">Войти</a>
    @endguest
</header>


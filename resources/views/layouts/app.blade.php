<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Cinefeel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;500;600;700&display=swap" rel="stylesheet">


</head>
<body>
<div id='header_responsive'>
<div class="head">
    <header>
        <a href="{{ url('/') }}">
            <img src="/img/logo.png" alt="logo_header" />
            <img src="/img/cinefeel_typo.png" alt="logo"/>
        </a>
        </header>
        <div class="l">
            <a href="{{ url('/') }}">Accueil</a>
            <a href="{{ url('/series') }}">Toutes les séries</a>
        </div>



    <!-- Authentication Links -->
    <nav>
        @guest
            <div class="log">
                <p><a href="{{ route('login') }}">Se connecter</a></p>
                <p><a href="{{ route('register') }}">S'enregistrer</a></p>
            </div>
        @else
            <div class="log">
                <p> Bonjour {{ Auth::user()->name }} - <a href="/profile">Mon profil</a></p>
            <!--
            @if (Auth::user())
                <a href="#">Des liens spécifiques pour utilisateurs connectés..</a>
            @endif
                    -->
                <p><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Déconnexion
                </a></p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @endguest
    </nav>
</div>
</div>

<div id="main">
    @yield('content')
</div>
<!-- Scripts -->

<footer>Tous droits réservés - Cinefeel©</footer>
</body>
</html>

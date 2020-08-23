<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                          <ul class="navbar-nav mr-auto">
                    <li class="nav-item px-4">
                        <a class="nav-link nav-link-font" href="#">Accueil</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link nav-link-font" href="#">À propos</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link nav-link-font" href="#">Services</a>
                    </li>
                     <li class="nav-item px-4">
                        <a class="nav-link nav-link-font" href="#">Contact</a>
                    </li>
                    <li class="nav-item dropdown px-4">
                        <a class="nav-link nav-link-font dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Langues</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">
                                Français
                                <span class="px-2">
                                    <img width="15px" src="{{ asset('images/fr.png') }}" alt="">
                                </span>
                            </a>
                            <a class="dropdown-item" href="#">English
                                <span  class="px-2">
                                    <img width="15px" src="{{ asset('images/en.png') }}" alt="">
                                </span>
                            </a>
                        </div>
                    </li>
                </ul>
                        <!-- Authentication Links -->
                        @guest
                      
                        <form class="d-flex" id="post-login" method="POST" action="{{ route('login') }}">
                            @csrf
                            <li class="nav-item px-1">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <a href="{{ route('password.request') }}">
                                    Identifiant oublié?
                                </a>

                            </li>
                        <li class="nav-item px-1">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   required
                                   autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Mot de passe oublié
                                </a>
                            @endif
                        </li>


                        </form>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <button type="submit" class="btn btn-gold" onclick="event.preventDefault();
                                    document.getElementById('post-login').submit();">Se connecter</button>
                                <a class="d-block" href="{{ route('register') }}">Crée un compte </a>
                            </li>
                        @endif


                    @else
                        <li class="nav-item dropdown">
                            <button role="button" class="btn btn-gold" id="navbarDropdown" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre> Mon compte
                            </button>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('deconecte')}}">
                                    {{ __('Se deconecter') }}
                                </a>
                                <a class="dropdown-item" href="">
                                    {{ __('Paramètres') }}
                                </a>
                                <a class="dropdown-item" href="">
                                    {{ __('Mes annonces') }}
                                </a>
                                <a class="dropdown-item notify_dropdown" href="{{route('message')}}">
                                    {{ __('Ma messagerie') }}
                                     @if(unreadCountAll(Auth::user()->id) > 0)
                                    <span class="badge badge-pill badge-warning unread_noti">
                                          {{ unreadCountAll(Auth::user()->id) }}
                                    </span>
                                    @endif
                                </a>
                                <a class="dropdown-item" href="#">
                                    {{ __("S'abonner") }}
                                </a>
                                <a class="dropdown-item" href="">
                                    {{ __('Les annnonces') }}
                                </a>
                                <a class="dropdown-item" href="">
                                    {{ __('Mon profile') }}
                                </a>
                            </div>
                        </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

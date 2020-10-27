<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Font GOOGLE -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!-- LOCAL STATIC-->
        <link href="/css/style.css" rel="stylesheet">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse justify-content-between" id='navbar'>
                    <a href="/" class="navbar-brand">LOGO</a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route("home") }}" class="nav-link">Eventos</a>
                        </li>
                        @guest
                        @else
                            <li class="nav-item">
                                <a href="{{ route('my_events') }}" class="nav-link">Meus eventos</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('events_relatorios') }}" class="nav-link">Relatórios</a>
                            </li>
                        @endguest
                        <li class="nav-item">
                            <a href="{{ route('cadastro_evento_get') }}" class="nav-link">Criar Evento</a>
                        </li>




                        {{-- ESTUDAR ISSO --}}
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest





                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            @yield('content')
        </div>
        <!-- Footer -->
        <footer class="page-footer font-small blue">
            <div class="footer-copyright text-center py-3">© 2020 Copyright
            </div>
        </footer>
        <!-- Footer -->
    </body>
    {{-- Jquery|AJAX --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    @yield('ext_script')
</html>

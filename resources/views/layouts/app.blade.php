<!DOCTYPE html class="h-100">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-100">
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
    </form>
    
    <div id="app" class="h-100">

        <b-navbar toggleable="md" type="dark" variant="primary">

            <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

            <b-navbar-brand href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </b-navbar-brand>

            <b-collapse is-nav id="nav_collapse">

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    @guest
                        <b-nav-item href="{{ route('login') }}">{{ __('Ingresar') }}</b-nav-item>
                        <b-nav-item href="{{ route('register') }}">{{ __('Registro') }}</b-nav-item>
                    @else

                        <b-nav-item-dropdown text="{{ Auth::user()->name }}" right>
                            <b-dropdown-item 
                            @click="logout">
                                {{ __('Cerrar sesion') }}
                            </b-dropdown-item>
                        </b-nav-item-dropdown>

                    @endguest
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>

        <main>
            @yield('content')
        </main>
    </div>
    
    <script>

    </script>
</body>
</html>

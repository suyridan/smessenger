<!DOCTYPE html>
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
<body>
    <div id="app">

        <b-navbar toggleable="md" type="dark" variant="info">

            <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

            <b-navbar-brand href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</b-navbar-brand>

            <b-collapse is-nav id="nav_collapse">

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
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
                        <b-nav-item-dropdown right>
                            <template slot="button-content">
                            <em>{{ Auth::user()->name }}</em>
                            </template>
                            <b-dropdown-item 
                            class="click-me"
                            >Signout</b-dropdown-item>
                        </b-nav-item-dropdown>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        document.addEventListener('click', function (event) {
            // If the clicked element doesn't have the right selector, bail
            if (!event.target.matches('.click-me')) return;
            // Don't follow the link
            event.preventDefault();
            // Log the clicked element in the console
            document.getElementById('logout-form').submit();
        }, false);
    </script>
</body>
</html>

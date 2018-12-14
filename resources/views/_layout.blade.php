<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no">


    {{--@if(App::environment('production'))--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ elixir('css/all.css') }}">--}}
    {{--@else--}}
    <link rel="stylesheet" type="text/css" href="{{ url('css/all.css') }}">
    {{--@endif--}}


</head>
<body class="{{ Request::is('efekt') ? 'body-effect' : '' }}">

<div id="site ">


    <header class="@yield('headerClass')">
        <div class="wrap">
            <div class="logo">
                <img src="./img/logo.svg" alt="">
            </div>
            <nav>

                <a href="{{ url('/') }}" class="nav-link  {{ Request::is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ url('albums') }}" class="nav-link {{ Request::is('albums') ? 'active' : '' }}">Albums</a>
                <a href="{{ url('authors') }}" class="nav-link {{ Request::is('authors') ? 'active' : '' }}">Authors</a>
                <a href="{{ url('albums/add') }}" class="nav-link {{ Request::is('albums/add') ? 'active' : '' }}">Add
                    album</a>
                <a href="{{ url('authors/add') }}" class="nav-link {{ Request::is('authors/add') ? 'active' : '' }}">Add
                    author</a>
                <a href="{{ url('songs') }}" class="nav-link {{ Request::is('songs') ? 'active' : '' }}">Songs</a>
                <a href="{{ url('songs/add') }}" class="nav-link {{ Request::is('songs/add') ? 'active' : '' }}">Add
                    song</a>

            </nav>

        </div>

    </header>


    <div class="wrap">
        @yield('content')
    </div>

    <div id="site">
        @yield('content-effect')

    </div>
    <footer class="light">

    </footer>
</div>

@if(App::isLocal())
    <script src="/js/all.js"></script>
@else
    <script src="{{ elixir('js/all.js') }}"></script>
@endif

{{--<script>--}}
{{--AOS.init();--}}
{{--</script>--}}
@yield('scripts')
</body>
</html>

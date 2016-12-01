<!doctype html>
<html lang="en">
<head>
    @include('partials._head')
</head>
<body>
    <div class="container">
        @include('partials._nav')

       {{-- @if (Route::has('login'))

                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                @endif

        @endif--}}
        @include('partials._massage')
        @yield('content')
        @include('partials._footer')
    </div>
    @yield('js')
</body>
</html>
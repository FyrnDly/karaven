<!doctype html>
<html>
<head>
    <!-- CSRF Token -->
    @stack('pra-style')
    <title>KaraVen | @yield('title')</title>
    @include('include.style')
    @stack('add-style')
</head>
<body>
    @include('include.navbar.navsimple')

    @yield('content')

    @include('include.footer')

    @stack('pra-script')
    @include('include.script')
    @stack('add-script')
</body>
</html>


<!doctype html>
<html lang="en">
<head>
    <title>KaraVen | @yield('title')</title>
    @stack('pra-style')
    @include('include.style')
    @stack('add-style')
</head>

<body>
    @include('include.navbar.navbar')
    @include('include.header')

    @yield('content')

    @include('include.footer')

    @stack('pra-script')
    @include('include.script')
    <script src="{{ url('user/script/form.js') }}"></script>
    @stack('add-script')
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.include.head')
    @stack('addon-style')
 
</head>

<body>
    @include('sweetalert::alert')
    @include('frontend.include.navbar')

    @yield('content')

    @include('frontend.include.footer')

    @stack('prepend-script')
    @include('frontend.include.script')
    @stack('addon-script')
</body>

</html>

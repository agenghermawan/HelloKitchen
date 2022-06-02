<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.include.head')
    @stack('addon-style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.2/dist/select2-bootstrap4.min.css"
        rel="stylesheet" />
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

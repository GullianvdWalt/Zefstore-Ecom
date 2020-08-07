<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Zefstore | @yield('title', '')</title>

    <!-- Styles -->
    <link href="{{  asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- Google Material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/294de1ac21.js"></script>

    @yield('extra-css')
</head>

<body>
    @include('partials.nav')

    @yield('content')


    @include('partials.footer')

    @yield('extra-js')
</body>

</html>

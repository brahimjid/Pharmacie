<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- scripts -->
    <script src="/js/app.js" defer></script>

    <!-- fonts -->
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=nunito" rel="stylesheet">--}}

    <!-- styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/selectize.default.css" rel="stylesheet">
    <link href="/css/all.min.css" rel="stylesheet">
    <link href="/css/sb-admin-2.css" rel="stylesheet">

    <link href="/css/fontawesome.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">

</head>
<body>
{{--<div class="spinner"></div>--}}
    <div id="app">
        @yield('content')
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/sb-admin-2.min.js"></script>
    <script src="/js/selectize.js"></script>
    <script src="/js/custom.js"></script>
    @yield('page-/js-script')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="x-ua-compatible" content="IE=9"/>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ setting('site.title') }}</title>
    <meta name="description" content="{{ setting('site.description') }}">
    <meta name="keywords" content="{{ setting('site.keywords') }}">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/slavna-logo-tab.png') }}">

    @include('partials.css')

    @yield('css')
</head>

<body>

@yield('content')

@include('partials.scripts')
@yield('scripts')
</body>
</html>
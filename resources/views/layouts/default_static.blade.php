<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <meta name="theme-color" content="#FF3A4E">
    
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="manifest" type="application/manifest+json" href="/manifest.json">

    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.headercss')
    @yield('headercss')
    @include('layouts.headerjs')
    @yield('headerjs')

</head>

{{--  <div class="hide">
    <object type="image/svg+xml" data="" >
        Your browser does not support SVG
    </object>
</div>  --}}

<body class="main-page">
<div class="wrapper" id="app">
    <div class="content">
        @include('sections.header')
        <div class="clearfix"></div>
        <div id="onepage-scroll-wrapper">
            @yield('content')
        </div>
            <div id="cookie-message" class="cookie-message js_msg hide">
                <p class="title">Cookie Notification</p>
                <p>By continuing to browse our site you agree to our use of cookies, revised <a href="privacy" target="_blank" rel="noopener"></a>. More information about <a href="http://www.allaboutcookies.org/" target="_blank" rel="noopener">cookies</a></p>
                <a href="#" id="click" class="btn btn-main-color inverse js_close-msg">Got it!</a>
            </div>
    </div>
     @include('sections.footer')
</div>

@include('layouts.footercss')
@yield('footercss')
@include('layouts.footerjs')
@yield('footerjs')
@include('partials.analytics')

</body>
</html>

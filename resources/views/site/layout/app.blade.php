<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Auth::check())
        <meta name="user_id" content="{{ Auth::id() }}" />
    @endif
    <title>{{ config('app.name') }} </title>
    <script src="{{ asset('js/site.js') }}"></script>
    <link rel="icon" type="image/ico" href="{{ asset('site/img/favicon.ico') }}" sizes="any"/>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('site/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    @yield('css')
    @yield('vue')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

@include('site.layout.header')
<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a href="@yield('redirect')">Admin</a>
        </li>
        <li class="breadcrumb-item active">@yield('title')</li>

    </ol>
    <div class="container-fluid">
    @yield('content')
    </div>
</main>
</div>
<script src="{{ asset('js/script.js') }}"></script>
@yield('js')
</body>
</html>

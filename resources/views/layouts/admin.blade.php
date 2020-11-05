<!DOCTYPE html>
<html>
<head>
    <title>{{config('app.name','Application Name')}} - @yield('title')</title>
    @section('header')
        @include('layouts.admin-parts.header')
    @show
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    @section('layout.navigation')
        @include('layouts.admin-parts.navigation')
    @show
    @section('sidebar')
        @include('layouts.admin-parts.sidebar')
    @show
    <div class="content-wrapper">
        @yield('content')
    </div>
    @section('footer')
        @include('layouts.admin-parts.footer')
    @show

</div>
@section('scripts')
    @include('layouts.admin-parts.scripts')
@show
</body>
</html>
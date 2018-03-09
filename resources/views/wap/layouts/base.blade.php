<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>我的生活</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="{{url('light7/dist/css/light7.min.css')}}">
    <link rel="stylesheet" href="{{url('light7/dist/css/light7-swiper.min.css')}}">
    {{--<link rel="stylesheet" href="{{url('frozenui/css/frozen.css')}}">--}}
    <link rel="stylesheet" href="{{url('wap/css/style.css')}}">
</head>
<body>
<div class="page-group">
    <div class="page">
        @include('wap.layouts.head')
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>

@yield('panel')
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript' src='{{url('light7/dist/js/light7.min.js')}}' charset='utf-8'></script>
<script type='text/javascript' src='{{url('light7/dist/js/light7-swiper.min.js')}}' charset='utf-8'></script>
{{--<script type='text/javascript' src='{{url('frozenui/lib/zepto.min.js')}}' charset='utf-8'></script>--}}
{{--<script type='text/javascript' src='{{url('frozenui/js/frozen.js')}}' charset='utf-8'></script>--}}
@yield('jss')
</body>
</html>
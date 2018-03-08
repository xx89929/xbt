<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>FrozenUI Demo</title>
    <link rel="stylesheet" href="{{url('frozenui/css/frozen.css')}}">
    <link rel="stylesheet" href="{{url('wap/css/style.css')}}">

</head>
<body ontouchstart>
@include('wap.layouts.head')
@include('wap.layouts.foot')
@yield('content')

{{--<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>--}}
<script src="{{url('frozenui//lib/zepto.min.js')}}"></script>
<script src="{{url('frozenui/js/frozen.js')}}"></script>
@yield('jss')
</body>
</html>
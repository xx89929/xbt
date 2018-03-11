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
        @yield('content')
    </div>
</div>

<div class="panel panel-left panel-reveal theme-dark" id='member-panel'>
    <div class="content-block-title">会员管理</div>
    <div class="list-block">
        <ul>
            <li class="item-content">
                <div class="item-inner">

                    <div class="item-after">注册</div>
                </div>
            </li>
            <li class="item-content">
                <div class="item-inner">
                    <div class="item-after">登陆</div>
                </div>
            </li>
        </ul>
    </div>

    <div class="content-block-title">医师管理</div>
    <div class="list-block">
        <ul>
            <li class="item-content">
                <div class="item-inner">
                    <div class="item-after">审核</div>
                </div>
            </li>
            <li class="item-content">
                <div class="item-inner">
                    <div class="item-after">登陆</div>
                </div>
            </li>
        </ul>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript' src='{{url('light7/dist/js/light7.min.js')}}' charset='utf-8'></script>
<script type='text/javascript' src='{{url('light7/dist/js/light7-swiper.min.js')}}' charset='utf-8'></script>
{{--<script type='text/javascript' src='{{url('frozenui/lib/zepto.min.js')}}' charset='utf-8'></script>--}}
{{--<script type='text/javascript' src='{{url('frozenui/js/frozen.js')}}' charset='utf-8'></script>--}}
<script>
    $('#member-panel-button').click(function () {
        if($('#member-panel').css('display') === 'none'){
            $(this).addClass('open-panel').removeClass('close-panel');
        }
        else {
            $(this).addClass('close-panel').removeClass('open-panel');
        }
    })
</script>
<script>
    $.config = {
        router: 'false',
    }
</script>
@yield('jss')
</body>
</html>
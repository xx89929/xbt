<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>修巴堂</title>

    <!-- Bootstrap -->
    <link href="{{url('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('home/asset/base.css')}}" rel="stylesheet">
    <link href="{{url('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('bv/bootstrapValidator.min.css')}}" rel="stylesheet">

    {{--百度商桥--}}
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?943fb401aa09429271c41f102f12ce0e";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>
<div class="load-box"><i class="fa fa-spinner fa-pulse"></i></div>
<div class="container-fluid">
    <div class="body-warp">
        @include('home.layout.partials.top-box')
        @include('home.layout.partials.nav')
        @yield('content')
        @include('home.layout.partials.footer')
    </div>
</div>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('lazyload/lazyload.min.js')}}"></script>
<script src="{{url('bv/bootstrapValidator.min.js')}}"></script>
<script src="{{url('home/js/xbt.js')}}"></script>

</body>
</html>
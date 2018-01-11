<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="{{url('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('home/asset/base.css')}}" rel="stylesheet">
    <link href="{{url('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('lazyload/lazyload.min.js')}}"></script>
    <script src="{{url('lazyload/scrollstop.min.js')}}"></script>
</head>
<body>
<div class="container-fluid">
    <div class="body-warp">
        @include('home.layout.partials.top-box')
        @include('home.layout.partials.nav')
        @yield('content')
        @include('home.layout.partials.footer')
    </div>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script>
    $("img.lazy").lazyload({
        effect : "fadeIn",
        skip_invisible : false,
    });
</script>
</body>
</html>
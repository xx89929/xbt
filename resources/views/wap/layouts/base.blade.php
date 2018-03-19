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
@yield('content')
@yield('left-panel')
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script>
    $.config = {
        router: false, //no recommend
    }
</script>
<script type='text/javascript' src='{{url('light7/dist/js/light7.min.js')}}' charset='utf-8'></script>
<script type='text/javascript' src='{{url('light7/dist/js/light7-swiper.min.js')}}' charset='utf-8'></script>
<script type="text/javascript" src="{{url('light7/dist/js/light7-city-picker.min.js')}}" charset="utf-8"></script>

<script>
    $('#member-panel-button').click(function () {
        console.log($('#member-panel').css('display'));
        if($('#member-panel').css('display') === 'none'){
            $(this).addClass('open-panel').removeClass('close-panel');
        }
        else {
            $(this).addClass('close-panel').removeClass('open-panel');
        }
    })
</script>
@yield('jss')
<script type='text/javascript' src='{{url('wap/js/base.js')}}' charset='utf-8'></script>


@if(session('success'))
    <script>
        $(function() {
            $.alert("{{session('success')}}");
        });
    </script>

@elseif(session('error'))
    <script>
        $(function() {
            $.alert("{{session('error')}}");
        });
    </script>
@endif
@if($errors->all())
    <script>
        $(function() {
            $.alert("{{$errors->first()}}");
        });
    </script>
@endif

</body>
</html>
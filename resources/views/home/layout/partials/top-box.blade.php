<div class="top-box">
    <div class="container">
        <div class="top-box-f1  clearfix pull-left">
            <p class="pull-left">欢迎光临修吧堂有限公司，联系我们：</p>
            <ul class="list-inline pull-left">
                <li class="top-weixin-code-li">
                    <a><i class="fa fa-weixin"></i></a>
                    <div class="top-weixin-code">
                        <img src="{{url('home/images/icon/hyCode.jpg')}}">
                    </div>
                </li>
                <li><a><i class="fa fa-qq"></i></a></li>
                <li><a><i class="fa fa-weibo"></i></a></li>
            </ul>
        </div>

        <div class="top-box-f2 pull-right">
            <ul class="list-inline">
                <li><a href="#">登陆</a> </li>
                <li><a href="#">注册</a> </li>
                <li class="buy_car"><a href="#">购物车</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
    $('.top-weixin-code-li').hover(function () {
        $(this).find('div.top-weixin-code').show();
    },function () {
        $(this).find('div.top-weixin-code').hide();
    })
</script>
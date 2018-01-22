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
                @guest
                <li><a href="{{route('login.show')}}">登陆</a></li>
                <li><a href="{{route('reg.show')}}">注册</a> </li>
                @endguest
                @auth
                    <div class="user-set-f1-list">
                        <a>
                            <div class="user-account">{{Auth::user()->username}}</div><i class="fa fa-angle-down"></i>
                        </a>
                        <div class="user-set-l-list">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{route('member.info')}}"><i class="fa fa-user-circle"></i>个人中心</a>
                                </li>
                                <li>
                                    <a href="{{route('member.order')}}"><i class="fa fa-sticky-note"></i>我的订单</a>
                                </li>
                                <li>
                                    <a href="{{route('member.safe')}}"><i class="fa fa-cog"></i>账号设置</a>
                                </li>
                                <li>
                                    <a href="{{route('member.finace')}}"><i class="fa fa-cog"></i>我的账户</a>
                                </li>
                                <li class="ind-user-logout">
                                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>退出</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endauth
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

    $('.user-set-f1-list').hover(function () {
        $('.user-set-l-list').show();
        $('.user-set-f1-list > a > i').attr('class','fa fa-angle-up');
    },function () {
        $('.user-set-l-list').hide();
        $('.user-set-f1-list > a > i').attr('class','fa fa-angle-down');
    })
</script>
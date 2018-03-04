<div class="top-box">
    <div class="container">
        <div class="top-box-f1  clearfix pull-left">
            <p class="pull-left">欢迎光临修巴堂有限公司，联系我们：</p>
            <ul class="list-inline pull-left">
                <li class="top-weixin-code-li">
                    <a><i class="fa fa-weixin"></i></a>
                    <div class="top-weixin-code">
                        <img src="{{url('home/images/icon/weixin_code.png')}}">
                    </div>
                </li>
                <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2763445064&site=qq&menu=yes"><i class="fa fa-qq "></i></a></li>
                <li><a href="https://weibo.com/5121219389/manage" target="_blank" ><i class="fa fa-weibo"></i></a></li>
            </ul>
        </div>

        <div class="top-box-f2 pull-right">
            <ul class="list-inline">
                @guest
                <li><a href="{{route('login.show')}}">会员登陆</a></li>
                <li><a href="{{route('reg.show')}}">会员注册</a> </li>
                @endguest
                @guest('doctor')
                <li><a href="{{route('docreg.show')}}">医生审核</a> </li>
                <li><a href="{{route('doclog.show')}}">医生登陆</a> </li>
                @endguest

                @auth
                    <li>
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
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endauth


                @auth('doctor')
                    <li>
                        <div class="user-set-f1-list">
                            <a>
                                <div class="user-account">{{ Auth::guard('doctor')->user()->realname }}</div><i class="fa fa-angle-down"></i>
                            </a>
                            <div class="user-set-l-list">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{route('doc.info')}}"><i class="fa fa-user-circle"></i>个人中心</a>
                                    </li>
                                    <li>
                                        <a href="{{route('doc.safe')}}"><i class="fa fa-cog"></i>账号设置</a>
                                    </li>
                                    <li>
                                        <a href="{{route('doc.cash')}}"><i class="fa fa-cog"></i>我的账户</a>
                                    </li>
                                    <li class="ind-user-logout">
                                        <a onclick="event.preventDefault();document.getElementById('doc-logout-form').submit();"><i class="fa fa-power-off"></i>退出</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <form id="doc-logout-form" action="{{ route('doc.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</div>

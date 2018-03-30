
<header class="bar bar-nav">
    <span class="icon icon-menu open-panel pull-left " id="member-panel-button" data-panel='#left-panel-button'></span>
    <h1 class="title">{{$pageTitle}}</h1>
</header>
<nav class="bar bar-tab">
    {{--<a class="tab-item @if($headNav == 'index') active @endif" href="{{route('/')}}">--}}
    <a class="tab-item @if($headNav == 'index') active @endif " href="{{route('/')}}">
        <span class="icon icon-home"></span>
        <span class="tab-label">首页</span>
    </a>
    <a class="tab-item @if($headNav == 'store') active @endif" href="{{route('store.list')}}">
        <span class="icon icon-browser"></span>
        <span class="tab-label">门店</span>
    </a>
    <a class="tab-item @if($headNav == 'case') active @endif " href="{{route('case')}}">
        <span class="icon icon-emoji"></span>
        <span class="tab-label">案例</span>
    </a>
    <a class="tab-item  @if($headNav == 'product') active @endif " href="{{route('product')}}">
        <span class="icon icon-gift"></span>
        <span class="tab-label">产品</span>
    </a>
    <a class="tab-item @if($headNav == 'news') active @endif " href="{{route('news')}}">
        <span class="icon icon-computer"></span>
        <span class="tab-label">新闻</span>
    </a>
    <a class="tab-item @if($headNav == 'auth') active @endif"

           @auth('doctor')
                href="{{route('doc.info')}}"
            @endauth

            @auth
                href="{{route('member.info')}}"
            @endauth
                href="{{route('login.show')}}"
    >
        <span class="icon icon-me"></span>
        <span class="tab-label">我</span>
    </a>
</nav>
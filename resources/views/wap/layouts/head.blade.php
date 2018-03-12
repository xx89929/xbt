
<header class="bar bar-nav">

    <a class="icon icon-left pull-left back"></a>
    <span class="icon icon-friends open-panel pull-left " id="member-panel-button" data-panel='#member-panel'></span>
    <a class="icon icon-refresh pull-right"></a>
    <h1 class="title">{{$pageTitle}}</h1>
</header>
<nav class="bar bar-tab">
    <a class="tab-item @if($headNav == 'index') active @endif" href="{{route('/')}}">
        <span class="icon icon-home"></span>
        <span class="tab-label">首页</span>
    </a>
    <a class="tab-item" href="#">
        <span class="icon icon-browser"></span>
        <span class="tab-label">门店</span>
    </a>
    <a class="tab-item @if($headNav == 'case') active @endif" href="{{route('case')}}">
        <span class="icon icon-emoji"></span>
        <span class="tab-label">案例</span>
    </a>
    <a class="tab-item" href="#">
        <span class="icon icon-gift"></span>
        <span class="tab-label">产品</span>
    </a>
    <a class="tab-item" href="#">
        <span class="icon icon-computer"></span>
        <span class="tab-label">新闻</span>
    </a>
    <a class="tab-item" href="#">
        <span class="icon icon-me"></span>
        <span class="tab-label">我</span>
    </a>
</nav>
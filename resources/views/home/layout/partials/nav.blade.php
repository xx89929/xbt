<div class="container">
    <div class="nav-warp clearfix">
        <div class="logo pull-left">
            <a><img src="{{url('home/images/logo/logo_icon.png')}}"></a>
        </div>

        <div class="nav-ul pull-left clearfix">
            <ul class="list-inline pull-left">
                <li @if(isset($headNav) && $headNav== 'index') class="active" @endif><a href="{{route('/').'/'}}">修巴堂首页</a></li>
                <li @if(isset($headNav) && $headNav == 'store') class="active" @endif><a href="{{route('store')}}">线下门店</a></li>
                <li @if(isset($headNav) && $headNav == 'case') class="active" @endif><a href="{{route('case')}}">真实案例</a></li>
                <li @if(isset($headNav) && $headNav == 'product') class="active" @endif><a href="{{route('product')}}">产品中心</a></li>
                <li @if(isset($headNav) && $headNav == 'news') class="active" @endif><a href="{{route('news')}}">热点新闻</a></li>
                <li @if(isset($headNav) && $headNav == 'partner') class="active" @endif><a href="{{route('partner')}}">加盟合作</a></li>
                <li @if(isset($headNav) && $headNav == 'contact') class="active" @endif><a href="{{route('contact')}}">联系我们</a></li>
            </ul>
            <div class="clearfix nav_search pull-left">
                <form method="get" action="{{route('product')}}">
                    {{csrf_field()}}
                    <div class="search_input pull-left">
                        <input name="pro_name" type="text" placeholder="请输入想搜索产品">
                    </div>
                    <div class="search_button pull-left">
                        <button type="submit" >搜索</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

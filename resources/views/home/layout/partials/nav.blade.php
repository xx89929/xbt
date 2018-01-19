<div class="container">
    <div class="nav-warp clearfix">
        <div class="logo pull-left">
            <a><img src="{{url('home/images/logo/logo_icon.png')}}"></a>
        </div>

        <div class="nav-ul pull-right">
            <ul class="list-inline">
                <li><a href="{{route('/').'/'}}">修巴堂首页</a></li>
                <li><a href="{{route('facade')}}">线下门店</a></li>
                <li><a href="{{route('case')}}">真实案例</a></li>
                <li><a href="{{route('product')}}">产品中心</a></li>
                <li><a href="{{route('news')}}">热点新闻</a></li>
                <li><a href="{{route('partner')}}">加盟合作</a></li>
                <li><a href="{{route('contact')}}">联系我们</a></li>

                <li class="clearfix nav_search">
                    <div class="search_input pull-left">
                        <input type="text" placeholder="请输入想搜索产品">
                    </div>
                    <div class="search_button pull-left">
                        <button type="submit" >搜索</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    $(function () {
        var tDiv = $('.nav-ul > ul'),
            links = tDiv.find('a'),
            index = 0,//默认第一个菜单项
            url = window.location.href.replace(/\/$/,' ');

        if(url){//如果有取到, 则进行匹配, 否则默认为首页(即index的值所指向的那个)
            for (var i=links.length; i--;) {//遍历 menu 的中连接地址
                if(links[i].href.indexOf(url) !== -1){

                    index = i;
                    break;
                }
            }
            links[index].parentNode.className = 'active';
        }
    })



</script>

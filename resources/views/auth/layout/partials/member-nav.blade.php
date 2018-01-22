<div class="member-nav-tit">
    <h4>个人中心</h4>
</div>
<div class="member-nav-box">
    <ul class="list-unstyled">
        <li><a href="{{route('member.info')}}">个人信息</a></li>
        <li><a href="{{route('member.safe')}}">账号安全</a></li>
        <li><a href="{{route('member.order')}}">我的订单</a></li>
        <li><a href="{{route('member.finace')}}">我的账户</a></li>
        <li><a href="{{route('member.address')}}">收货地址</a></li>
    </ul>
</div>


<script>
    $(function () {
        var tDiv = $('.member-nav-box > ul'),
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
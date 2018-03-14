<div class="panel panel-left panel-reveal theme-dark" id='left-panel-button'>
    <div class="content-block-title">会员中心</div>
    <div class="list-block">
        <ul>
            <li class="item-content">
                <div class="item-inner auth-sider" url="{{route('member.info')}}">
                    <div class="item-after">会员信息</div>
                </div>
            </li>

            <li class="item-content">
                <div class="item-inner auth-sider" url="{{route('member.order')}}">
                    <div class="item-after">我的订单</div>
                </div>
            </li>

            <li class="item-content">
                <div class="item-inner auth-sider" url="{{route('member.finace')}}">
                    <div class="item-after">我的账户</div>
                </div>
            </li>

            <li class="item-content">
                <div class="item-inner auth-sider" url="{{route('member.address')}}">
                    <div class="item-after">收货地址</div>
                </div>
            </li>
        </ul>
    </div>
</div>
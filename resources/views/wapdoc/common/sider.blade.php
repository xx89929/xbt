<div class="panel panel-left panel-reveal theme-dark" id='left-panel-button'>
    <div class="content-block-title">医师中心</div>
    <div class="list-block">
        <ul>
            <li class="item-content">
                <div class="item-inner auth-sider" url="{{route('doc.info')}}">
                    <div class="item-after">医师信息</div>
                </div>
            </li>

            <li class="item-content">
                <div class="item-inner auth-sider" url="{{route('doc.safe')}}">
                    <div class="item-after">账号安全</div>
                </div>
            </li>

            <li class="item-content">
                <div class="item-inner auth-sider" url="{{route('doc.cash')}}">
                    <div class="item-after">我的账户</div>
                </div>
            </li>

            <li class="item-content">
                <div class="item-inner auth-sider" url="{{route('doc.cash.list')}}">
                    <div class="item-after">提现记录</div>
                </div>
            </li>
        </ul>
    </div>
</div>
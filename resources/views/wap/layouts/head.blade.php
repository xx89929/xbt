<header class="ui-header ui-header-stable ui-border-b header-wap">
    <i class="ui-icon-return" onclick="history.back()"></i>
    <div class="ui-searchbar-wrap ui-border-b">
        <div class="ui-searchbar ui-border-radius">
            <i class="ui-icon-search"></i>
            <div class="ui-searchbar-text">请输入想查询的产品</div>
            <div class="ui-searchbar-input"><input value="" type="tel" placeholder="请输入想查询的产品" autocapitalize="off"></div>
            <i class="ui-icon-close"></i>
        </div>
        <button class="ui-searchbar-cancel">取消</button>
    </div>
    <button class="ui-btn">回首页</button>
</header>
@section('jss')
    <script type="text/javascript">
        $('.ui-searchbar').tap(function(){
            $('.ui-searchbar-wrap').addClass('focus');
            $('.ui-searchbar-input input').focus();
        });
        $('.ui-searchbar-cancel').tap(function(){
            $('.ui-searchbar-wrap').removeClass('focus');
        });
    </script>
@endsection
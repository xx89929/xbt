<div class="container">
    <div class="nav-warp clearfix">
        <div class="logo pull-left">
            <a><img src="<?php echo e(url('home/images/logo/logo_icon.png')); ?>"></a>
        </div>

        <div class="nav-ul pull-right">
            <ul class="list-inline">
                <li><a href="<?php echo e(route('/').'/'); ?>">修巴堂首页</a></li>
                <li><a href="<?php echo e(route('store')); ?>">线下门店</a></li>
                <li><a href="<?php echo e(route('case')); ?>">真实案例</a></li>
                <li><a href="<?php echo e(route('product')); ?>">产品中心</a></li>
                <li><a href="<?php echo e(route('news')); ?>">热点新闻</a></li>
                <li><a href="<?php echo e(route('partner')); ?>">加盟合作</a></li>
                <li><a href="<?php echo e(route('contact')); ?>">联系我们</a></li>

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

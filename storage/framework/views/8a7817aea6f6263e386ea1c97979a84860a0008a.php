<div class="container">
    <div class="nav-warp clearfix">
        <div class="logo pull-left">
            <a><img src="<?php echo e(url('home/images/logo/logo_icon.png')); ?>"></a>
        </div>

        <div class="nav-ul pull-left clearfix">
            <ul class="list-inline pull-left">
                <li <?php if(isset($headNav) && $headNav== 'index'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('/').'/'); ?>">修巴堂首页</a></li>
                <li <?php if(isset($headNav) && $headNav == 'store'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('store')); ?>">线下门店</a></li>
                <li <?php if(isset($headNav) && $headNav == 'case'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('case')); ?>">真实案例</a></li>
                <li <?php if(isset($headNav) && $headNav == 'product'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('product')); ?>">产品中心</a></li>
                <li <?php if(isset($headNav) && $headNav == 'news'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('news')); ?>">热点新闻</a></li>
                <li <?php if(isset($headNav) && $headNav == 'partner'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('partner')); ?>">加盟合作</a></li>
                <li <?php if(isset($headNav) && $headNav == 'contact'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('contact')); ?>">联系我们</a></li>
            </ul>
            <div class="clearfix nav_search pull-left">
                <div class="search_input pull-left">
                    <input type="text" placeholder="请输入想搜索产品">
                </div>
                <div class="search_button pull-left">
                    <button type="submit" >搜索</button>
                </div>
            </div>
        </div>
    </div>
</div>

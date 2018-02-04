<div class="top-box">
    <div class="container">
        <div class="top-box-f1  clearfix pull-left">
            <p class="pull-left">欢迎光临修巴堂有限公司，联系我们：</p>
            <ul class="list-inline pull-left">
                <li class="top-weixin-code-li">
                    <a><i class="fa fa-weixin"></i></a>
                    <div class="top-weixin-code">
                        <img src="<?php echo e(url('home/images/icon/hyCode.jpg')); ?>">
                    </div>
                </li>
                <li><a><i class="fa fa-qq"></i></a></li>
                <li><a><i class="fa fa-weibo"></i></a></li>
            </ul>
        </div>

        <div class="top-box-f2 pull-right">
            <ul class="list-inline">
                <?php if(auth()->guard()->guest()): ?>
                <li><a href="<?php echo e(route('login.show')); ?>">会员登陆</a></li>
                <li><a href="<?php echo e(route('reg.show')); ?>">会员注册</a> </li>
                <?php endif; ?>
                <?php if(auth()->guard('doctor')->guest()): ?>
                <li><a href="<?php echo e(route('docreg.show')); ?>">医生审核</a> </li>
                <li><a href="<?php echo e(route('doclog.show')); ?>">医生登陆</a> </li>
                <?php endif; ?>

                <?php if(auth()->guard()->check()): ?>
                    <li>
                        <div class="user-set-f1-list">
                            <a>
                                <div class="user-account"><?php echo e(Auth::user()->username); ?></div><i class="fa fa-angle-down"></i>
                            </a>
                            <div class="user-set-l-list">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="<?php echo e(route('member.info')); ?>"><i class="fa fa-user-circle"></i>个人中心</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('member.order')); ?>"><i class="fa fa-sticky-note"></i>我的订单</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('member.safe')); ?>"><i class="fa fa-cog"></i>账号设置</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('member.finace')); ?>"><i class="fa fa-cog"></i>我的账户</a>
                                    </li>
                                    <li class="ind-user-logout">
                                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>退出</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
                <?php endif; ?>


                <?php if(auth()->guard('doctor')->check()): ?>
                    <li>
                        <div class="user-set-f1-list">
                            <a>
                                <div class="user-account"><?php echo e(Auth::guard('doctor')->user()->realname); ?></div><i class="fa fa-angle-down"></i>
                            </a>
                            <div class="user-set-l-list">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="<?php echo e(route('member.info')); ?>"><i class="fa fa-user-circle"></i>个人中心</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('member.order')); ?>"><i class="fa fa-sticky-note"></i>我的订单</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('member.safe')); ?>"><i class="fa fa-cog"></i>账号设置</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('member.finace')); ?>"><i class="fa fa-cog"></i>我的账户</a>
                                    </li>
                                    <li class="ind-user-logout">
                                        <a onclick="event.preventDefault();document.getElementById('doc-logout-form').submit();"><i class="fa fa-power-off"></i>退出</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <form id="doc-logout-form" action="<?php echo e(route('doc.logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

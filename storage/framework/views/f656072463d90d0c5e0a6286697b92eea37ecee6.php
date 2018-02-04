<?php $__env->startSection('content'); ?>
    <div class="bg-gray">
        <div class="container">
            <div class="order_status_box clearfix">
                <div class="col-xs-2 order_status_i text-center">
                    <?php if($status == 1): ?>
                    <i style="color: #7dd3ae" class="fa fa-check-circle"></i>
                    <?php else: ?>
                    <i style="color: rgba(165,0,0,0.8)" class="fa fa-times-circle"></i>
                    <?php endif; ?>
                </div>
                <div class="col-xs-7  order_status_des">
                    <?php if($status == 1): ?>
                    <h2>付款成功！</h2>
                    <?php else: ?>
                    <h2>付款失败！</h2>
                    <?php endif; ?>
                    <p><span>订单号：</span><em>2018020423204505616</em> <a>订单详情&nbsp;<i class="fa fa-caret-down"></i></a></p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
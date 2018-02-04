<?php $__env->startSection('content'); ?>
    <div class="member-warp">
        <div class="container">
            <div class="member-box clearfix">
                <div class="member-nav pull-left">
                    <?php echo $__env->make('auth.layout.partials.member-nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="member-con pull-left">
                    <?php echo $__env->yieldContent('auth-page'); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
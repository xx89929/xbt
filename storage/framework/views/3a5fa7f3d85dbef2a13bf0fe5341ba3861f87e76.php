<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.page.product.partials.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <?php echo $__env->make('home.page.product.partials.product-nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div class="bg-gray">
        <div class="container">
            <div class="product-f1 clearfix">
                <?php echo $__env->make('home.page.product.partials.product-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('home.page.product.partials.hot-product-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
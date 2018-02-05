<?php $__env->startSection('content'); ?>
    <div class="load-box"><i class="fa fa-spinner fa-pulse"></i></div>
    <?php echo $__env->make('home.page.index.partials.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('home.page.index.partials.hot-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="bg-gray">
        <div class="container">
            <?php echo $__env->make('home.page.index.partials.consult', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('home.page.index.partials.case', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <div class="container">
        <?php echo $__env->make('home.page.index.partials.news', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php echo $__env->make('home.page.index.partials.banner2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <?php echo $__env->make('home.page.index.partials.circum', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php echo $__env->make('home.page.index.partials.partner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php echo $__env->make('home.page.facade.partials.map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('home.page.facade.partials.hot-facade', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
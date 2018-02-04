<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.page.partner.partials.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="bg-gray">
        <div class="container">
            <div class="partner-box clearfix">
                <?php echo $__env->make('home.page.partner.partials.question', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('home.page.partner.partials.par_input', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
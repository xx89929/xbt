<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.page.news.partials.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <?php echo $__env->make('home.page.news.partials.news-nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div class="bg-gray">
        <div class="container">
            <?php echo $__env->make('home.page.news.partials.news-content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
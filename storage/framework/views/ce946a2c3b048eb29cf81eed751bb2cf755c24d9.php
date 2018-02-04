<div class="news-nav">
    <ul class="list-inline">
        <li class="active"><a href="<?php echo e(route('news')); ?>"><h4>全部新闻</h4></a></li>
        <?php $__currentLoopData = $newTag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li ><a href="<?php echo e(route('news',['tag_id' => $nt->id])); ?>"><h4><?php echo e($nt->name); ?></h4></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
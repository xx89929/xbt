<div class="ind-circum">
    <div class="ind-tit">
        <h3>服务环境</h3>
    </div>

    <div class="ind-circum-box text-center">
        <ul class="list-inline clearfix">
            <?php $__currentLoopData = $serviceEnv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $se): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="col-xs-2">
                <img class='lazy' data-original="<?php echo e(asset('storage/'.$se->pic)); ?>">
                <h5><?php echo e($se->title); ?></h5>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
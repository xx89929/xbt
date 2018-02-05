<div class="case-content pull-left">
    <ul class="list-inline">
        <?php $__currentLoopData = $case; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="col-xs-3">
            <a href="#">
                <div class="case-con-img">
                    <img class="lazy" data-original="<?php echo e(asset('storage/'.$ca->image)); ?>">
                </div>
                <div class="case-con-des text-center">
                    <h5><?php echo e(str_limit($ca->name,20)); ?></h5>
                    <span><?php echo e(str_limit($ca->describe,52)); ?></span>
                </div>
            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="lara_fenye text-center">
        <?php echo e($case->links()); ?>

    </div>
</div>
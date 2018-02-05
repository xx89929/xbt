<div class="ind-case">
    <div class="ind-tit clearfix">
        <h3>真实案例</h3>
        <a href="<?php echo e(route('case')); ?>">更多>></a>
    </div>
    <div class="ind-case-box">
        <ul class="list-inline clearfix">
            <?php $__currentLoopData = $case; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="col-xs-3">
                    <a href="#" class="ind-case-item">
                        <div class="ind-case-img">
                            <img class='lazy' data-original="<?php echo e(asset('storage/'.$ca->image)); ?>">
                        </div>
                        <div class="ind-case-des">
                            <p ><?php echo e(str_limit($ca->name,30)); ?></p>
                            <p><i><?php echo e($ca->CaseCateOne->title); ?></i></p>

                            <p><span><?php echo e(str_limit( $ca->describe,66)); ?></span></p>

                        </div>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
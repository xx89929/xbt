<div class="case-nav pull-left">
    <div class="case-nav-tit">
        <h4>案例分类</h4>
    </div>
    <div class="case-nav-con">
        <ul class="list-unstyled">
            <?php $__currentLoopData = $caseNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cn->parent_id == 0): ?>
            <li>
                <a>
                    <div class="case-nav-row clearfix">
                        <span class="pull-left"><?php echo e($cn->title); ?></span>
                        <i class="fa fa-chevron-right pull-right"></i>
                    </div>
                    <div class="case-nav-child">
                        <ul class="list-unstyled">
                            <?php $__currentLoopData = $caseNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($p->parent_id != 0 && $p->parent_id == $cn->id): ?>
                            <li>
                                <a href="<?php echo e(route('case',['id' => $p->id])); ?>">
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left"><?php echo e($p->title); ?></span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </a>
            </li>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>

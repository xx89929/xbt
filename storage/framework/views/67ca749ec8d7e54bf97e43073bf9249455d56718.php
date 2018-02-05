<div class="container">
    <div class="i-banner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ids): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($ids->order); ?>" class="active"></li>
                    <?php elseif($loop->iteration): ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($ids->order); ?>"></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner in-banner" role="listbox">
                <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ba): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?>
                <div class="item active">
                    <img class="lazy" data-original="<?php echo e(asset('storage/'.$ba->pic)); ?>" alt="...">
                </div>
                    <?php elseif($loop->iteration): ?>
                        <div class="item">
                            <img class="lazy" data-original="<?php echo e(asset('storage/'.$ba->pic)); ?>" alt="...">
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="classify_nav_b">
            <div class="classify_nav_ul">
                <ul class="list-unstyled">
                    <?php $__currentLoopData = $proNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="clearfix">
                        <a class="pull-left"><?php echo e($pn->title); ?></a><i class="fa fa-angle-right pull-right"></i>
                        <div class="cla_item_dis">
                            <ul class="list-inline clearfix">
                                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pr->category_id == $pn->id): ?>
                                <li class="col-xs-6"><a href="<?php echo e(route('pro-info',['id' => $pr->id ])); ?>"><img src="<?php echo e(asset('storage/'.$pr->pics[0])); ?>"><?php echo e($pr->name); ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</div>

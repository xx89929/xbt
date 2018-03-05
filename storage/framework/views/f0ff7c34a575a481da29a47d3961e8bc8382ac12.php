<div class="hot-product-box pull-left">
    <div class="hot-product-box-tit">
        <h4>推荐产品</h4>
    </div>
    <div class="hot-product-box-b">
        <ul class="list-unstyled">
            <?php $__currentLoopData = $tui_pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="#" class="hot-pro-b-item">
                    <div class="hot-pro-b-item-img">
                        <img class="lazy" data-original="<?php echo e(asset('storage/'.$tp->pics[0])); ?>">
                    </div>
                    <div class="hot-pro-b-con text-center">
                        <p><span>￥<?php echo e(number_format($tp->price,2)); ?>元</span></p>
                        <p><?php echo e($tp->name); ?></p>
                    </div>
                </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
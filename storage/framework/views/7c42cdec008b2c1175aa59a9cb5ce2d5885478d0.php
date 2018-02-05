<div class="product-box pull-left">
    <ul class="list-unstyled">
        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <div class="pro-item clearfix">
                <div class="pro-item-img pull-left">
                    <img class="lazy" data-original="<?php echo e(asset('storage/'.$pro->pics[0])); ?>">
                </div>
                <div class="pro-item-cont pull-left">
                    <h4><?php echo e($pro->name); ?></h4>
                    <span><?php echo e($pro->specification); ?></span>
                    <p><?php echo e($pro->description); ?></p>
                </div>
                <div class="pro-item-r pull-left text-right">
                    <h3>￥<?php echo e(number_format($pro->price,2)); ?>元</h3>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('pro-info',['id' => $pro->id])); ?>" class="check-pro">查看详情</a></li>
                        <li><a href="#" class="jion-buy">加入收藏</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li>
            <div class="lara_fenye text-center">
                <?php echo e($product->links()); ?>

            </div>
        </li>
    </ul>
</div>

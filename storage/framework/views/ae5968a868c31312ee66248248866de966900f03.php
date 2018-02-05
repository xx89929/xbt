<div class="container">
    <div class="hot-product">
        <div class="ind-tit clearfix">
            <h3>热卖产品</h3>
            <a href="<?php echo e(route('product')); ?>">更多>></a>
        </div>
        <div class="hot-product_box">
            <ul class="list-inline">

                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="xbt-li-pro">
                        <a href="<?php echo e(route('pro-info',['id' => $pro->id])); ?>" class="hot-pro-item text-center">
                            <img class="lazy" data-original="<?php echo e(asset('storage/'.$pro->pics[0])); ?>">
                            <h5><?php echo e($pro->name); ?></h5>
                            <span><?php echo e($pro->description); ?></span>
                            <p class="product-price">￥<i><?php echo e($pro->price); ?>.00</i>元</p>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>

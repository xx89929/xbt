<div class="hot-facade">
    <div class="hot-facade-tit">
        <h4>推荐加盟店</h4>
    </div>
    <div class="hot-facade-list">
        <ul class="list-inline clearfix">
            <?php $__currentLoopData = $hotStore; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="col-xs-2">
                <div class="hot-facade-item ">
                    <div class="hot-facade-item-img">
                        <img class="lazy" data-original="<?php echo e(asset('storage/'.$hs->store_pic)); ?>">
                    </div>
                    <div class="hot-facade-item-des text-center">
                        <h5><?php echo e($hs->name); ?></h5>
                        <p style="display: none;" class="store-lat"><?php echo e($hs->lat); ?></p>
                        <p style="display: none;" class="store-lng"><?php echo e($hs->lng); ?></p>
                    </div>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>


</div>
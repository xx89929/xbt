<div class="news-cont">
    <ul class="list-inline clearfix">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="col-xs-3">
            <a href="<?php echo e(route('news.item',['id' => $n->id])); ?>">
                <div class="news-img">
                    <img class="lazy" data-original="<?php echo e(asset('storage/'.$n->pic)); ?>">
                </div>
                <div class="news-des">
                    <p><?php echo e(str_limit($n->describes,100)); ?></p>
                    <span>发布时间 | <i><?php echo e($n->updated_at); ?></i></span>
                    <h5><?php echo e(str_limit($n->title,30)); ?></h5>
                </div>
            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="lara_fenye text-center">
        <?php echo e($news->links()); ?>

    </div>
</div>

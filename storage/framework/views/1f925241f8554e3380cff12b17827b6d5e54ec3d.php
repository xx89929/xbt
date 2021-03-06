<div class="consult-adt clearfix">
    <div class="ind-tit">
        <h3>专家咨询</h3>
    </div>
    <div class="ind-consult pull-left">
        <ul class="list-inline">
            <?php $__currentLoopData = $Doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="ind-consult-f1">
                        <div class="consult-header">
                            <img class="lazy" data-original="<?php echo e(asset('storage/'.$doc->avatar)); ?>">
                        </div>
                        <div class="consult-des text-center">
                            <p><?php echo e($doc->doc_to_doc_group->title); ?>：<?php echo e($doc->realname); ?></p>
                            <a target="_blank" href="http://p.qiao.baidu.com/cps/chat?siteId=11689720&userId=24928549">申请交流</a>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <div class="ind-acd pull-left" style="background:url(<?php echo e(url('home/images/ind-adt.jpg')); ?>)">
        <div class="ind-acd-tag text-center">
            <p>活动入口</p>
        </div>
        <div class="ind-acd-div-f1 text-center">
            <?php $__currentLoopData = $salon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($loop->first): ?>
            <div class="ind-acd-des">
                <h5><?php echo e(str_limit($sa->title,15)); ?></h5>
                <p><?php echo e(str_limit($sa->describes,40)); ?></p>
            </div>

            <div class="ind-acd-div-a">
                <a href="<?php echo e(route('news.item',['id' => $sa->id])); ?>">申请加入</a>
            </div>

            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>
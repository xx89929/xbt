<div class="ind-news">
    <div class="ind-tit">
        <h3>新闻专题</h3>
    </div>
    <div class="ind-news-box clearfix">
        <div id="ind-news-l1" class="ind-news-l1-box pull-left carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <span class="ind-news-l1-prev ind-news-l1-botton">
                        <i class="fa fa-chevron-left" data-slide="prev"></i>
                </span>
                <span class="ind-news-l1-next ind-news-l1-botton"  data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                </span>
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?>
                        <a href="<?php echo e(route('news.item',['id' => $new->id])); ?>" class="ind-news-l1 item active">
                            <img class="lazy" data-original="<?php echo e(asset('storage/'.$new->pic)); ?>">
                            <div class="ind-news-l1-des">
                                <h4><?php echo e(str_limit($new->title,50)); ?></h4>
                                <span class="ind-news-l1-tag">
                                    <?php echo e($new->news_tag_one->name); ?>

                                </span>
                                <p><span>发布时间：<?php echo e($new->updated_at); ?></span></p>
                                <p><?php echo e($new->describes); ?></p>
                            </div>
                        </a>
                    <?php elseif($loop->iteration): ?>
                            <a href="<?php echo e(route('news.item',['id' => $new->id])); ?>" class="ind-news-l1 item">
                                <img class="lazy" data-original="<?php echo e(asset('storage/'.$new->pic)); ?>">
                                <div class="ind-news-l1-des">
                                    <h4><?php echo e(str_limit($new->title,50)); ?></h4>
                                    <span class="ind-news-l1-tag">
                                        <?php echo e($new->news_tag_one->name); ?>

                                    </span>
                                    <p><span>发布时间：<?php echo e($new->updated_at); ?></span></p>
                                    <p><?php echo e($new->describes); ?></p>
                                </div>
                            </a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="ind-news-r1 pull-left">
            <div class="ind-news-acd">
                <?php $__currentLoopData = $salon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('news.item',['id' => $sa->id])); ?>" class="ind-news-acd-f1 col-xs-6">
                        <img class="lazy" data-original="<?php echo e(asset('storage/'.$sa->pic)); ?>">
                        <div class="ind-news-acd-des">
                            <h4><?php echo e(str_limit($sa->title,15)); ?></h4>
                            <span class="ind-news-acd-tag">
                            <?php echo e($sa->news_tag_one->name); ?>

                        </span>
                            <p><?php echo e(str_limit($sa->describes,120)); ?></p>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="ind-news-r2">
                <div id="ind-news-r2" class="ind-news-r2-box carousel slide" data-ride="carousel">
                    <span class="ind-news-r2-prev ind-news-r2-botton">
                        <i class="fa fa-chevron-left" data-slide="prev"></i>
                    </span>
                    <span class="ind-news-r2-next ind-news-r2-botton"  data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                    </span>

                    <div class="ind-news-r2-lunbo">
                        <div class="carousel-inner">
                            <ul class="list-inline clearfix item active">
                                <?php $__currentLoopData = $dynamic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->index < 3): ?>
                                    <li>
                                        <a href="<?php echo e(route('news.item',['id' => $dy->id])); ?>" class="ind-news-r2-con">
                                            <img class="lazy" data-original="<?php echo e(asset('storage/'.$dy->pic)); ?>">
                                            <div class="ind-news-r2-des">
                                                <h4><?php echo e(str_limit($dy->title,10)); ?></h4>
                                                <p><?php echo e(str_limit($dy->describes,50)); ?></p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>

                            <ul class="list-inline clearfix item">
                                <?php $__currentLoopData = $dynamic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->index < 6 && $loop->index >2 ): ?>
                                        <li>
                                            <a href="<?php echo e(route('news.item',['id' => $dy->id])); ?>" class="ind-news-r2-con">
                                                <img class="lazy" data-original="<?php echo e(asset('storage/'.$dy->pic)); ?>">
                                                <div class="ind-news-r2-des">
                                                    <h4><?php echo e(str_limit($dy->title,10)); ?></h4>
                                                    <p><?php echo e(str_limit($dy->describes,50)); ?></p>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

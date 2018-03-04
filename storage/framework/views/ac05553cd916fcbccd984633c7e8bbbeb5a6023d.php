<div class="product-nav text-center">
    <ul class="list-inline clearfix">
        <li class="col-xs-1 active" ><a href="<?php echo e(route('product')); ?>"><h4>全部产品</h4></a></li>
        <?php $__currentLoopData = $proNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="col-xs-1" ><a title="<?php echo e($pn->title); ?>" href="<?php echo e(route('product',['cate_id' => $pn->id])); ?>"><h4><?php echo e(str_limit($pn->title,8)); ?></h4></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
        
        
        
        
        
        
        
        
    </ul>
</div>
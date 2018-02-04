<?php $__env->startSection('auth-page'); ?>
    <div class="member-addr">
        <div class="member-addr-list">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <form class="form-horizontal" method="post" action="<?php echo e(route('memberAddr.save')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="consignee" class="col-sm-2 control-label">收货人</label>
                    <div class="col-sm-10">
                        <input type="text" name="consignee" class="form-control" id="consignee" placeholder="请填写收货人姓名" value="<?php echo e(@$myAddr->consignee); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-xs-2 control-label">手机号</label>
                    <div class="col-xs-10">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="请填写手机号" value="<?php echo e(@$myAddr->phone); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">省</label>
                    <div class="col-xs-10">
                        <select name="province" class="pro-select form-control" data-url="<?php echo e(route('api.getCity')); ?>" data-next="#getCity">
                            <?php if(@$myAddr->province): ?>
                                <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($prov->id); ?>"
                                    <?php if($prov->id == $myAddr->province): ?>
                                        selected
                                    <?php endif; ?>
                                    ><?php echo e($prov->area_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <option value="">省</option>
                                <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($prov->id); ?>"><?php echo e($prov->area_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 control-label">市</label>
                    <div class="col-xs-10">
                        <select  name="city" class="pro-select form-control" data-url="<?php echo e(route('api.getDistrict')); ?>"  id="getCity" data-next="#getDistrict">
                            <?php if(@$myAddr->city): ?>
                                <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($ci->parent_id == $myAddr->province): ?>
                                    <option value="<?php echo e($ci->id); ?>"
                                        <?php if($ci->id == $myAddr->city): ?>
                                            selected
                                        <?php endif; ?>
                                    ><?php echo e($ci->area_name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <option value="">市</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 control-label">区</label>
                    <div class="col-xs-10">
                        <select name="district" class="pro-select form-control" id="getDistrict" data-url="<?php echo e(route('api.getAreaStore')); ?>">
                            <?php if(@$myAddr->district): ?>
                                <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $di): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($di->parent_id == $myAddr->city): ?>
                                        <option value="<?php echo e($di->id); ?>"
                                                <?php if($di->id == $myAddr->district): ?>
                                                selected
                                                <?php endif; ?>
                                        ><?php echo e($di->area_name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <option value="">区</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">地址</label>
                    <div class="col-xs-10">
                        <input name="address" type="text" class="form-control" id="exampleInputName2" placeholder="地址" value="<?php echo e(@$myAddr->address); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default address_btn">保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layout.authbase', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="v-member" style="background: url('<?php echo e(url("home/images/bg-1.jpg")); ?>')">
        <div class="container" style="position: relative">
            <div class="v-member-box">
                <div class="v-member-tit">
                    <ul class="list-inline">
                        <li class="active"><a><h4 >医生账号登陆</h4></a></li>
                    </ul>
                </div>
                <div class="v-member-con">
                    <div class="v-member-log" style="display: block;">
                        <form class="form-horizontal text-center" method="POST" action="<?php echo e(route('doclog')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group <?php echo e($errors->has('account') ? ' has-error' : ''); ?>">
                                <div class="input-group v-member-input">
                                    <div class="input-group-addon v-member-label"><i class="fa fa-user"></i></div>
                                    <input name="account" type="text" class="form-control" placeholder="输入账号" value="<?php echo e(old('account')); ?>" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group v-member-input">
                                    <div class="input-group-addon v-member-label"><i class="fa fa-lock"></i></div>
                                    <input name="password" type="password" class="form-control" placeholder="输入密码">

                                </div>
                            </div>
                            <?php if($errors->has('account')): ?>
                                <div class="help-block alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong><?php echo e($errors->first('account')); ?></strong>
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary">登陆</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
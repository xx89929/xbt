<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>修巴堂</title>

    <!-- Bootstrap -->
    <link href="<?php echo e(url('bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('home/asset/base.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('bv/bootstrapValidator.min.css')); ?>" rel="stylesheet">

    
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?943fb401aa09429271c41f102f12ce0e";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>

<div class="container-fluid">
    <div class="body-warp">
        <?php echo $__env->make('home.common.status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('home.layout.partials.top-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('home.layout.partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('home.layout.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(url('bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('lazyload/lazyload.min.js')); ?>"></script>
<script src="<?php echo e(url('bv/bootstrapValidator.min.js')); ?>"></script>
<script src="<?php echo e(url('home/js/xbt.js')); ?>"></script>

</body>
</html>
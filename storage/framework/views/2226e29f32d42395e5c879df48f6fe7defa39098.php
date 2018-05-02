<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue"></script>
<div class="facade-map-box">
    <div id="facade-map"></div>
    <div id="getmap_url" url="<?php echo e(route('baidu.getmap')); ?>"></div>
    <div class="facade-map-search">
        <ul class="list-inline">
            <li class="col-xs-2">
                <select name="province" id="map-province" class="facade-map-select pro-select" data-url="<?php echo e(route('api.getCity')); ?>" data-next="#getCity">
                    <option value="">省</option>
                    <?php $__currentLoopData = $area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($ar->area_type == 1): ?>
                    <option value="<?php echo e($ar->id); ?>"><?php echo e($ar->area_name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </li>
            <li class="col-xs-2">
                <select name="city" id="getCity" class="facade-map-select pro-select" data-url="<?php echo e(route('api.getDistrict')); ?>" data-next="#getDistrict">
                    <option value="">市</option>
                </select>
            </li>
            <li class="col-xs-2">
                <select name="district" id="getDistrict" data-url="<?php echo e(route('api.getAreaStore')); ?>" class="facade-map-select">
                    <option value="">区</option>
                </select>
            </li>
            <li class="col-xs-6 clearfix">
                <input type="text" class="facade-map-sear-input pull-left" placeholder="输入要查询的店铺">
                <button id="mapSearch" class="pull-left facade-map-sear-button">搜索</button>
            </li>
        </ul>
    </div>
</div>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('home/js/MarkerClusterer.js')); ?>"></script>
    <script src="<?php echo e(url('home/js/TextIconOverlay.js')); ?>"></script>
    <script src="<?php echo e(url('home/js/xbt_store_map.js')); ?>"></script>
    <script>
        $('#mapSearch').click(function () {
            var province = $('#map-province option:selected').text();
            var city = $('#getCity option:selected').text();
            var district = $('#getDistrict option:selected').text();
            theLocation(province+city+district);
        })
    </script>
<?php $__env->stopSection(); ?>
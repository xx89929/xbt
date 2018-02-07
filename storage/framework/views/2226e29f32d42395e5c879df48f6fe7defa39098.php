<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue"></script>
<div class="facade-map-box">
    <div id="facade-map"></div>
    <div id="getmap_url" url="<?php echo e(route('baidu.getmap')); ?>"></div>
    <div class="facade-map-search">
        <ul class="list-inline">
            <li class="col-xs-2">
                <select name="province" id="map-province" class="facade-map-select">
                    <option>省</option>
                    <option>广东</option>
                    <option>海南</option>
                </select>
            </li>
            <li class="col-xs-2">
                <select name="city" id="map-city" class="facade-map-select">
                    <option>市</option>
                    <option>深圳</option>
                    <option>海口</option>
                </select>
            </li>
            <li class="col-xs-2">
                <select name="district" id="map-district" class="facade-map-select">
                    <option>区</option>
                    <option>南山区</option>
                    <option>龙华区</option>
                    <option>秀英区</option>
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
            var city = $('#map-city option:selected').text();
            var district = $('#map-district option:selected').text();
            theLocation(province+city+district);
        })
    </script>
<?php $__env->stopSection(); ?>
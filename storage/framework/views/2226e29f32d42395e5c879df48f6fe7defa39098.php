<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue"></script>
<div class="facade-map-box">
    <div id="facade-map"></div>
    <div id="getmap_url" url="<?php echo e(route('baidu.getmap')); ?>"></div>
    
        
            
                
                    
                    
                        
                    
                        
                    
                
            
            
                
                    
                
            
            
                
                    
                
            
            
                
                
            
        
    
</div>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('home/js/MarkerClusterer.js')); ?>"></script>
    <script src="<?php echo e(url('home/js/TextIconOverlay.js')); ?>"></script>
    <script src="http://api.map.baidu.com/api?v=2.0&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue&callback=init"></script>
    

    <script>
        var map =null;
        var pt = null;
        var location_area = null;
        var firstLat = $('.store-lat').eq(0).text();
        var firstLng = $('.store-lng').eq(0).text();
        var myCompOverlay = null;


        //百度地图API功能
        function loadJScript() {
            var script = document.createElement("script");
            script.type = "text/javascript";
            script.src = "http://api.map.baidu.com/api?v=2.0&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue&callback=init";
            document.body.appendChild(script);
        }
        function init() {
            map = new BMap.Map("facade-map",{minZoom:9});            // 创建Map实例
            map.enableScrollWheelZoom();

            var size = new BMap.Size(20, 20);
            map.addControl(new BMap.CityListControl({
                anchor: BMAP_ANCHOR_TOP_LEFT,
                offset: size,
                // 切换城市之间事件
                // onChangeBefore: function(){
                //    alert('before');
                // },
                // 切换城市之后事件
                // onChangeAfter:function(){
                //   alert('after');
                // }
            }));
            if(location_area != null){
                map.centerAndZoom(location_area,11);      // 用城市名设置地图中心点
                location_area = null;
            }else{
                var basePoint = new BMap.Point(firstLng,firstLat);
                map.centerAndZoom(basePoint,11);

            }

            getSListPoints();

            ComplexCustomOverlay.prototype = new BMap.Overlay();
            ComplexCustomOverlay.prototype.draw = function(){
                var map = this._map;
                var pixel = map.pointToOverlayPixel(this._point);
                this._div.style.left = pixel.x - parseInt(this._arrow.style.left) + "px";
                this._div.style.top  = pixel.y - 30 + "px";
            }


            ComplexCustomOverlay.prototype.initialize = function(map){
                this._map = map;
                var div = this._div = document.createElement("div");
                div.style.position = "absolute";
                div.style.zIndex = BMap.Overlay.getZIndex(this._point.lat);
                div.style.backgroundColor = "#EE5D5B";
                div.style.border = "1px solid #BC3B3A";

                div.style.color = "white";
                div.style.height = "29px";
                div.style.padding = "5px 10px";
                div.style.lineHeight = "18px";
                div.style.minWidth = "100px";
                div.style.borderRadius = "5px";
                div.style.whiteSpace = "nowrap";
                div.style.MozUserSelect = "none";
                div.style.fontSize = "12px";
                div.style.textAlign = "center";
                var span = this._span = document.createElement("span");
                span.style.height = '15px';
                div.appendChild(span);
                span.appendChild(document.createTextNode(this._text));
                var that = this;

                var arrow = this._arrow = document.createElement("div");
                arrow.style.background = "url(http://map.baidu.com/fwmap/upload/r/map/fwmap/static/house/images/label.png) no-repeat";
                arrow.style.position = "absolute";
                arrow.style.width = "11px";
                arrow.style.height = "10px";
                arrow.style.top = "27px";
                arrow.style.left = "10px";
                arrow.style.overflow = "hidden";
                div.appendChild(arrow);

                div.onmouseover = function(){
                    this.style.backgroundColor = "#BC3B3A";
                    this.style.borderColor = "#BC3B3A";
                    this.style.zIndex = "9999";

                }

                div.onmouseout = function(){
                    this.style.backgroundColor = "#EE5D5B";
                    this.style.borderColor = "#BC3B3A";
                    this.style.zIndex = "0";
                }

                map.getPanes().labelPane.appendChild(div);

                return div;
            }
        }


        function getSListPoints() {
            <?php $__currentLoopData = $sList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                pt = new BMap.Point('<?php echo e($sl->lng); ?>','<?php echo e($sl->lat); ?>');
                myCompOverlay = new ComplexCustomOverlay(pt, '<?php echo e($sl->name); ?>');
                
                map.addOverlay(myCompOverlay);
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        }


        function ComplexCustomOverlay(point, text, mouseoverText){
            this._point = point;
            this._text = text;
            this._overText = mouseoverText;
        }

        function theLocation(loc){
            if(loc != null){
                location_area = loc; // 用城市名设置地图中心点
                loadJScript();
            }
        }

        window.onload = loadJScript();  //异步加载地图

    </script>


    <script>
        $('#mapSearch').click(function () {
            var province = $('#map-province option:selected').text();
            var city = $('#getCity option:selected').text();
            var district = $('#getDistrict option:selected').text();
            theLocation(province+city+district);
        })
    </script>
<?php $__env->stopSection(); ?>
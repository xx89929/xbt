<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue"></script>
<style>
    .citylist_popup_main .city_content_top{
        height: 50px;
    }
</style>
<div class="facade-map-box">
    <div id="facade-map"></div>
    <div id="getmap_url" url="{{route('baidu.getmap')}}"></div>
    {{--<div class="facade-map-search">--}}
        {{--<ul class="list-inline">--}}
            {{--<li class="col-xs-2">--}}
                {{--<select name="province" id="map-province" class="facade-map-select pro-select" data-url="{{route('api.getCity')}}" data-next="#getCity">--}}
                    {{--<option value="">省</option>--}}
                    {{--@foreach($area as $ar)--}}
                        {{--@if($ar->area_type == 1)--}}
                    {{--<option value="{{$ar->id}}">{{$ar->area_name}}</option>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            {{--</li>--}}
            {{--<li class="col-xs-2">--}}
                {{--<select name="city" id="getCity" class="facade-map-select pro-select" data-url="{{route('api.getDistrict')}}" data-next="#getDistrict">--}}
                    {{--<option value="">市</option>--}}
                {{--</select>--}}
            {{--</li>--}}
            {{--<li class="col-xs-2">--}}
                {{--<select name="district" id="getDistrict" data-url="{{route('api.getAreaStore')}}" class="facade-map-select">--}}
                    {{--<option value="">区</option>--}}
                {{--</select>--}}
            {{--</li>--}}
            {{--<li class="col-xs-6 clearfix">--}}
                {{--<input type="text" class="facade-map-sear-input pull-left" placeholder="输入要查询的店铺">--}}
                {{--<button id="mapSearch" class="pull-left facade-map-sear-button">搜索</button>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
</div>

@section('scripts')
    <script src="{{url('home/js/MarkerClusterer.js')}}"></script>
    <script src="{{url('home/js/TextIconOverlay.js')}}"></script>
    <script src="http://api.map.baidu.com/api?v=2.0&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue&callback=init"></script>
    {{--<script src="{{url('home/js/xbt_store_map.js')}}"></script>--}}

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
            @foreach($sList as $sl)
                pt = new BMap.Point('{{$sl->lng}}','{{$sl->lat}}');
                myCompOverlay = new ComplexCustomOverlay(pt, '{{$sl->name}}');
                {{--var marker = new BMap.Marker(new BMap.Point('{{$sl->lng}}', '{{$sl->lat}}')); // 创建点--}}
                map.addOverlay(myCompOverlay);
            @endforeach
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
@endsection
<div class="facade-map-box">
    <div id="facade-map"></div>
    <div class="facade-map-search">
        <ul class="list-inline">
            <li class="col-xs-2">
                <select class="facade-map-select">
                    <option>省</option>
                    <option>广州</option>
                    <option>海南</option>
                </select>
            </li>
            <li class="col-xs-2">
                <select class="facade-map-select">
                    <option>市</option>
                    <option>广州</option>
                    <option>海南</option>
                </select>
            </li>
            <li class="col-xs-2">
                <select class="facade-map-select">
                    <option>区</option>
                    <option>广州</option>
                    <option>海南</option>
                </select>
            </li>
            <li class="col-xs-6 clearfix">
                <input type="text" class="facade-map-sear-input pull-left" placeholder="输入要查询的店铺">
                <button class="pull-left facade-map-sear-button">搜索</button>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue"></script>
<script>
    var map = new BMap.Map("facade-map");    // 创建Map实例
    map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);  // 初始化地图,设置中心点坐标和地图级别
    //添加地图类型控件
    map.addControl(new BMap.MapTypeControl({
        mapTypes:[
            BMAP_NORMAL_MAP,
            BMAP_HYBRID_MAP
        ]}));
    map.setCurrentCity("广州");          // 设置地图显示的城市 此项是必须设置的
</script>
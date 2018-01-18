<div class="contact-box clearfix">
    <div class="contact-con pull-left">
        <div class="contact-tit">
            <h4>联系我们</h4>
        </div>
        <div class="contact-des">
            <ul class="list-unstyled">
                <li>
                    <p>公司地址：广州市白云区鹤龙街鹤边白云三线鹤鸣商务楼501</p>
                </li>
                <li>
                    <p>联系方式：周一到周六9:00-18:00（节假日，周日休息）</p>
                </li>
                <li>
                    <p>值班老师：18639007413（李老师）</p>
                </li>
                <li>
                    <p>咨询电话：020-29826058    02029826078</p>
                </li>
                <li>
                    <p>交通路线：地铁黄边站D出口右转800米（司法学院斜对面）</p>
                </li>
                <li>
                    <p>咨询微信：xiubatang712340831（黄老师）</p>
                </li>
            </ul>
        </div>
        <div class="contact-des-b1">
            <p>有关产品售卖展示，请点<a href="#">这里</a>查询。</p>
            <p>如果您有意见或建议反馈，请点<a href="#">这里</a>留言。</p>
            <p>询问关于媒体报道与公众关系，请点<a href="#">这里</a>关注。</p>
        </div>
    </div>
    <div class="contact-map pull-left">
        <div id="contact_map"></div>
    </div>
</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue"></script>
<script>
    var map = new BMap.Map("contact_map");
    map.centerAndZoom(new BMap.Point(116.404, 39.915), 15);

    var myGeo = new BMap.Geocoder();
    // 将地址解析结果显示在地图上,并调整地图视野
    myGeo.getPoint("广州市白云区鹤龙街鹤边白云三线鹤鸣商务楼501", function(point){
        if (point) {
            map.centerAndZoom(point, 17);
            map.addOverlay(new BMap.Marker(point));
        }else{
            alert("您选择地址没有解析到结果!");
        }
    }, "广州市");
</script>
var markerClusterer = null;
var myCompOverlay = null;
var map =null;
// var MAX = 10;
var markers = [];
var pt = null;
var i = 0;
var Zoom = 0;
var location_area = null;
var firstLat = $('.store-lat').eq(0).text();
var firstLng = $('.store-lng').eq(0).text();
function loadJScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://api.map.baidu.com/api?v=2.0&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue&callback=maPinit";
    document.body.appendChild(script);
}

function getR() {
    var bs = map.getBounds();   //获取可视区域
    var bssw = bs.getSouthWest();   //可视区域左下角
    var bsne = bs.getNorthEast();   //可视区域右上角
    postGetStore(bssw.lng,bssw.lat,bsne.lng,bsne.lat);
}

function maPinit() {
    map = new BMap.Map("facade-map",{minZoom:9});
    map.enableScrollWheelZoom();
    var point = new BMap.Point(firstLng,firstLat);
    if(location_area != null){
        map.centerAndZoom(location_area,11);      // 用城市名设置地图中心点
        console.log('location_area',map);
        location_area = null;
        setTimeout(getR(),20000);
    }else{
        map.centerAndZoom(point,9);
        console.log('point',map);
        getR();
    }



    map.addEventListener("moveend", function () {
        removeMarkers();
        console.log('moveend',map.getZoom());
        if(map.getZoom() < 14){
            map.clearOverlays();
        }
        var bs = map.getBounds();   //获取可视区域
        var bssw = bs.getSouthWest();   //可视区域左下角
        var bsne = bs.getNorthEast();   //可视区域右上角
        postGetStore(bssw.lng,bssw.lat,bsne.lng,bsne.lat);
    });

    map.addEventListener("zoomend", function () {
        removeMarkers();
        console.log('zoomend',map.getZoom());
        if(map.getZoom() < 15){
            removeMarkers();
            map.clearOverlays();
        }
        var bs = map.getBounds();   //获取可视区域
        var bssw = bs.getSouthWest();   //可视区域左下角
        var bsne = bs.getNorthEast();   //可视区域右上角
        postGetStore(bssw.lng,bssw.lat,bsne.lng,bsne.lat);
    });


    var newPt = new BMap.Point(116.404, 39.895);
    var btnClose = document.getElementById('btnPoint');

}

function getPoint(stores) {
    for(var i =0 ; i < stores.length ; i ++){
        pt = new BMap.Point(stores[i]['lng'],stores[i]['lat']);
        if(map.getZoom() > 14){
            myCompOverlay = new ComplexCustomOverlay(pt, stores[i]['name']);
            map.addOverlay(myCompOverlay);
        }else {
            markers.push(new BMap.Marker(pt));
        }
    }
}

function removeMarkers() {
    markerClusterer.clearMarkers();
    markers = [];
}

function postGetStore(lbLng,lbLat,rtLng,rtLat) {
    $.ajax({
        url:$('#getmap_url').attr('url'),
        type:'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            'lbLng':lbLng,
            'lbLat':lbLat,
            'rtLng':rtLng,
            'rtLat':rtLat,
        },
        success:function (data) {
            getPoint(data);
            //最简单的用法，生成一个marker数组，然后调用markerClusterer类即可。
            markerClusterer = new BMapLib.MarkerClusterer(map, {markers:markers,minClusterSize:1,maxZoom:14});
        },
        error:function (data) {
            console.log('失败',data);
        }
    });
}

function theLocation(loc){
    console.log(loc);
    if(loc != null){
        location_area = loc; // 用城市名设置地图中心点
        loadJScript();
    }
}

// 复杂的自定义覆盖物
function ComplexCustomOverlay(point, text, mouseoverText){
    this._point = point;
    this._text = text;
    this._overText = mouseoverText;
}
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

window.onload = loadJScript;  //异步加载地图



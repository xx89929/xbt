@extends('wap.layouts.base')
@section('content')
    <div class="page page-case" id="page-case">
        @include('wap.layouts.head')
        <div class="content">
            <div class="card demo-card-header-pic">
                <div valign="bottom" class="card-header color-white no-border no-padding">
                    <img class='card-cover' src="{{asset('storage/'.$store->store_pic)}}" alt="">
                </div>
                <div class="card-footer">
                    <span>{{$store->name}}</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header">店铺信息</div>
                <div class="card-content list-block  media-list">
                    <div  class=" item-content">
                        <div class="item-inner">
                            <div class="item-title-row">
                                <div class="item-title">{{$store->name}}</div>
                            </div>
                            <div class="item-subtitle store-st-item-subtitle">地址：
                                {{$store->province->area_name}}
                                {{$store->city->area_name}}
                                {{$store->district->area_name}}
                                {{$store->address}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">店铺导航</div>
                <div class="card-content ">
                    <div id="store-map" class="store-map"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('left-panel')
@endsection

@section('jss')

    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue"></script>
    <script type="text/javascript">
        // 百度地图API功能
        var map = new BMap.Map("store-map");
        map.centerAndZoom(new BMap.Point(116.404, 39.915), 15);

//        var myP1 = new BMap.Point(116.380967,39.913285);    //起点
//        var myP2 = new BMap.Point(116.424374,39.914668);    //终点
                var myP1 = new BMap.Point("{{$myPoint['x']}}","{{$myPoint['y']}}");    //起点
                var myP2 = new BMap.Point('{{$store->lng}}','{{$store->lat}}');    //终点
        var myIcon = new BMap.Icon("http://lbsyun.baidu.com/jsdemo/img/Mario.png", new BMap.Size(32, 70), {    //小车图片
            //offset: new BMap.Size(0, -5),    //相当于CSS精灵
            imageOffset: new BMap.Size(0, 0)    //图片的偏移量。为了是图片底部中心对准坐标点。
        });
        var driving2 = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});    //驾车实例
        driving2.search(myP1, myP2);    //显示一条公交线路

        window.run = function (){
            var driving = new BMap.DrivingRoute(map);    //驾车实例
            driving.search(myP1, myP2);
            driving.setSearchCompleteCallback(function(){
                var pts = driving.getResults().getPlan(0).getRoute(0).getPath();    //通过驾车实例，获得一系列点的数组
                var paths = pts.length;    //获得有几个点

                var carMk = new BMap.Marker(pts[0],{icon:myIcon});
                map.addOverlay(carMk);
                i=0;
                function resetMkPoint(i){
                    carMk.setPosition(pts[i]);
                    if(i < paths){
                        setTimeout(function(){
                            i++;
                            resetMkPoint(i);
                        },100);
                    }
                }
                setTimeout(function(){
                    resetMkPoint(5);
                },100)

            });
        }

        setTimeout(function(){
            run();
        },1500);
    </script>

@endsection

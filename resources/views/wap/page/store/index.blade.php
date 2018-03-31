@extends('wap.layouts.base')
@section('content')
    <div class="page page-case" id="page-case">
        @include('wap.layouts.head')
        <div class="content">
            <div class="store-map-warp">
                <div class="store-map" id="baiduMap"></div>
            </div>
            <div class="list-block media-list store-st-list">
                <ul>
                    @foreach($store as $st)
                        <li>
                            <a href="{{route('store.info',['id' => $st->id])}}" class="item-link item-content store-st-item">
                                <div class="item-media"><img src="{{asset('storage/'.$st->store_pic)}}" style='width: 4rem;'></div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">{{$st->name}}</div>
                                        <div class="item-after" id="distance_{{$st->id}}"></div>
                                    </div>
                                    <div class="item-subtitle store-st-item-subtitle ">
                                        {{$st->province->area_name}}
                                        {{$st->city->area_name}}
                                        {{$st->district->area_name}}
                                        {{$st->address}}
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
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
        var myPoint = new BMap.Point("{{$myPoint['x']}}","{{$myPoint['y']}}");
        var map = new BMap.Map("baiduMap");
        map.centerAndZoom(myPoint,15);

        //获取地图边经纬度
        var bs = map.getBounds();   //获取可视区域
        var bssw = bs.getSouthWest();   //可视区域左下角
        var bsne = bs.getNorthEast();   //可视区域右上角
        var myIcon = new BMap.Icon("{{asset('home/images/my_point.png')}}", new BMap.Size(20,30));
        //添加marker
        var myMarker = new BMap.Marker(myPoint,{icon:myIcon});  // 创建标注
        map.addOverlay(myMarker);               // 将标注添加到地图中
        @foreach($store as $st)
            var storePoint =  new BMap.Point('{{$st->lng}}','{{$st->lat}}');
            var storeMarker = new BMap.Marker(storePoint);
            map.addOverlay(storeMarker);               // 将标注添加到地图中
            var dist = map.getDistance(myPoint,storePoint).toFixed(2)+'m';
            var distHtml = '<span>'+dist+'</span>';
            $('#distance_'+'{{$st->id}}').append(distHtml);
        @endforeach

    </script>
@endsection

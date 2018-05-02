<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=XtBZlAmRRP5ATTj0LG95AhU8vDBSNiue"></script>
<div class="facade-map-box">
    <div id="facade-map"></div>
    <div id="getmap_url" url="{{route('baidu.getmap')}}"></div>
    <div class="facade-map-search">
        <ul class="list-inline">
            <li class="col-xs-2">
                <select name="province" id="map-province" class="facade-map-select pro-select" data-url="{{route('api.getCity')}}" data-next="#getCity">
                    <option value="">省</option>
                    @foreach($area as $ar)
                        @if($ar->area_type == 1)
                    <option value="{{$ar->id}}">{{$ar->area_name}}</option>
                        @endif
                    @endforeach
                </select>
            </li>
            <li class="col-xs-2">
                <select name="city" id="getCity" class="facade-map-select pro-select" data-url="{{route('api.getDistrict')}}" data-next="#getDistrict">
                    <option value="">市</option>
                </select>
            </li>
            <li class="col-xs-2">
                <select name="district" id="getDistrict" data-url="{{route('api.getAreaStore')}}" class="facade-map-select">
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

@section('scripts')
    <script src="{{url('home/js/MarkerClusterer.js')}}"></script>
    <script src="{{url('home/js/TextIconOverlay.js')}}"></script>
    <script src="{{url('home/js/xbt_store_map.js')}}"></script>
    <script>
        $('#mapSearch').click(function () {
            var province = $('#map-province option:selected').text();
            var city = $('#getCity option:selected').text();
            var district = $('#getDistrict option:selected').text();
            theLocation(province+city+district);
        })
    </script>
@endsection
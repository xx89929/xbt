<div class="pro_info-i clearfix">
    <div class="pro-i-lunbo pull-left">
        <span class="pro-i-lunbo-contr pro-i-lunbo-contr-left" data-slide="prev"><i class="fa fa-chevron-left"></i></span>
        <span class="pro-i-lunbo-contr pro-i-lunbo-contr-right" data-slide="next"><i class="fa fa-chevron-right"></i></span>
        <div id="pro-i-lunbo" class="carousel slide" data-ride="carousel">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators pro-i-tag">
                @for($i = 0 ; $i < count($proin->pics) ; $i++)
                    @if($i == 0)
                <li data-target="#pro-i-lunbo" data-slide-to="{{$i}}" class="active">
                    <img src="{{asset('storage/'.$proin->pics[$i])}}">
                </li>
                    @else
                        <li data-target="#pro-i-lunbo" data-slide-to="{{$i}}">
                            <img src="{{asset('storage/'.$proin->pics[$i])}}">
                        </li>
                    @endif
                @endfor
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                @for($i = 0 ; $i < count($proin->pics) ; $i++)
                    @if($i  == 0)
                        <div class="pro-i-lunbo-img item active">
                            <img src="{{asset('storage/'.$proin->pics[$i])}}">
                        </div>
                    @else
                        <div class="pro-i-lunbo-img item">
                            <img src="{{asset('storage/'.$proin->pics[$i])}}">
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>


    <form action="{{route('order.payShow')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="pro_id" value="{{$proin->id}}">


        <div class="pro-i-con pull-left">
            <div class="pro-i-con-tit">
                <h3>{{$proin->name}}</h3>
            </div>
            <div class="pro-i-con-pri">
                <span>￥{{number_format($proin->price,2)}}元</span>
            </div>
            <div class="pro-i-con-check">
                <h5>选择店铺</h5>
                <ul class="list-inline clearfix">
                    <li class="col-xs-2">
                        <select name="province" class="pro-select" data-url="{{route('api.getCity')}}" data-next="#getCity">
                            <option value="">省</option>
                            @foreach($province as $province)
                            <option value="{{$province->id}}">{{$province->area_name}}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class=" col-xs-2">
                        <select name="city" class="pro-select" data-url="{{route('api.getDistrict')}}"  id="getCity" data-next="#getDistrict">
                            <option value="">市</option>
                        </select>
                    </li>
                    <li class=" col-xs-2">
                        <select name="district" class="pro-select" id="getDistrict" data-url="{{route('api.getAreaStore')}}" data-next="#getStore">
                            <option value="">区</option>
                        </select>
                    </li>
                    <li class="col-xs-6">
                        <select name="store_id" class="pro-select" id="getStore" data-url="{{route('api.getAreaDoc')}}" data-next="#getAreaDoc">
                            <option value="">选择要挑选的店铺</option>
                        </select>
                    </li>
                    <li class="col-xs-12">
                        <select name="doctor_id" class="pro-select" id="getAreaDoc" >
                            <option value="">选择医生</option>
                        </select>
                    </li>
                </ul>
            </div>

            <div class="pro-i-con-sub clearfix text-center">
                <button type="submit" class="pro-i-con-sub-buy pull-left"><i class="fa fa-shopping-bag"></i>&nbsp;立即购买</button>
                {{--<button class="pro-i-con-sub-join-shop pull-left"><i class="fa fa-shopping-cart"></i>&nbsp;加入购物车</button>--}}
            </div>
        </div>
    </form>
</div>

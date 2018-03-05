<div class="container">
    <div class="hot-product">
        <div class="ind-tit clearfix">
            <h3>热卖产品</h3>
            <a href="{{route('product')}}">更多>></a>
        </div>
        <div class="hot-product_box">
            <ul class="list-inline">

                @foreach ($hot_product as $pro)
                    <li class="xbt-li-pro">
                        <a href="{{route('pro-info',['id' => $pro->id])}}" class="hot-pro-item text-center">
                            <img class="lazy" data-original="{{asset('storage/'.$pro->pics[0])}}">
                            <h5>{{$pro->name}}</h5>
                            <span title="{{$pro->description}}">{{str_limit($pro->description,20)}}</span>
                            <p class="product-price">￥<i>{{number_format($pro->price,2)}}</i>元</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

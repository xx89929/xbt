<div class="product-box pull-left">
    <ul class="list-unstyled">
        @foreach($product as $pro)
        <li>
            <div class="pro-item clearfix">
                <div class="pro-item-img pull-left">
                    <img class="lazy" data-original="{{asset('storage/'.$pro->pics[0])}}">
                </div>
                <div class="pro-item-cont pull-left">
                    <h4>{{$pro->name}}</h4>
                    <span>{{$pro->specification}}</span>
                    <p>{{$pro->description}}</p>
                </div>
                <div class="pro-item-r pull-left text-right">
                    <h3>￥{{$pro->price}}元</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{route('pro-info',['id' => $pro->id])}}" class="check-pro">查看详情</a></li>
                        <li><a href="#" class="jion-buy">加入收藏</a></li>
                    </ul>
                </div>
            </div>
        </li>
        @endforeach
        <li>
            <div class="lara_fenye text-center">
                {{ $product->links()}}
            </div>
        </li>
    </ul>
</div>

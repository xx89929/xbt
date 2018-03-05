<div class="hot-product-box pull-left">
    <div class="hot-product-box-tit">
        <h4>推荐产品</h4>
    </div>
    <div class="hot-product-box-b">
        <ul class="list-unstyled">
            @foreach($tui_pro as $tp)
            <li>
                <a href="#" class="hot-pro-b-item">
                    <div class="hot-pro-b-item-img">
                        <img class="lazy" data-original="{{asset('storage/'.$tp->pics[0])}}">
                    </div>
                    <div class="hot-pro-b-con text-center">
                        <p><span>￥{{number_format($tp->price,2)}}元</span></p>
                        <p>{{$tp->name}}</p>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
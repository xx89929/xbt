<div class="product-nav text-center">
    <ul class="list-inline clearfix">
        <li class="col-xs-1 active" ><a href="{{route('product')}}"><h4>全部产品</h4></a></li>
        @foreach($proNav as $pn)
        <li class="col-xs-1" ><a href="{{route('product',['cate_id' => $pn->id])}}"><h4>{{$pn->title}}</h4></a></li>
        @endforeach
        {{--<li class="col-xs-1" ><a href="#"><h4>新疤抗疤</h4></a></li>--}}
        {{--<li class="col-xs-1" ><a href="#"><h4>儿童疤痕</h4></a></li>--}}
        {{--<li class="col-xs-1" ><a href="#"><h4>平疤凸疤</h4></a></li>--}}
        {{--<li class="col-xs-1" ><a href="#"><h4>瘢痕疙瘩</h4></a></li>--}}
        {{--<li class="col-xs-1" ><a href="#"><h4>凹陷疤痕</h4></a></li>--}}
        {{--<li class="col-xs-1" ><a href="#"><h4>白色疤痕</h4></a></li>--}}
        {{--<li class="col-xs-1" ><a href="#"><h4>色素沉着</h4></a></li>--}}
        {{--<li class="col-xs-1" ><a href="#"><h4>妊娠纹</h4></a></li>--}}
        {{--<li class="col-xs-1" ><a href="#"><h4>痘痘痤疮</h4></a></li>--}}
        {{--<li class="col-xs-1" ><a href="#"><h4>红血丝</h4></a></li>--}}
    </ul>
</div>
@extends('home.layout.base')
@section('content')
    <div class="bg-gray">
        <div class="container">
            <div class="order_status_box clearfix">
                <div class="col-xs-2 order_status_i text-center">
                    @if($status == 1)
                    <i style="color: #7dd3ae" class="fa fa-check-circle"></i>
                    @else
                    <i style="color: rgba(165,0,0,0.8)" class="fa fa-times-circle"></i>
                    @endif
                </div>
                <div class="col-xs-7  order_status_des">
                    @if($status == 1)
                    <h2>付款成功！</h2>
                    @else
                    <h2>付款失败！</h2>
                    @endif
                    <p><span>订单号：</span><em>{{$order->out_trade_no}}</em> <a href="{{route('member.order')}}">前往我的订单进行查看&nbsp;<i class="fa fa-caret-down"></i></a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
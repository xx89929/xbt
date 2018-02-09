@extends('auth.layout.authbase')
@section('auth-page')
    <div class="member-order">
        <div class="member-order-tag">
            <ul class="list-inline">
                <li @if($orderNav == 'orderList')class="active" @endif><a href="{{route('member.order')}}">全部有效订单</a></li>
                <li @if($orderNav == 'noPayList')class="active" @endif><a href="{{route('member.order',['pay_status' => 0])}}">待付款（{{$noPayCount}}）</a>
                </li>
            </ul>
        </div>

        <div class="member-order-dis">
            <div class="member-order-search">
                <div class="member-order-search-input">
                    <form method="post">
                        {{ csrf_field() }}
                        <input type="search" placeholder="订单号、商品名称">
                    </form>
                    <i class="fa fa-search" onclick=""></i>
                </div>
            </div>
        </div>

        <div class="member_my_order">
            <ul class="list-unstyled" style="display: block">
                @foreach($order as $or)
                <li>
                    <div class="member_my_order_item">
                        <div class="member_my_order_item_tit clearfix">
                            <div class="member_my_order_item_tit_lef pull-left">
                                @if($or->pay_status == 0)
                                <h3>待付款</h3>
                                @else
                                <h3>已付款</h3>
                                @endif
                                <p>订单号 : {{$or->order_id}}  {{$or->created_at}}  在线支付</p>
                            </div>
                            <div class="member_my_order_item_tit_right pull-right">
                                <span>订单金额：<i>￥{{number_format($or->order_money,2)}}元</i></span>
                            </div>
                        </div>
                        <div class="member_my_order_item_des clearfix">
                            <div class="member_my_order_item_des_left col-xs-7  pull-left">
                                <div class="my_order_des_img pull-left">
                                    <img src="{{asset('storage/'.$or->relevancy_order_pro->pics[0])}}">
                                </div>
                                <div class="my_order_des_body pull-left">
                                    <h5>{{$or->relevancy_order_pro->name}}</h5>
                                    <p>￥{{number_format($or->relevancy_order_pro->price,2)}}元 x {{$or->pro_nub}}</p>
                                </div>
                            </div>
                            <div class="member_my_order_item_des_right col-xs-5 pull-right clearfix">
                                <div class="my_order_pay_botton pull-right">
                                    <form id="my_order_refund_form-{{$or->id}}" action="{{ route('order.refund') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input name="order_id" type="hidden" value="{{$or->id}}">
                                    </form>
                                    @if($or->pay_status == 1)
                                    <button type="submit " onclick="event.preventDefault();document.getElementById('my_order_refund_form-{{$or->id}}').submit();" id="my_order_refund" class="tk btn " @if($or->refund != 0)disabled="disabled" @endif>申请退款</button>
                                    @endif
                                    @if($or->pay_status == 0)
                                    <button class="ra-pay" onclick="event.preventDefault();document.getElementById('my_order_pay-{{$or->id}}').submit();">立即付款</button>
                                    @endif
                                </div>
                                <form id="my_order_pay-{{$or->id}}" action="{{route('order.showf')}}" method="get">
                                    {{ csrf_field() }}
                                    <input name="order_id" type="hidden" value="{{$or->id}}">
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                <li>
                    <div class="lara_fenye text-center">
                        {{ $order->links()}}
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
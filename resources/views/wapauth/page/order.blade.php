@extends('wap.layouts.base')
@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            @foreach($order as $or)
            <div class="card">
                @if($or->pay_status == 0)
                    <div class="card-header"><span>订单号：{{$or->order_id}}</span><span  class="order-pay_status-ing">未付款</span></div>
                @else
                    <div class="card-header"><span >订单号：{{$or->order_id}}</span>
                        <span class="order-pay_status-end">已付款</span></div>
                @endif

                <div class="card-content">
                    <div class="list-block media-list">
                        <ul>
                            <li class="item-content">
                                <div class="item-media">
                                    <img src="{{asset('storage/'.$or->relevancy_order_pro->pics[0])}}" width="44">
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">{{$or->relevancy_order_pro->name}}</div>
                                    </div>
                                    <div class="item-subtitle">￥{{number_format($or->relevancy_order_pro->price,2)}}元 x {{$or->pro_nub}} </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="card-footer">
                    <span> {{$or->created_at}}</span>
                    <span><i class="order-count-price">共计：￥{{number_format($or->order_money,2)}}元</i></span>
                </div>
            </div>
            @endforeach
                <div class="laravel-pages">
                    {{ $order->links() }}
                </div>
        </div>
    </div>


@endsection

@section('left-panel')
    @include('wapauth.common.sider')
@endsection

@section('jss')


@endsection

@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="card">
                @if($oInfo->pay_status == 0)
                    <div class="card-header"><span>订单号：{{$oInfo->order_id}}</span><span  class="order-pay_status-ing">未付款</span></div>
                @else
                    <div class="card-header"><span >订单号：{{$oInfo->order_id}}</span>
                        <span class="order-pay_status-end">已付款</span></div>
                @endif

                <div class="card-content">
                    <div class="list-block media-list">
                        <ul>
                            <li class="item-content">
                                <div class="item-media">
                                    <img src="{{asset('storage/'.$oInfo->relevancy_order_pro->pics[0])}}" width="44">
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title card-t-title">{{$oInfo->relevancy_order_pro->name}}</div>
                                    </div>
                                    <div class="item-subtitle">￥{{number_format($oInfo->relevancy_order_pro->price,2)}}元 x {{$oInfo->pro_nub}} </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="card-footer">
                    <span> {{$oInfo->created_at}}</span>
                    <span><i class="order-count-price">共计：￥{{number_format($oInfo->order_money,2)}}元</i></span>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('left-panel')
    @include('wapauth.common.sider')
@endsection

@section('jss')


@endsection

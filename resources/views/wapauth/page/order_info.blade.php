@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="card">
                <div class="card-header pro-info-card-title"><span>订单信息</span><span>订单号：{{$oInfo->order_id}}</span></div>
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
                                    <div class="item-subtitle ps-pro-price">
                                        <i><em>￥</em>{{number_format($oInfo->relevancy_order_pro->price,2)}}</i>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer">
                    @if($oInfo->pay_status == 1)
                    <span style="color:green;">已付款</span>
                    @else
                    <span style="color: red;">待付款</span>
                    @endif
                    <span>订单时间：{{$oInfo->created_at}}</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header pro-info-card-title">店铺信息</div>
                <div class="card-content">
                    <div class="list-block media-list">
                        <ul>
                            <li class="item-content">
                                <div class="item-media">
                                    <img src="{{asset('storage/'.$oInfo->rele_order_store->store_pic)}}" width="44">
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">{{$oInfo->rele_order_store->name}}</div>
                                    </div>
                                    <div class="item-subtitle ps-subtitle">{{$oInfo->rele_order_store->address}}</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header pro-info-card-title">医生信息</div>
                <div class="card-content">
                    <div class="list-block media-list">
                        <ul>
                            <li class="item-content">
                                <div class="item-media">
                                    <img src="{{asset('storage/'.$oInfo->rele_order_doctor->avatar)}}" width="44">
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">{{$oInfo->rele_order_doctor->realname}}</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @if($oInfo->pay_status != 1)
                <div style="margin: 0.5rem">
                    <a href="{{route('order.payShow',['order_id' => $oInfo->id])}}" class="button button-big button-fill button-danger">立即付款</a>
                </div>
            @else
                @if($oInfo->refund == 1)
                    <div class="content-padded">
                        <form id="my_order_refund_form-{{$oInfo->id}}" action="{{ route('order.refund') }}" method="POST">
                            {{ csrf_field() }}
                            <input name="order_id" type="hidden" value="{{$oInfo->id}}">
                            <button type="submit" class="button button-big button-fill disabled" disabled="disabled" style="width: 100%">退款中</button>
                        </form>
                    </div>
                @else
                    <div class="content-padded">
                    <form id="my_order_refund_form-{{$oInfo->id}}" action="{{ route('order.refund') }}" method="POST">
                        {{ csrf_field() }}
                        <input name="order_id" type="hidden" value="{{$oInfo->id}}">
                            <button type="submit" class="button button-big button-fill button-danger" style="width: 100%">退款</button>
                    </form>
                    </div>
                @endif

            @endif

        </div>
    </div>

@endsection

@section('left-panel')
    @include('wapauth.common.sider')
@endsection

@section('jss')


@endsection

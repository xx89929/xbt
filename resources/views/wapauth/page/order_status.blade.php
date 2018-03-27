@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="card">
                <div class="card-header">
                    @if($status == 1)
                        <i class="fa fa-check-circle" style="color: #00a700"></i>
                        <span class="order_status_success" style="color: #00a700">成功</span>
                        @else
                        <i class="fa fa-check-circle" style="color: red"></i>
                        <span class="order_status_success" style="color: red">失败</span>
                    @endif
                </div>
                <div class="card-content">
                    <div class="card-content-inner">
                        <div class="item-title">订单号：{{$order['out_trade_no']}}</div>
                        <div class="item-title">交易号：{{$order['trade_no']}}</div>
                        <p><a href="#" class="button button-danger">点击查看订单详情</a></p>
                    </div>
                </div>
                <div class="card-footer">订单时间：{{$order['timestamp']}}</div>
            </div>
        </div>
    </div>


@endsection

@section('left-panel')
    @include('wapauth.common.sider')
@endsection

@section('jss')


@endsection

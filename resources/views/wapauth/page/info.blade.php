@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="page-settings">
                <div class="list-block media-list person-card member-info-warp">
                    <ul>
                        <li>
                            <div href="#" class="item-content">
                                <div class="item-media"><img src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg" width="80"></div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-subtitle">账号：{{Auth::user()->username}}</div>
                                    </div>
                                    <div class="item-subtitle">余额：￥{{Auth::user()->member_info_one->goods}}</div>
                                    <div class="item-text">注册时间：<strong>{{Auth::user()->created_at}}</strong></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="list-block list">
                    <ul>
                        <li class="item-content item-link">
                            <div class="item-media"><i class="icon icon-settings"></i></div>
                            <div class="item-inner">
                                <div class="item-title">账号安全</div>
                            </div>
                        </li>
                        <li class="item-content item-link">
                            <div class="item-media"><i class="icon icon-gift"></i></div>
                            <div class="item-inner">
                                <div class="item-title">我的订单</div>
                            </div>
                        </li>
                        <li class="item-content item-link">
                            <div class="item-media"><i class="icon icon-menu"></i></div>
                            <div class="item-inner">
                                <div class="item-title">我的账户</div>
                            </div>
                        </li>
                        <li class="item-content item-link">
                            <div class="item-media"><i class="icon icon-star"></i></div>
                            <div class="item-inner">
                                <div class="item-title">收货地址</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="content-block">
                    <a onclick="document.getElementById('logout-form').submit();" class="button button-big button-fill button-danger external">Logout</a>
                </div>
            </div>
            <form id="logout-form" method="post"  action="{{route('logout')}}">
                {{csrf_field()}}
            </form>
        </div>
    </div>


@endsection


@section('jss')


@endsection

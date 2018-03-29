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
                                <div class="item-media"><img src="{{asset('storage/'.Auth::guard('doctor')->user()->avatar)}}" width="80"></div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-subtitle">账号：{{Auth::guard('doctor')->user()->account}}</div>
                                        <div class="item-subtitle">昵称：{{Auth::guard('doctor')->user()->realname}}</div>
                                    </div>
                                    <div class="item-subtitle">余额：￥{{number_format(Auth::guard('doctor')->user()->goods,2)}}</div>
                                    <div class="item-text">注册时间：<strong>{{Auth::guard('doctor')->user()->created_at}}</strong></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="list-block list">
                    <ul>
                        <li class="item-content item-link" url="{{route('doc.info')}}">
                            <div class="item-media"><i class="icon icon-star"></i></div>
                            <div class="item-inner">
                                <div class="item-title">医师信息</div>
                            </div>
                        </li>
                        <li class="item-content item-link" url="{{route('doc.safe')}}">
                            <div class="item-media"><i class="icon icon-settings"></i></div>
                            <div class="item-inner">
                                <div class="item-title">账号安全</div>
                            </div>
                        </li>
                        <li class="item-content item-link" url="{{route('doc.cash')}}">
                            <div class="item-media"><i class="icon icon-menu"></i></div>
                            <div class="item-inner">
                                <div class="item-title">我的账户</div>
                            </div>
                        </li>
                        <li class="item-content item-link" url="{{route('doc.cash.list')}}">
                            <div class="item-media"><i class="icon icon-star"></i></div>
                            <div class="item-inner">
                                <div class="item-title">提现记录</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="content-block">
                    <a onclick="document.getElementById('doc-logout-form').submit();" class="button button-big button-fill button-danger external">退出</a>
                </div>
            </div>
            <form id="doc-logout-form" method="post"  action="{{route('doc.logout')}}">
                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection

@section('left-panel')
    @include('wapdoc.common.sider')
@endsection
@section('jss')


@endsection

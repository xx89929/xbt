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
                                <label class="item-media avatar-label" id="upload-avatar"><img src="{{asset('storage/'.Auth::user()->member_info_one->head_pic)}}" width="80"></label>
                                <div class="item-inner" style="overflow: hidden;">
                                    <div class="item-title-row">
                                        <div class="item-subtitle">账号：{{Auth::user()->username}}</div>
                                    </div>
                                    <div class="item-subtitle">余额：￥{{number_format(Auth::user()->member_info_one->goods,2)}}</div>
                                    <div class="item-text">注册时间：<strong>{{Auth::user()->created_at}}</strong></div>


                                        <label class="upload-avatar-button button button-fill button-primary " for="input-avatar">上传头像</label>
                                        <form id="form-avatar" style="display: none" method="post" action="{{route('memberAvatar.save')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <input type="file" name="avatar" id="input-avatar" style="position:absolute;clip:rect(0 0 0 0);"  accept="image/*"/>
                                        </form>



                                </div>
                            </div>
                        </li>
                    </ul>
                </div>




                <div class="list-block list">
                    <ul>
                        <li class="item-content item-link" url="{{route('member.safe')}}">
                            <div class="item-media"><i class="icon icon-settings"></i></div>
                            <div class="item-inner">
                                <div class="item-title">账号安全</div>
                            </div>
                        </li>
                        <li class="item-content item-link" url="{{route('member.order')}}">
                            <div class="item-media"><i class="icon icon-gift"></i></div>
                            <div class="item-inner">
                                <div class="item-title">我的订单</div>
                            </div>
                        </li>
                        <li class="item-content item-link" url="{{route('member.finace')}}">
                            <div class="item-media"><i class="icon icon-menu"></i></div>
                            <div class="item-inner">
                                <div class="item-title">我的账户</div>
                            </div>
                        </li>
                        <li class="item-content item-link" url="{{route('member.address')}}">
                            <div class="item-media"><i class="icon icon-star"></i></div>
                            <div class="item-inner">
                                <div class="item-title">收货地址</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="content-block">

                    <a onclick="document.getElementById('logout-form').submit();" class="button button-big button-fill button-danger external ">退出</a>
                </div>
            </div>
            <form id="logout-form" method="post"  action="{{route('logout')}}">
                {{csrf_field()}}
            </form>
        </div>
    </div>


@endsection

@section('left-panel')
    @include('wapauth.common.sider')
@endsection

@section('jss')
    <script type="text/javascript">
        $('#input-avatar').change(function () {
            $('#form-avatar').submit();
        })
    </script>

@endsection

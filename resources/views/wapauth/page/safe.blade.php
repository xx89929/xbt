@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="buttons-tab">
                <a href="#tab1" class="tab-link active button">修改密码</a>
                <a href="#tab2" class="tab-link button">绑定邮箱</a>
            </div>

            <div class="content-block">
                <div class="tabs">
                    <div id="tab1" class="tab active">
                        <div class="list-block">
                            <form id="resetPwdForm" method="POST" action="{{ route('password.request') }}">
                                {{ csrf_field() }}
                                <ul>
                                    <li>
                                        <div class="item-content">
                                            <div class="item-media"><i class="icon icon-form-password"></i></div>
                                            <div class="item-inner">
                                                <div class="item-input">
                                                    <input type="password" name="old_password" placeholder="请输入原密码">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-content">
                                            <div class="item-media"><i class="icon icon-form-password"></i></div>
                                            <div class="item-inner">
                                                <div class="item-input">
                                                    <input name="password" type="password" placeholder="请输入新密码">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-content">
                                            <div class="item-media"><i class="icon icon-form-password"></i></div>
                                            <div class="item-inner">
                                                <div class="item-input">
                                                    <input type="password" name="password_confirmation" placeholder="请再次输入新密码">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-100" id="resetPwdButton"><a href="#" class="button button-big button-fill button-danger">修改</a></div>
                        </div>
                    </div>
                    <div id="tab2" class="tab">
                        <div class="content-block">
                            <p>This is tab 2 content</p>
                        </div>
                    </div>
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

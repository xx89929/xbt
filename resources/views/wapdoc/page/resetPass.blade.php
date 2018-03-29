@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="content-block">
                <div class="list-block">
                    <form id="resetPwdForm" method="POST" action="{{ route('doc_password.request') }}">
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
        </div>
    </div>
@endsection
@section('left-panel')
    @include('wapdoc.common.sider')
@endsection

@section('jss')

@endsection

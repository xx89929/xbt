@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="buttons-tab">
                <a href="#member_reg" class="tab-link active button">会员注册</a>
                <a href="#doctor_reg" class="tab-link button">医生注册</a>
            </div>
            <div class="content-block">
                <div class="tabs">
                    <div id="member_reg" class="tab active">
                        <div class="page-login">
                            <div class="list-block inset text-center">
                                <form id="member-login" method="post" action="{{ route('register') }}">
                                    {{csrf_field()}}
                                    <ul>
                                        <!-- Text inputs -->
                                        <li>
                                            <div class="item-content">
                                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                                <div class="item-inner">
                                                    <div class="item-input">
                                                        <input type="text" name="username" placeholder="请输入账号">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="item-content">
                                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                                <div class="item-inner">
                                                    <div class="item-input">
                                                        <input name="password" type="password" placeholder="请输入密码">
                                                    </div>
                                                </div>
                                            </div>
                                        <li>
                                            <div class="item-content">
                                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                                <div class="item-inner">
                                                    <div class="item-input">
                                                        <input name="password_confirmation" type="password" placeholder="请再次输入密码">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="content-block">
                                <p><a class="button button-big button-fill external" id="member-login-button"  data-transition='fade'>会员注册</a></p>
                                <p class='text-center signup'>
                                    <a href="{{route('login.show')}}" class='pull-left'>已经注册账号了？点击这里</a>
                                </p>
                            </div>
                        </div>
                    </div>


                    {{--医生注册--}}
                    <div id="doctor_reg" class="tab">
                        <div id="member_login" class="tab active">
                            <div class="page-login">
                                <div class="list-block inset text-center">
                                    <form id="doctor-login" method="post" action="{{ route('docreg') }}">
                                        {{csrf_field()}}
                                        <ul>
                                            <!-- Text inputs -->
                                            <li>
                                                <div class="item-content">
                                                    <div class="item-media"><i class="icon icon-form-name"></i></div>
                                                    <div class="item-inner">
                                                        <div class="item-input">
                                                            <input type="text" name="account" placeholder="请输入账号">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="item-content">
                                                    <div class="item-media"><i class="icon icon-form-name"></i></div>
                                                    <div class="item-inner">
                                                        <div class="item-input">
                                                            <input type="text" name="realname" placeholder="请输入真实姓名">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="item-content">
                                                    <div class="item-media"><i class="icon icon-form-password"></i></div>
                                                    <div class="item-inner">
                                                        <div class="item-input">
                                                            <input name="password" type="password" placeholder="请输入密码">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="item-content">
                                                    <div class="item-media"><i class="icon icon-form-password"></i></div>
                                                    <div class="item-inner">
                                                        <div class="item-input">
                                                            <input name="password_confirmation" type="password" placeholder="请输入密码">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                                <div class="content-block">
                                    <p><a class="button button-big button-fill external" id="doctor-login-button"  data-transition='fade'>医师注册</a></p>
                                    <p class='text-center signup'>
                                        <a href="{{route('login.show')}}" class='pull-left'>已经注册账号了？点击这里</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('jss')

@endsection

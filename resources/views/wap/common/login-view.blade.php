@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="buttons-tab">
                <a href="#phone_login" class="tab-link active button">短信快捷登陆</a>
                <a href="#account_login" class="tab-link button">账号密码登陆</a>
            </div>
            <div class="content-block">
                <div class="tabs">

                    {{--手机登陆--}}
                    <div id="phone_login" class="tab active">
                        <div id="member_login" class="tab active">
                            <div class="page-login">
                                <div class="list-block inset text-center">
                                    <form id="doctor-login" method="post" action="{{route('phone.login')}}">
                                        {{csrf_field()}}
                                        <ul>
                                            <!-- Text inputs -->
                                            <li>
                                                <div class="item-content">
                                                    <div class="item-media"><i class="icon icon-form-name"></i></div>
                                                    <div class="item-inner">
                                                        <div class="item-input">
                                                            <input id="userPhoneSend" type="text" name="phone" placeholder="请输入手机号">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="item-content">
                                                    <div class="item-media"><i class="icon icon-form-password"></i></div>
                                                    <div class="item-inner">
                                                        <div class="item-input">
                                                            <input name="phone_code" type="password" placeholder="手机验证码">
                                                        </div>
                                                        <div class="item-input">
                                                            <button data-url="{{route('reg.SendSms')}}" id="sendSmsVerify" type="button" class="button button-fill">发送验证码</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                                <div class="content-block">
                                    <p><a class="button button-big button-fill external" id="doctor-login-button"  data-transition='fade'>登陆</a></p>
                                    <p class='text-center signup'>
                                        <a href="{{route('reg.show')}}" class='pull-left'>还没有账号？点击这里</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="account_login" class="tab ">
                        <div class="page-login">
                            <div class="list-block inset text-center">
                                <form id="member-login" method="post" action="{{ route('login') }}">
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
                                                <div class="item-media"><i class="icon icon-form-email"></i></div>
                                                <div class="item-inner">
                                                    <div class="item-input">
                                                        <input name="password" type="password" placeholder="请输入密码">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="content-block">
                                <p><a class="button button-big button-fill external" id="member-login-button"  data-transition='fade'>登陆</a></p>
                                <p class='text-center signup'>
                                    <a href="{{route('reg.show')}}" class='pull-left'>还没有账号？点击这里</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('left-panel')
    <div class="panel panel-left panel-reveal theme-dark" id='left-panel-button'>
        <div class="content-block-title">注册分类</div>
        <div class="list-block">
            <ul>
                <li >
                    <a class="item-content item-link" href="{{route('reg.show')}}">
                        <div class="item-inner">
                            <div class="item-after">会员注册</div>
                        </div>
                    </a>
                </li>
                <li >
                    <a class="item-content item-link" href="{{route('docreg.show')}}">
                        <div class="item-inner">
                            <div class="item-after">医师注册</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="content-block-title">登陆分类</div>
        <div class="list-block">
            <ul>
                <li >
                    <a class="item-content item-link" href="{{route('login.show')}}">
                        <div class="item-inner">
                            <div class="item-after">会员登陆</div>
                        </div>
                    </a>
                </li>
                <li >
                    <a class="item-content item-link" href="{{route('doclog.show')}}">
                        <div class="item-inner">
                            <div class="item-after">医师登陆</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('jss')

@endsection

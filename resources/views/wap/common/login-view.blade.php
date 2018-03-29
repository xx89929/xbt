@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="buttons-tab">
                <a href="#member_login" class="tab-link active button">会员登陆</a>
                <a href="#doctor_login" class="tab-link button">医生登陆</a>
            </div>
            <div class="content-block">
                <div class="tabs">
                    <div id="member_login" class="tab active">
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
                                <p><a class="button button-big button-fill external" id="member-login-button"  data-transition='fade'>会员登陆</a></p>
                                <p class='text-center signup'>
                                    <a href="{{route('reg.show')}}" class='pull-left'>还没有账号？点击这里</a>
                                </p>
                            </div>
                        </div>
                    </div>


                    {{--医生登陆--}}
                    <div id="doctor_login" class="tab">
                        <div id="member_login" class="tab active">
                            <div class="page-login">
                                <div class="list-block inset text-center">
                                    <form id="doctor-login" method="post" action="{{ route('doclog') }}">
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
                                    <p><a class="button button-big button-fill external" id="doctor-login-button"  data-transition='fade'>医师登陆</a></p>
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
    </div>
@endsection


@section('jss')

@endsection

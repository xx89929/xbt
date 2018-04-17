@extends('home.layout.base')
@section('content')
<div class="v-member" style="background: url('{{url("home/images/bg-1.jpg")}}')">
    <div class="container" style="position: relative">
        <div class="v-member-box">
            <div class="v-member-tit">
                <ul class="list-inline">
                    <li class="active"><a><h4>短信快捷登陆</h4></a></li>
                    <li ><a><h4 >账号登陆</h4></a></li>
                </ul>
            </div>
            <div class="v-member-con">
                <div class="v-member-log" style="display: block;">
                    <form id="usr-reg" class="form-horizontal text-center" method="POST" action="{{route('phone.login')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group v-member-input">
                                <div class="input-group-addon v-member-label"><i class="fa fa-mobile-phone"></i></div>
                                <input id="userPhoneSend" name="phone" type="text" class="form-control" placeholder="请输入手机号" value="{{ old('phone') }}" required autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-7">
                                <div class="input-group v-member-input">
                                    <div class="input-group-addon v-member-label"><i class="fa fa-lock"></i></div>
                                    <input name="phone_code" type="text" class="form-control" placeholder="手机验证码">
                                </div>
                            </div>
                            <div class="col-xs-5 sendSmsButton">
                                <button data-url="{{route('reg.SendSms')}}" id="sendSmsVerify" type="button" class="btn btn-default">发送验证码</button>
                            </div>
                        </div>

                        <input name="reg_type" type="hidden" value="phone">
                        <button type="submit" class="btn btn-primary member_submit_btn">登陆</button>
                    </form>
                </div>


                <div class="v-member-log">
                    <form class="form-horizontal text-center" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group v-member-input">
                                <div class="input-group-addon v-member-label"><i class="fa fa-user"></i></div>
                                <input name="username" type="text" class="form-control" placeholder="输入手机号/用户名/邮箱" value="{{ old('username') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group v-member-input">
                                <div class="input-group-addon v-member-label"><i class="fa fa-lock"></i></div>
                                <input name="password" type="password" class="form-control" placeholder="输入密码">
                            </div>
                        </div>
                        @if ($errors->has('username'))
                            <div class="help-block alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>{{ $errors->first('username') }}</strong>
                            </div>
                        @endif
                        @if ($errors->has('password'))
                            <span class="help-block bg-danger">
                                    <strong>{{ $errors->first('password')}}</strong>
                            </span>
                        @endif
                        <button type="submit" class="btn btn-primary member_submit_btn">登陆</button>
                    </form>
                </div>
            </div>
            <div class="v-member-question">
                    <p><a href="{{route('forget.Pwd')}}">忘记密码?</a></p>
            </div>
            <div class="v-member-other-login">
                <label>其他方式登陆：</label>
                <ul class="list-inline">
                    <li>
                        <a href="">
                            <i class="fa fa-qq"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i style="color: green" class="fa fa-weixin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i style="color: red;" class="fa fa-weibo"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

@endsection
@extends('home.layout.base')
@section('content')
<div class="v-member" style="background: url('{{url("home/images/bg-1.jpg")}}')">
    <div class="container" style="position: relative">
        <div class="v-member-box">
            <div class="v-member-tit clearfix">
                <h4 class="pull-left">注册新账号</h4>
                {{--<span class="phone-a-button pull-right"><a href="{{route('phone.register')}}">手机注册</a></span>--}}
            </div>
            <form id="usr-reg" class="form-horizontal text-center" method="POST" action="{{route('register')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group v-member-input">
                        <div class="input-group-addon v-member-label"><i class="fa fa-user-plus"></i></div>
                        <input name="username" type="text" class="form-control" placeholder="输入用户名或邮箱" value="{{ old('username') }}" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group v-member-input">
                        <div class="input-group-addon v-member-label"><i class="fa fa-lock"></i></div>
                        <input name="password" type="password" class="form-control" placeholder="输入密码">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group v-member-input">
                        <div class="input-group-addon v-member-label"><i class="fa fa-lock"></i></div>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="再次输入密码"  required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group v-member-input">
                        <div class="input-group-addon v-member-label"><i class="fa fa-mobile "></i></div>
                        <input id="userPhoneSend" name="phone" type="text" class="form-control" placeholder="手机号：可用于登陆和找回密码" value="{{ old('phone') }}" required autofocus>
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
                <button type="submit" class="btn btn-primary member_submit_btn">注册</button>
            </form>
        </div>
    </div>

</div>
@endsection
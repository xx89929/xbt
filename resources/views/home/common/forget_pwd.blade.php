@extends('home.layout.base')
@section('content')
    <div class="container">
        <div class="forgetPwdView-box">
            <div class="forgetPwdView-title">
                <h4>找回密码</h4>
            </div>
            <form id="usr-forgetPwd" class="form-horizontal text-center" method="POST" action="{{route('forget.Pwd')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group v-member-input">
                        <div class="input-group-addon v-member-label"><i class="fa fa-mobile-phone"></i></div>
                        <input id="userPhoneSend" name="phone" type="text" class="form-control" placeholder="请输入手机号" value="{{ old('phone') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group v-member-input">
                        <div class="input-group-addon v-member-label"><i class="fa fa-lock"></i></div>
                        <input id="userPhoneSend" name="password" type="password" class="form-control" placeholder="请输入新密码" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group v-member-input">
                        <div class="input-group-addon v-member-label"><i class="fa fa-lock"></i></div>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="再次输入新密码"  required>
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
                        <button data-url="{{route('send.forgetPwd')}}" id="sendSmsVerify" type="button" class="btn btn-default">发送验证码</button>
                    </div>
                </div>

                <input name="reg_type" type="hidden" value="phone">
                <button type="submit" class="btn btn-primary member_submit_btn">密码重置</button>
            </form>
        </div>
    </div>

@endsection
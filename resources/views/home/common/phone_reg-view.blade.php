@extends('home.layout.base')
@section('content')
    <div class="v-member" style="background: url('{{url("home/images/bg-1.jpg")}}')">
        <div class="container" style="position: relative">
            <div class="v-member-box">
                <div class="v-member-tit">
                    <h4>手机注册</h4>
                    <span class="phone-a-button pull-right"><a href="{{route('register')}}">账号密码注册</a></span>
                </div>
                <form id="usr-reg" class="form-horizontal text-center" method="POST" action="{{route('phone.register')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group v-member-input">
                            <div class="input-group-addon v-member-label"><i class="fa fa-user-plus"></i></div>
                            <input id="regPhone" name="username" type="text" class="form-control" placeholder="手机号" value="{{ old('username') }}" required autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-7">
                            <div class="input-group v-member-input">
                                <div class="input-group-addon v-member-label"><i class="fa fa-lock"></i></div>
                                <input name="phone_code" type="text" class="form-control" placeholder="手机验证码">
                            </div>
                        </div>
                        <div class="col-xs-5" style="padding-left:0px;">
                            <button data-url="{{route('reg.SendSms')}}" id="sendSmsVerify" type="button" class="btn btn-default">发送验证码</button>
                        </div>
                    </div>

                    <input name="reg_type" type="hidden" value="phone">
                    <button type="submit" class="btn btn-primary">注册</button>
                </form>
            </div>
        </div>
    </div>
@endsection
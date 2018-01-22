@extends('home.layout.base')
@section('content')
<div class="v-member" style="background: url('{{url("home/images/bg-1.jpg")}}')">
    <div class="container" style="position: relative">
        <div class="v-member-box">
            <div class="v-member-tit">
                <ul class="list-inline">
                    <li class="active"><a><h4 >账号登陆</h4></a></li>
                    <li><a><h4>微信登陆</h4></a></li>
                </ul>
            </div>
            <div class="v-member-con">
                <div class="v-member-log" style="display: block;">
                    <form class="form-horizontal text-center" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group v-member-input">
                                <div class="input-group-addon v-member-label"><i class="fa fa-user"></i></div>
                                <input name="username" type="text" class="form-control" placeholder="输入账号" value="{{ old('username') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group v-member-input">
                                <div class="input-group-addon v-member-label"><i class="fa fa-lock"></i></div>
                                <input name="password" type="password" class="form-control" placeholder="输入密码">

                            </div>
                        </div>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <button type="submit" class="btn btn-primary">登陆</button>
                    </form>
                </div>

                <div class="v-member-log">
                    <div class="v-mem-weixin-login">
                        <img src="{{url('home/images/icon/hyCode.jpg')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    $('.v-member-tit > ul > li').click(function () {
        var that = $(this),
            index = that.index();
        that.addClass('active').siblings().removeClass('active');
        $('.v-member-con > .v-member-log').eq(index).show().siblings().hide();
    })
</script>
@endsection
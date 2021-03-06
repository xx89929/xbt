@extends('home.layout.base')
@section('content')
    <div class="v-member" style="background: url('{{url("home/images/bg-1.jpg")}}')">
        <div class="container" style="position: relative">
            <div class="v-member-box">
                <div class="v-member-tit">
                    <h4>注册医师</h4>
                </div>
                <form id="doc-reg" class="form-horizontal text-center" method="POST" action="{{route('docreg')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group v-member-input">
                            <div class="input-group-addon v-member-label"><i class="fa fa-user-plus"></i></div>
                            <input name="account" type="text" class="form-control" placeholder="输入账号" value="{{ old('account') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group v-member-input">
                            <div class="input-group-addon v-member-label"><i class="fa fa-drivers-license"></i></div>
                            <input name="realname" type="text" class="form-control" placeholder="请输入真实姓名"  required>
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
                    <button type="submit" class="btn btn-primary">注册</button>
                </form>
            </div>
        </div>

    </div>
@endsection
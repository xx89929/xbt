@extends('home.layout.base')
@section('content')
<div class="v-member" style="background: url('{{url("home/images/bg-1.jpg")}}')">
    <div class="container" style="position: relative">
        <div class="v-member-box">
            <div class="v-member-tit">
                <h4>注册新账号</h4>
            </div>
            <form id="usr-reg" class="form-horizontal text-center" method="POST" action="{{route('register')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group v-member-input">
                        <div class="input-group-addon v-member-label"><i class="fa fa-user-plus"></i></div>
                        <input name="username" type="text" class="form-control" placeholder="输入账号" value="{{ old('username') }}" required autofocus>
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
                    <label class="radio-inline">
                        <input type="radio" name="member_type" value="1" checked> 普通会员
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="member_type" value="2"> 医生医师
                    </label>
                </div>

                @if ($errors->any())
                    <div id="user_errors" class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">注册</button>
            </form>
        </div>
    </div>

</div>
@endsection
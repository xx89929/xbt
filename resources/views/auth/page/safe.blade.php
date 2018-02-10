@extends('auth.layout.authbase')
@section('auth-page')
    <div class="member-safe">
        <ul class="list-unstyled">
            <li>
                <div class="member-safe-item clearfix">
                    <div class="member-safe-i-tag pull-left text-center">
                        <i class="fa fa-unlock"></i>
                    </div>
                    <div class="member-safe-i-tit pull-left">
                        <h4>账号密码</h4>
                        <p>用于保护帐号信息和登录安全</p>
                    </div>
                    <div class="member-safe-i-active pull-right">
                        <a href="{{route('password.request')}}">修改</a>
                    </div>
                </div>
            </li>

            <li>
                <div class="member-safe-item clearfix">
                    <div class="member-safe-i-tag pull-left ">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="member-safe-i-tit pull-left">
                        <h4>邮箱绑定 <span>未绑定</span></h4>
                        <p>邮箱绑定可以用于登录帐号，重置密码或其他安全验证</p>
                    </div>
                    <div class="member-safe-i-active pull-right">
                        <a href="#">绑定</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection
@extends('home.layout.base')
@section('content')
    <div class="v-member" style="background: url('{{url("home/images/bg-1.jpg")}}')">
        <div class="container" style="position: relative">
            <div class="v-member-box">
                <div class="v-member-tit">
                    <ul class="list-inline">
                        <li class="active"><a><h4 >医生账号登陆</h4></a></li>
                    </ul>
                </div>
                <div class="v-member-con">
                    <div class="v-member-log" style="display: block;">
                        <form class="form-horizontal text-center" method="POST" action="{{ route('doclog') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('account') ? ' has-error' : '' }}">
                                <div class="input-group v-member-input">
                                    <div class="input-group-addon v-member-label"><i class="fa fa-user"></i></div>
                                    <input name="account" type="text" class="form-control" placeholder="输入账号" value="{{ old('account') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group v-member-input">
                                    <div class="input-group-addon v-member-label"><i class="fa fa-lock"></i></div>
                                    <input name="password" type="password" class="form-control" placeholder="输入密码">

                                </div>
                            </div>
                            @if ($errors->has('account'))
                                <div class="help-block alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>{{ $errors->first('account') }}</strong>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">登陆</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
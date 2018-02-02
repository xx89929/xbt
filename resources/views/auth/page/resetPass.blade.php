@extends('auth.layout.authbase')
@section('auth-page')
    @if(session('status'))
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">
                &times;
            </a>
            <strong>{{ session('status') }}</strong>
        </div>
    @endif
    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">原密码</label>

            <div class="col-md-6">
                <input id="old_password" type="password" class="form-control" name="old_password" value="{{ old('old_password') }}" required autofocus>

                @if ($errors->has('old_password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('old_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">密码</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">确认密码</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    修改
                </button>
            </div>
        </div>
    </form>
@endsection
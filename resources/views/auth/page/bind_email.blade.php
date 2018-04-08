@extends('auth.layout.authbase')
@section('auth-page')
    <form class="form-horizontal" method="POST" action="{{ route('safe.bEmail') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">邮箱</label>
            <div class="col-md-6">
                <input id="password-confirm" type="text" class="form-control" name="email"
                @if(isset($email->email) && $email->email)
                    value="{{$email->email}}" disabled="true"
                @endif
                >
                <input type="hidden" name="subject" value="绑定邮箱">
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
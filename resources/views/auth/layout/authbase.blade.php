@extends('home.layout.base')
@section('content')
    <div class="member-warp">
        <div class="container">
            <div class="member-box clearfix">
                <div class="member-nav pull-left">
                    @include('auth.layout.partials.member-nav')
                </div>
                <div class="member-con pull-left">
                    @yield('auth-page')
                </div>
            </div>
        </div>
    </div>
@endsection
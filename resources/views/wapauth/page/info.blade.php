@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <p><a id="logout-button" onclick="document.getElementById('logout-form').submit();" >退出</a></p>
            <form id="logout-form" method="post"  action="{{route('logout')}}">
                {{csrf_field()}}
            </form>
        </div>
    </div>


@endsection


@section('jss')


@endsection

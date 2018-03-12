@extends('wap.layouts.base')
@section('content')
    <div class="content" >
        {{--<div class="list-block case-warp">--}}
            {{--<div class="case-warp-box">--}}
                {{--<ul class="case-warp-ul">--}}
                    {{--@foreach($case as $cs)--}}
                        {{--<li class="item-content item-link case-item">--}}
                            {{--<div class="item-media">--}}
                                {{--<img src="{{asset('storage/'.$cs->image)}}">--}}
                            {{--</div>--}}
                            {{--<div class="item-inner">--}}
                                {{--<div class="item-title">{{str_limit($cs->name,30)}}</div>--}}
                                {{--<div class="item-after">{{str_limit($cs->describe,30)}}</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
                {{--<div class="laravel-pages">--}}
                    {{--{{ $case->links()}}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="list-block media-list case-warp">
            <ul class="case-warp-ul">
                @foreach($case as $cs)
                    <li>
                        <a href="#" class="item-link item-content">
                            <div class="item-media"><img src="{{asset('storage/'.$cs->image)}}" style='width: 4rem;'></div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title">{{str_limit($cs->name,25)}}</div>
                                    <div class="item-after"></div>
                                </div>
                                <div class="item-subtitle"></div>
                                <div class="item-text">{{str_limit($cs->describe,30)}}</div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="laravel-pages">
            {{ $case->links()}}
            </div>
        </div>

    </div>
@endsection


@section('jss')
    <script>
        $.init();
    </script>

@endsection

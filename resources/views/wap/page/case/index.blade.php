@extends('wap.layouts.base')
@section('content')
    <div class="content" >
        <div class="list-block case-warp">
            <div class="case-warp-box">
                <ul class="case-warp-ul">
                    @foreach($case as $cs)
                        <li class="item-content item-link case-item">
                            <div class="item-media">
                                <img src="{{asset('storage/'.$cs->image)}}">
                            </div>
                            <div class="item-inner">
                                <div class="item-title">{{str_limit($cs->name,30)}}</div>
                                <div class="item-after">{{str_limit($cs->describe,40)}}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="laravel-pages">
                    {{ $case->links()}}
                </div>
            </div>

        </div>

    </div>
@endsection


@section('jss')
    <script>
        $.init();
    </script>

@endsection

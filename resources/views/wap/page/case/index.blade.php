@extends('wap.layouts.base')
@section('content')
    <div class="page page-case" id="page-case">
        @include('wap.layouts.head')
        <div class="content">
            <div class="list-block media-list case-warp">
                <ul class="case-warp-ul">
                    @foreach($case as $cs)
                        <li>
                            <a href="{{route('case.info',['case_id' => $cs->id])}}" class="item-link item-content">
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
    </div>
@endsection
@section('left-panel')
    <div class="panel panel-left panel-reveal theme-dark" id='left-panel-button'>
        <div class="content-block-title">案例分类</div>
        <div class="list-block">
            <ul>
                @foreach($caseNav as $cn)
                <li class="item-content">
                    <div class="item-inner">
                        <div class="item-after">{{$cn->title}}</div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('jss')

@endsection

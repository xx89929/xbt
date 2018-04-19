@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="card demo-card-header-pic">

                <div class="card-content">
                    <div class="card-content-inner" style="overflow: hidden;">
                        <h3 class="card-title">{{$news->title}}</h3>
                        <p class="color-gray">发表于 {{$news->created_at}}</p>
                        <p class="card-title">{!! $news->content !!}</p>
                    </div>
                </div>
                <div class="card-footer">
                    @if($news_pre)
                        <a href="{{route('news.item',['id' => $news_pre->id ])}}" class="link">上一个案例：{{str_limit($news_pre->title,8)}}</a>
                    @endif

                    @if($news_next)
                        <a href="{{route('news.item',['id' => $news_next->id])}}" class="link">下一个案例：{{str_limit($news_next->title,8)}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('left-panel')

@endsection

@section('jss')

@endsection

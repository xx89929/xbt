@extends('wap.layouts.base')
@section('content')
    <div class="page page-case" id="page-case">
        @include('wap.layouts.head')
        <div class="content">
            <div class="news-warp">
                @foreach($news as $nw)
                    <div class="card demo-card-header-pic">
                        <div valign="bottom" class="card-header color-white no-border no-padding">
                            <img class='card-cover' src="{{asset('storage/'.$nw->pic)}}" alt="">
                        </div>
                        <div class="card-content">
                            <div class="card-content-inner">
                                <p class="color-gray">发表于{{$nw->updated_at}}</p>
                                <p>{{$nw->title}}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{--<a href="#" class="link">赞</a>--}}
                            <a href="{{route('news.item',['id' => $nw->id])}}" class="link">更多</a>
                        </div>
                    </div>
                @endforeach
                    <div class="laravel-pages">
                        {{ $news->links() }}
                    </div>
            </div>

        </div>
    </div>
@endsection
@section('left-panel')
    <div class="panel panel-left panel-reveal theme-dark" id='left-panel-button'>
        <div class="content-block-title">新闻分类</div>
        <div class="list-block">
            <ul>
                @foreach($newTag as $nt)
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-after">{{$nt->name}}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('jss')

@endsection

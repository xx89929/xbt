<div class="news-item-left-box col-xs-9">
    <div class="news-item-title row">
        <h3 class="col-xs-12">{{$news->title}}</h3>
    </div>
    <div class="news-item-push-tiem">
        <span>{{$news->created_at}}</span><span>{{$news->push_tagger}} </span><span><i class="fa fa-eye"></i> {{$news->read_num}}</span>
    </div>
    <div class="news-item-content">
        {!! $news->content !!}
    </div>

    <div class="news-item-bottom">
        <ul class="list-inline clearfix">
            <li class="col-xs-6">
                @if($news_pre)
                <a href="{{route('news.item',['id' => $news_pre->id])}}" class="n-i-a pull-left" title="{{$news_pre->title}}">
                    <p>上一篇：{{ str_limit($news_pre->title,25,'')}}</p>
                </a>
                @endif
            </li>
            <li class="col-xs-6">
                @if($news_next)
                <a href="{{route('news.item',['id' => $news_next->id])}}" class="n-i-a pull-right" title="{{$news_next->title}}">
                    <p>下一篇：{{ str_limit($news_next->title,25,'')}}</p>
                </a>
                @endif
            </li>
        </ul>
    </div>
</div>
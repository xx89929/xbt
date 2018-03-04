<div class="ind-news">
    <div class="ind-tit">
        <h3>新闻专题</h3>
    </div>
    <div class="ind-news-box clearfix">
        <div id="ind-news-l1" class="ind-news-l1-box pull-left carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <span class="ind-news-l1-prev ind-news-l1-botton">
                        <i class="fa fa-chevron-left" data-slide="prev"></i>
                </span>
                <span class="ind-news-l1-next ind-news-l1-botton"  data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                </span>
                @foreach($news as $new)
                    @if($loop->first)
                        <a href="{{route('news.item',['id' => $new->id])}}" class="ind-news-l1 item active">
                            <img  src="{{asset('storage/'.$new->pic)}}">
                            <div class="ind-news-l1-des">
                                <h4>{{ str_limit($new->title,50)}}</h4>
                                <span class="ind-news-l1-tag">
                                    {{$new->news_tag_one->name}}
                                </span>
                                <p><span>发布时间：{{$new->updated_at}}</span></p>
                                <p>{{ $new->describes }}</p>
                            </div>
                        </a>
                    @elseif($loop->iteration)
                            <a href="{{route('news.item',['id' => $new->id])}}" class="ind-news-l1 item">
                                <img src="{{asset('storage/'.$new->pic)}}">
                                <div class="ind-news-l1-des">
                                    <h4>{{ str_limit($new->title,50)}}</h4>
                                    <span class="ind-news-l1-tag">
                                        {{$new->news_tag_one->name}}
                                    </span>
                                    <p><span>发布时间：{{$new->updated_at}}</span></p>
                                    <p>{{ $new->describes }}</p>
                                </div>
                            </a>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="ind-news-r1 pull-left">
            <div class="ind-news-acd">
                @foreach($salon as $sa)
                    <a href="{{route('news.item',['id' => $sa->id])}}" class="ind-news-acd-f1 col-xs-6">
                        <img class="lazy" data-original="{{asset('storage/'.$sa->pic)}}">
                        <div class="ind-news-acd-des">
                            <h4>{{ str_limit($sa->title,15) }}</h4>
                            <span class="ind-news-acd-tag">
                            {{$sa->news_tag_one->name}}
                        </span>
                            <p>{{ str_limit($sa->describes,120) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="ind-news-r2">
                <div id="ind-news-r2" class="ind-news-r2-box carousel slide" data-ride="carousel">
                    <span class="ind-news-r2-prev ind-news-r2-botton">
                        <i class="fa fa-chevron-left" data-slide="prev"></i>
                    </span>
                    <span class="ind-news-r2-next ind-news-r2-botton"  data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                    </span>
                    <div class="ind-news-r2-lunbo">
                        <div class="carousel-inner">
                            <ul class="list-inline clearfix item active">
                                @foreach($dynamic as $dy)
                                    @if($loop->index < 3)
                                    <li>
                                        <a href="{{route('news.item',['id' => $dy->id])}}" class="ind-news-r2-con">
                                            <img src="{{asset('storage/'.$dy->pic)}}">
                                            <div class="ind-news-r2-des">
                                                <h4>{{ str_limit($dy->title,10)}}</h4>
                                                <p>{{  str_limit($dy->describes,50) }}</p>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach

                            </ul>

                            @if(count($dynamic) > 3)
                            <ul class="list-inline clearfix item">
                                @foreach($dynamic as $dy)
                                    @if($loop->index < 6 && $loop->index >2 )
                                        <li>
                                            <a href="{{route('news.item',['id' => $dy->id])}}" class="ind-news-r2-con">
                                                <img src="{{asset('storage/'.$dy->pic)}}">
                                                <div class="ind-news-r2-des">
                                                    <h4>{{ str_limit($dy->title,10)}}</h4>
                                                    <p>{{  str_limit($dy->describes,50) }}</p>
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

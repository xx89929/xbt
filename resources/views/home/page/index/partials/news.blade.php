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
                        <a href="#" class="ind-news-l1 item active">
                            <img class="lazy" data-original="{{$PicPath.$new->pic}}">
                            <div class="ind-news-l1-des">
                                <h4>{{$new->title}}</h4>
                                <span class="ind-news-l1-tag">
                                    {{$new->news_tag_one->name}}
                                </span>
                                <p><span>发布时间：{{$new->updated_at}}</span></p>
                                <p>{!! mb_substr($new->describes,0,120)."..." !!}</p>
                            </div>
                        </a>
                    @elseif($loop->remaining)
                            <a href="#" class="ind-news-l1 item">
                                <img class="lazy" data-original="{{$PicPath.$new->pic}}">
                                <div class="ind-news-l1-des">
                                    <h4>{{$new->title}}</h4>
                                    <span class="ind-news-l1-tag">
                                        {{$new->news_tag_one->name}}
                                    </span>
                                    <p><span>发布时间：{{$new->updated_at}}</span></p>
                                    <p>{!! mb_substr($new->describes,0,120)."..." !!}</p>
                                </div>
                            </a>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="ind-news-r1 pull-left">
            <div class="ind-news-acd">
                @foreach($salon as $sa)
                    <a href="#" class="ind-news-acd-f1 col-xs-6">
                        <img class="lazy" data-original="{{$PicPath.$sa->pic}}">
                        <div class="ind-news-acd-des">
                            <h4>{{ strlen($sa->title) > 5 ? mb_substr($sa->title,0,5).'...' : $sa->title }}</h4>
                            <span class="ind-news-acd-tag">
                            {{$sa->news_tag_one->name}}
                        </span>
                            <p>{{ mb_substr($sa->describes,0,60)."..." }}</p>
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
                                        <a href="#" class="ind-news-r2-con">
                                            <img class="lazy" data-original="{{$PicPath.$dy->pic}}">
                                            <div class="ind-news-r2-des">
                                                <h4>{{$dy->title}}</h4>
                                                <p>{{ mb_substr($dy->describes,0,60)."..." }}</p>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach

                            </ul>

                            <ul class="list-inline clearfix item">
                                @foreach($dynamic as $dy)
                                    @if($loop->index < 6 && $loop->index >2 )
                                        <li>
                                            <a href="#" class="ind-news-r2-con">
                                                <img class="lazy" data-original="{{$PicPath.$dy->pic}}">
                                                <div class="ind-news-r2-des">
                                                    <h4>{{$dy->title}}</h4>
                                                    <p>{{ mb_substr($dy->describes,0,60)."..." }}</p>
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $('.ind-news-acd-f1').hover(function () {
        $(this).find('div.ind-news-acd-des').stop().addClass('active');
    },function () {
        $(this).find('div.ind-news-acd-des').stop().removeClass('active');
    })
    $('.ind-news-r2-con').hover(function () {
        $(this).find('div.ind-news-r2-des').stop().addClass('active');
    },function () {
        $(this).find('div.ind-news-r2-des').stop().removeClass('active');
    })
</script>

<script>
    $(".ind-news-r2-prev").click(function(){
        $("#ind-news-r2").carousel('prev');
    });
    $(".ind-news-r2-next").click(function(){
        $("#ind-news-r2").carousel('next');
    });

    $('.ind-news-l1-prev').click(function () {
        $('#ind-news-l1').carousel('prev');
    })
    $('.ind-news-l1-next').click(function () {
        $('#ind-news-l1').carousel('next');
    })
</script>
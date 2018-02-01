<div class="news-cont">
    <ul class="list-inline clearfix">
        @foreach($news as $n)
        <li class="col-xs-3">
            <a href="#">
                <div class="news-img">
                    <img class="lazy" data-original="{{$PicPath.$n->pic}}">
                </div>
                <div class="news-des">
                    <p>{{mb_substr($n->describes,0,67)."..."}}</p>
                    <span>发布时间 | <i>{{$n->updated_at}}</i></span>
                    <h5>{{mb_substr($n->title,0,16)."..."}}</h5>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
    <div class="lara_fenye text-center">
        {{ $news->links()}}
    </div>
</div>

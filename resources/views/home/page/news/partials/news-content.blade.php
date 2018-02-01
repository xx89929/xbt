<div class="news-cont">
    <ul class="list-inline clearfix">
        @foreach($news as $n)
        <li class="col-xs-3">
            <a href="#">
                <div class="news-img">
                    <img class="lazy" data-original="{{$PicPath.$n->pic}}">
                </div>
                <div class="news-des">
                    <p>{{str_limit($n->describes,100)}}</p>
                    <span>发布时间 | <i>{{$n->updated_at}}</i></span>
                    <h5>{{str_limit($n->title,30)}}</h5>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
    <div class="lara_fenye text-center">
        {{ $news->links()}}
    </div>
</div>

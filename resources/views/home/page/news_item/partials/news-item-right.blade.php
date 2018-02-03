<div class="news-item-right-box col-xs-3">
    <div class="n-i-r-warp">
        <div class="news-item-title news-r-titl">
            <h4>为您推荐</h4>
        </div>
        <div class="news-rem">
            <ul class="list-unstyled">
                @foreach($news_rem as $nr)
                <li>
                    <a href="{{route('news.item',['id' => $nr->id])}}" title="{{$nr->title}}">
                        {{ str_limit($nr->title,53) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
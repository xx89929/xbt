<div class="ind-case">
    <div class="ind-tit clearfix">
        <h3>真实案例</h3>
        <a href="#">更多>></a>
    </div>
    <div class="ind-case-box">
        <ul class="list-inline clearfix">
            @foreach($case as $ca)
                <li class="col-xs-3">
                    <a href="#" class="ind-case-item">
                        <div class="ind-case-img">
                            <img class='lazy' data-original="{{$PicPath.$ca->image}}">
                        </div>
                        <div class="ind-case-des text-center">
                            <p>{{strlen($ca->name) > 10 ? mb_substr($ca->name,0,10) : $ca->name }}</p>
                            <span>{{$ca->describe}}</span>
                            <span><i>类型：{{$ca->CaseCateOne->title}}</i></span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
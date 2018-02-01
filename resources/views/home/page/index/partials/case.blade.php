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
                        <div class="ind-case-des">
                            <p >{{mb_strlen($ca->name) > 17? mb_substr($ca->name,0,17).'...' : $ca->name }}</p>
                            <p><i>{{$ca->CaseCateOne->title}}</i></p>

                            <p><span>{{strlen($ca->describe) > 35 ? mb_substr($ca->describe,0,35).'...' : $ca->describe}}</span></p>

                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
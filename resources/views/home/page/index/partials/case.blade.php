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
                            <img class='lazy' data-original="{{asset('storage/'.$ca->image)}}">
                        </div>
                        <div class="ind-case-des">
                            <p >{{ str_limit($ca->name,30)}}</p>
                            <p><i>{{$ca->CaseCateOne->title}}</i></p>

                            <p><span>{{str_limit( $ca->describe,66) }}</span></p>

                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
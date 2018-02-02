<div class="ind-circum">
    <div class="ind-tit">
        <h3>服务环境</h3>
    </div>

    <div class="ind-circum-box text-center">
        <ul class="list-inline clearfix">
            @foreach($serviceEnv as $se)
            <li class="col-xs-2">
                <img class='lazy' data-original="{{asset('storage/'.$se->pic)}}">
                <h5>{{$se->title}}</h5>
            </li>
            @endforeach
        </ul>
    </div>
</div>
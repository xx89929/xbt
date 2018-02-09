<div class="news-item-right-box col-xs-3">
    <div class="n-i-r-warp">
        <div class="news-item-title news-r-titl">
            <h4>最新案例</h4>
        </div>
        <div class="news-rem">
            <ul class="list-unstyled">
                @foreach($caseNever as $cn)
                <li>
                    <a href="{{route('case.info',['case_id' => $cn->id])}}" title="{{$cn->name}}">
                        {{ str_limit($cn->name,20) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
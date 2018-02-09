<div class="news-item-left-box col-xs-9">
    <div class="news-item-title row">
        <h3 class="col-xs-12">{{$caseInfo->name}}</h3>
    </div>
    <div class="news-item-push-tiem">
        <span>{{$caseInfo->created_at}}</span>
    </div>
    <div class="news-item-content">
        {!! $caseInfo->content !!}
    </div>

    <div class="news-item-bottom">
        <ul class="list-inline clearfix">
            <li class="col-xs-6">
                @if($caseInfo_pre)
                <a href="{{route('case.info',['case_id' => $caseInfo_pre->id])}}" class="n-i-a pull-left" title="{{$caseInfo_pre->name}}">
                    <p>上一篇：{{ str_limit($caseInfo_pre->name,25,'')}}</p>
                </a>
                @endif
            </li>
            <li class="col-xs-6">
                @if($caseInfo_next)
                <a href="{{route('case.info',['case_id' => $caseInfo_next->id])}}" class="n-i-a pull-right" title="{{$caseInfo_next->name}}">
                    <p>下一篇：{{ str_limit($caseInfo_next->name,25,'')}}</p>
                </a>
                @endif
            </li>
        </ul>
    </div>
</div>
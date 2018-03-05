<div class="consult-adt clearfix">
    <div class="ind-tit">
        <h3>专家咨询</h3>
    </div>
    <div class="ind-consult pull-left">
        <ul class="list-inline">
            @foreach($Doctor as $doc)
                <li>
                    <div class="ind-consult-f1">
                        <div class="consult-header">
                            <img class="lazy" data-original="{{asset('storage/'.$doc->avatar)}}">
                        </div>
                        <div class="consult-des text-center">
                            <p>{{$doc->doc_to_doc_group->title}}：{{$doc->realname}}</p>
                            <a target="_blank" href="http://p.qiao.baidu.com/cps/chat?siteId=11689720&userId=24928549">申请交流</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="ind-acd pull-left" style="background:url({{url('home/images/ind-adt.jpg')}})">
        <div class="ind-acd-tag text-center">
            <p>活动入口</p>
        </div>
        <div class="ind-acd-div-f1 text-center">
            @foreach($salon as $sa)
            @if($loop->first)
            <div class="ind-acd-des">
                <h5>{{ str_limit($sa->title,15)}}</h5>
                <p>{{ str_limit($sa->describes,40) }}</p>
            </div>

            <div class="ind-acd-div-a">
                <a href="{{route('news.item',['id' => $sa->id])}}">申请加入</a>
            </div>

            @endif
            @endforeach

        </div>
    </div>
</div>
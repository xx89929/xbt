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
                            <img class="lazy" data-original="{{$PicPath.$doc->avatar}}">
                        </div>
                        <div class="consult-des text-center">
                            <p>{{$doc->doc_to_doc_group->title}}：{{$doc->realname}}</p>
                            <a href="#">申请交流</a>
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
            <div class="ind-acd-des">
                @foreach($salon as $sa)
                    @if($loop->first)
                    <h5>{{ str_limit($sa->title,15)}}</h5>
                    <p>{{ str_limit($sa->describes,40) }}</p>
                    @endif
                @endforeach
            </div>
            <button>申请加入</button>

        </div>
    </div>
</div>
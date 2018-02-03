<div class="case-nav pull-left">
    <div class="case-nav-tit">
        <h4>案例分类</h4>
    </div>
    <div class="case-nav-con">
        <ul class="list-unstyled">
            @foreach($caseNav as $cn)
            @if($cn->parent_id == 0)
            <li>
                <a>
                    <div class="case-nav-row clearfix">
                        <span class="pull-left">{{$cn->title}}</span>
                        <i class="fa fa-chevron-right pull-right"></i>
                    </div>
                    <div class="case-nav-child">
                        <ul class="list-unstyled">
                            @foreach($caseNav as $p)
                            @if($p->parent_id != 0 && $p->parent_id == $cn->id)
                            <li>
                                <a href="{{route('case',['id' => $p->id])}}">
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">{{$p->title}}</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
</div>

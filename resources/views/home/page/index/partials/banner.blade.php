<div class="container">
    <div class="i-banner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach($banner as $ids)
                    @if($loop->first)
                        <li data-target="#carousel-example-generic" data-slide-to="{{$ids->order}}" class="active"></li>
                    @elseif($loop->iteration)
                        <li data-target="#carousel-example-generic" data-slide-to="{{$ids->order}}"></li>
                    @endif
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner in-banner" role="listbox">
                @foreach($banner as $ba)
                    @if($loop->first)
                <div class="item active">
                    <img class="lazy" data-original="{{ asset('storage/'.$ba->pic)}}" alt="...">
                </div>
                    @elseif($loop->iteration)
                        <div class="item">
                            <img class="lazy" data-original="{{asset('storage/'.$ba->pic)}}" alt="...">
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="classify_nav_b">
            <div class="classify_nav_ul">
                <ul class="list-unstyled">
                    @foreach($proNav as $pn)
                    <li class="clearfix">
                        <a class="pull-left">{{ $pn->title }}</a><i class="fa fa-angle-right pull-right"></i>
                        <div class="cla_item_dis">
                            <ul class="list-inline clearfix">
                                @foreach($product as $pr)
                                    @if($pr->category_id == $pn->id)
                                <li class="col-xs-6"><a href="{{route('pro-info',['id' => $pr->id ])}}"><img src="{{asset('storage/'.$pr->pics[0])}}">{{$pr->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

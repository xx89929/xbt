<div class="container">
    <div class="i-banner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner in-banner" role="listbox">
                <div class="item active">
                    <img class="lazy" data-original="{{url('home/images/banner/1.jpg')}}" alt="...">
                </div>
                <div class="item">
                    <img class="lazy" data-original="{{url('home/images/banner/2.jpg')}}" alt="...">
                </div>
                <div class="item">
                    <img class="lazy" data-original="{{url('home/images/banner/3.jpg')}}" alt="...">
                </div>
                <div class="item">
                    <img class="lazy" data-original="{{url('home/images/banner/4.jpg')}}" alt="...">
                </div>
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
                                <li class="col-xs-6"><a href="#"><img src="{{$PicPath.$pr->pics[0]}}">{{$pr->name}}</a></li>
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


<script>
    $('.classify_nav_ul > ul > li').hover(function () {
        var that = $(this)
        that.find('div.cla_item_dis').show();
    },function () {
        var that = $(this)
        that.find('div.cla_item_dis').hide();
    });

    $('#carousel-example-generic').hover(function () {
        $('.carousel-control').show();
    },function () {
        $('.carousel-control').hide();
    })
</script>
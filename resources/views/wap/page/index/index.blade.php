@extends('wap.layouts.base')
@section('content')
    <section class="ui-container container-warp">
        <section id="slider">
            <div class="demo-item">
                <div class="demo-block">
                    <div class="ui-slider index-slider-lunbo">
                        <ul class="ui-slider-content" style="width: 300%">
                            @foreach($banner as $bn)
                            <li><span style="background-image:url( {{ asset('storage/'.$bn->pic) }} )"></span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="ui-panel">
            <h2 class="ui-arrowlink">热门产品<span class="ui-panel-subtitle">更多</span></h2>
            <ul class="ui-grid-trisect">
                @foreach($hot_product as $hp)
                <li>
                    <div class="ui-border">
                        <div class="ui-grid-trisect-img qz-grid-trisect-img">
                            <span class="ui-tag-hot" style="background-image:url({{asset('storage/'.$hp->pics[0])}})"></span>
                        </div>
                        <div>
                            <h5 class="ui-nowrap ui-whitespace ui-txt-warning ui-flex ui-flex-pack-center">￥{{number_format($hp->price,2)}}</h5>
                            <h6 class="ui-nowrap ui-whitespace ui-flex ui-flex-pack-center">{{$hp->name}}</h6>
                            <h6 class="ui-nowrap ui-whitespace ui-flex ui-flex-pack-center">小仙</h6>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </section>

    </section>
@endsection

@section('jss')
    <script class="demo-script">
        (function (){
            var slider = new fz.Scroll('.ui-slider', {
                role: 'slider',
                indicator: true,
                autoplay: true,
                interval: 3000
            });

            slider.on('beforeScrollStart', function(fromIndex, toIndex) {
                console.log(fromIndex,toIndex)
            });

            slider.on('scrollEnd', function(cruPage) {
                console.log(cruPage)
            });
        })();
    </script>
    <script>
        $('.ui-list li,.ui-tiled li').click(function(){
            if($(this).data('href')){
                location.href= $(this).data('href');
            }
        });
        $('.ui-header .ui-btn').click(function(){
            location.href= 'index.html';
        });
    </script>
@endsection

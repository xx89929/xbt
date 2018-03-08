@extends('wap.layouts.base')
@section('content')
    <section class="ui-container">
        <section id="slider">
            <div class="demo-item">
                <div class="demo-block">
                    <div class="ui-slider">
                        <ul class="ui-slider-content" style="width: 300%">
                            @foreach($banner as $bn)
                            <li><span style="background-image:url( {{ asset('storage/'.$bn->pic) }} )"></span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
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

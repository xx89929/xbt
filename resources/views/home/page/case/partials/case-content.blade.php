<div class="case-content pull-left">
    <ul class="list-inline">
        @foreach($case as $ca)
        <li class="col-xs-3">
            <a href="#">
                <div class="case-con-img">
                    <img class="lazy" data-original="{{$PicPath.$ca->image}}">
                </div>
                <div class="case-con-des text-center">
                    <h5>{{str_limit($ca->name,20)}}</h5>
                    <span>{{str_limit($ca->describe,52)}}</span>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
    <div class="lara_fenye text-center">
        {{ $case->links()}}
    </div>
</div>
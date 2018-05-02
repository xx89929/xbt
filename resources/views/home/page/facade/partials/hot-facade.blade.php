<div class="hot-facade">
    <div class="hot-facade-tit">
        <h4>推荐加盟店</h4>
    </div>
    <div class="hot-facade-list">
        <ul class="list-inline clearfix">
            @foreach($hotStore as $hs)
            <li class="col-xs-2">
                <div class="hot-facade-item ">
                    <div class="hot-facade-item-img">
                        <img class="lazy" data-original="{{ asset('storage/'.$hs->store_pic) }}">
                    </div>
                    <div class="hot-facade-item-des text-center">
                        <h5>{{$hs->name}}</h5>
                        <p style="display: none;" class="store-lat">{{$hs->lat}}</p>
                        <p style="display: none;" class="store-lng">{{$hs->lng}}</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>


</div>
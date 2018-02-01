<div class="news-nav">
    <ul class="list-inline">
        <li class="active"><a href="{{route('news')}}"><h4>全部新闻</h4></a></li>
        @foreach($newTag as $nt)
        <li ><a href="{{route('news',['tag_id' => $nt->id])}}"><h4>{{$nt->name}}</h4></a></li>
        @endforeach
    </ul>
</div>
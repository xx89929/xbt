@extends('auth.layout.authbase')
@section('auth-page')
    <div class="member-addr">
        <div class="member-addr-list">
            @if (session('status'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-inline" method="post" action="{{route('memberAddr.save')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <select name="province" class="pro-select form-control" data-url="{{route('api.getCity')}}" data-next="#getCity">
                        @if(@$myAddr->province)
                            @foreach($province as $prov)
                                <option value="{{$prov->id}}"
                                @if($prov->id == $myAddr->province)
                                    selected
                                @endif
                                >{{$prov->area_name}}</option>
                            @endforeach
                        @else
                            <option value="">省</option>
                            @foreach($province as $prov)
                                <option value="{{$prov->id}}">{{$prov->area_name}}</option>
                            @endforeach
                        @endif

                    </select>
                </div>

                <div class="form-group">
                    <select  name="city" class="pro-select form-control" data-url="{{route('api.getDistrict')}}"  id="getCity" data-next="#getDistrict">
                        @if(@$myAddr->city)
                            @foreach($city as $ci)
                                @if($ci->parent_id == $myAddr->province)
                                <option value="{{$ci->id}}"
                                    @if($ci->id == $myAddr->city)
                                        selected
                                    @endif
                                >{{$ci->area_name}}</option>
                                @endif
                            @endforeach
                        @else
                            <option value="">市</option>
                        @endif

                    </select>
                </div>

                <div class="form-group">
                    <select name="district" class="pro-select form-control" id="getDistrict" data-url="{{route('api.getAreaStore')}}">
                        @if(@$myAddr->district)
                            @foreach($district as $di)
                                @if($di->parent_id == $myAddr->city)
                                    <option value="{{$di->id}}"
                                            @if($di->id == $myAddr->district)
                                            selected
                                            @endif
                                    >{{$di->area_name}}</option>
                                @endif
                            @endforeach
                        @else
                            <option value="">区</option>
                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <input name="address" type="text" class="form-control" id="exampleInputName2" placeholder="地址" value="{{@$myAddr->address}}">
                </div>
                <div class="form-group">
                    <button  type="submit" class="btn btn-default address_btn">保存</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('.pro-select').on('change select',function () {
            areaPost(this);
        });

        function areaPost(that) {
            var next_par = $(that).data('next'),
                url = $(that).data('url'),
                parent_id = $(that).val(),
                param = {
                    'q' : parent_id,
                };
            areaJajx(url,param,next_par,that);
        }
    </script>
@endsection
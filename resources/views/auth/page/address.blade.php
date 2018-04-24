@extends('auth.layout.authbase')
@section('auth-page')
    <div class="member-addr">
        <div class="member-addr-list">
            <form class="form-horizontal" method="post" action="{{route('memberAddr.save')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="consignee" class="col-sm-2 control-label">收货人</label>
                    <div class="col-sm-10">
                        <input type="text" name="consignee" class="form-control" id="consignee" placeholder="请填写收货人姓名" value="{{@$myAddr->consignee}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-xs-2 control-label">手机号</label>
                    <div class="col-xs-10">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="请填写手机号" value="{{@$myAddr->phone}}">
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label class="col-xs-2 control-label">省</label>--}}
                    {{--<div class="col-xs-10">--}}
                        {{--<select name="province" class="pro-select form-control" data-url="{{route('api.getCity')}}" data-next="#getCity">--}}
                            {{--@if(@$myAddr->province)--}}
                                {{--@foreach($province as $prov)--}}
                                    {{--<option value="{{$prov->id}}"--}}
                                    {{--@if($prov->id == $myAddr->province)--}}
                                        {{--selected--}}
                                    {{--@endif--}}
                                    {{-->{{$prov->area_name}}</option>--}}
                                {{--@endforeach--}}
                            {{--@else--}}
                                {{--<option value="">省</option>--}}
                                {{--@foreach($province as $prov)--}}
                                    {{--<option value="{{$prov->id}}">{{$prov->area_name}}</option>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label class="col-xs-2 control-label">市</label>--}}
                    {{--<div class="col-xs-10">--}}
                        {{--<select  name="city" class="pro-select form-control" data-url="{{route('api.getDistrict')}}"  id="getCity" data-next="#getDistrict">--}}
                            {{--@if(@$myAddr->city)--}}
                                {{--@foreach($city as $ci)--}}
                                    {{--@if($ci->parent_id == $myAddr->province)--}}
                                    {{--<option value="{{$ci->id}}"--}}
                                        {{--@if($ci->id == $myAddr->city)--}}
                                            {{--selected--}}
                                        {{--@endif--}}
                                    {{-->{{$ci->area_name}}</option>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--@else--}}
                                {{--<option value="">市</option>--}}
                            {{--@endif--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label class="col-xs-2 control-label">区</label>--}}
                    {{--<div class="col-xs-10">--}}
                        {{--<select name="district" class="pro-select form-control" id="getDistrict" data-url="{{route('api.getAreaStore')}}">--}}
                            {{--@if(@$myAddr->district)--}}
                                {{--@foreach($district as $di)--}}
                                    {{--@if($di->parent_id == $myAddr->city)--}}
                                        {{--<option value="{{$di->id}}"--}}
                                                {{--@if($di->id == $myAddr->district)--}}
                                                {{--selected--}}
                                                {{--@endif--}}
                                        {{-->{{$di->area_name}}</option>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--@else--}}
                                {{--<option value="">区</option>--}}
                            {{--@endif--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label class="col-xs-2 control-label">收货地址</label>
                    <div class="col-xs-10">
                        <input name="address" type="text" class="form-control" id="exampleInputName2" placeholder="地址" value="{{@$myAddr->address}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default address_btn">保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
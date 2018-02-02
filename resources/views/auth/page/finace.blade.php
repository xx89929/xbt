@extends('auth.layout.authbase')
@section('auth-page')
    <div class="member-finace">
        <div class="member-finace-h text-center">
            <img class="img-circle center-block" src="{{url('home/images/headpic.jpg')}}">
            <h4>{{Auth::user()->username}}</h4>
            <p>普通会员</p>
        </div>
        <div class="member-finace-c">
            <ul class="list-inline clearfix">
                <li class="col-xs-4 text-center">
                    <h4>￥{{number_format(Auth::user()->member_info_one->goods,2)}}元</h4>
                    <p>账号余额</p>
                </li>
                <li class="col-xs-4 text-center">
                    <h4>{{$nonPay}}</h4>
                    <p>待支付</p>
                </li>
                <li class="col-xs-4 text-center">
                    <h4>{{$orderNon}}</h4>
                    <p>未出货</p>
                </li>
            </ul>
        </div>

        <div class="member-finace-detail">
            <div class="member-finace-detail-tit">
                <h4>资金明细</h4>
            </div>
            <div class="member-finace-detail-table">
                <table class="table table-hover">
                    <thead>
                        <th>金额</th>
                        <th>操作</th>
                        <th>时间</th>
                        <th>备注</th>
                    </thead>
                    <tbody>
                    @foreach($payList as $py)
                        <tr>
                            <td>{{$py->goods}}</td>
                            <td style="color:{{$py->pay_log_options->color}}">{{$py->pay_log_options->title}}</td>
                            <td>{{$py->created_at}}</td>
                            <td>{{$py->remark}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
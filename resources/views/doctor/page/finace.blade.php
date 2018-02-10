@extends('doctor.layout.authbase')
@section('auth-page')
    <div class="member-finace">
        <div class="member-finace-h text-center">
            <img class="img-circle center-block" src="{{url('home/images/headpic.jpg')}}">
            <h4>{{Auth::guard('doctor')->user()->realname}}</h4>
            <p>医师</p>
        </div>
        <div class="member-finace-c">
            <ul class="list-inline clearfix">
                <li class="col-xs-6 text-center">
                    <h4>￥{{number_format(Auth::guard('doctor')->user()->goods,2)}}元</h4>
                    <p>账号余额</p>
                </li>
                <li class="col-xs-6 text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="doctor_cash_apply">
                        申请提现
                    </button>
                    <p><strong style="color: red;">注意：</strong>提现功能目前测试阶段！</p>
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
                            <td style="color:{{$py->docpay_payset->color}}">{{$py->docpay_payset->title}}</td>
                            <td>{{$py->created_at}}</td>
                            <td>{{$py->remark}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$payList->links()}}
            </div>
        </div>
    </div>
    @include('doctor.page.apply_cash')
@endsection
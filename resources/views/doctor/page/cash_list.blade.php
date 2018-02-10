@extends('doctor.layout.authbase')
@section('auth-page')
    <div class="member-finace">
        <div class="member-finace-detail">
            <div class="member-finace-detail-tit">
                <h4>提现记录</h4>
            </div>
            <div class="member-finace-detail-table">
                <table class="table table-hover">
                    <thead>
                    <th>金额</th>
                    <th>操作</th>
                    <th>是否转账</th>
                    <th>申请时间</th>
                    </thead>
                    <tbody>
                    @foreach($cashList as $cl)
                        <tr>
                            <td>{{number_format($cl->goods,2)}}</td>
                            <td>提现</td>
                            @if($cl->is_cash == 1)
                            <td style="color: #247a1b">已转账</td>
                            @else
                            <td style="color: red">未转账</td>
                            @endif
                            <td>{{$cl->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$cashList->links()}}
            </div>
        </div>
    </div>
    @include('doctor.page.apply_cash')
@endsection
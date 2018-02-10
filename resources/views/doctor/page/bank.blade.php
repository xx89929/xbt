@extends('doctor.layout.authbase')
@section('auth-page')
    <div class="member-addr">
        <div class="member-addr-list">
            <form class="form-horizontal" method="post" action="{{route('doc.bind.bank')}}">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-xs-2 control-label">选择银行</label>
                    <div class="col-xs-10">
                        <select name="bank_type" class="form-control" @if($docInfo->bank_type)disabled @endif>
                            @foreach($bankOp as $k => $l)
                                <option value="{{$k}}" @if($docInfo->bank_type == $k) selected @endif>{{$l}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="consignee" class="col-sm-2 control-label">开户支行</label>
                    <div class="col-sm-10">
                        <input type="text" name="bank_branch" class="form-control" placeholder="开户支行" @if($docInfo->bank_branch)value="{{$docInfo->bank_branch}}"disabled @endif>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-xs-2 control-label">银行卡号</label>
                    <div class="col-xs-10">
                        <input type="text" name="bank_code" class="form-control" placeholder="银行卡号"  @if($docInfo->bank_code)value="{{$docInfo->bank_code}}" disabled @endif>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default address_btn" @if($docInfo->bank_code) disabled @endif>保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


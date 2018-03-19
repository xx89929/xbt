@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="card demo-card-header-pic">

                <div class="card-content">
                    <div class="card-content-inner">
                        <h3 class="card-title">{{$caseInfo->name}}</h3>
                        <p class="color-gray">发表于 {{$caseInfo->created_at}}</p>
                        <p class="card-title">{!! $caseInfo->content !!}</p>
                    </div>
                </div>
                <div class="card-footer">
                    @if($caseInfo_pre)
                    <a href="{{route('case.info',['case_id' => $caseInfo_pre->id ])}}" class="link">上一个案例：{{str_limit($caseInfo_pre->name,8)}}</a>
                    @endif

                    @if($caseInfo_next)
                    <a href="{{route('case.info',['case_id' => $caseInfo_next->id])}}" class="link">下一个案例：{{str_limit($caseInfo_next->name,8)}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('left-panel')

@endsection

@section('jss')

@endsection

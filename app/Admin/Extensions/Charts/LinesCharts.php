<?php
namespace App\Admin\Extensions\Charts;


use App\Models\Doctor;
use App\Models\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class  LinesCharts{

    public static function MemberRegCharts(){
        $dt = Carbon::now();

        $range = $dt->subDays(30)->toDateTimeString();

        $list['data'] = User::where('created_at', '>=', $range)
            ->groupBy('date')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ])->toArray();
        $list['conf']['id'] = 'memberChartsId';
        $list['conf']['subTitle'] = '会员注册(位)';
        $list['conf']['bGC'] = '#3c8dbc';
        $list['conf']['bC'] = '#106da3';
        $list['conf']['title'] = '30天内会员注册统计';
        $list['conf']['xAxes'] = '日期';
        $list['conf']['yAxes'] = '注册量';

        return view('admin.charts.lineCharts',['list' => $list]);
    }


    public static function DocRegCharts(){
        $dt = Carbon::now();

        $range = $dt->subDays(30)->toDateTimeString();

        $list['data'] = Doctor::where('created_at', '>=', $range)
            ->groupBy('date')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ])->toArray();
        $list['conf']['id'] = 'DocChartsId';
        $list['conf']['subTitle'] = '医生注册(位)';
        $list['conf']['bGC'] = '#bc3c89';
        $list['conf']['bC'] = '#bc3c89';
        $list['conf']['title'] = '30天内医生注册统计';
        $list['conf']['xAxes'] = '日期';
        $list['conf']['yAxes'] = '注册量';

        return view('admin.charts.lineCharts',['list' => $list]);
    }


    public static function OrderCharts(){
        $dt = Carbon::now();

        $range = $dt->subDays(30)->toDateTimeString();

        $list['data'] = Order::where('created_at', '>=', $range)
            ->groupBy('date')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ])->toArray();
        $list['conf']['id'] = 'OrderChartsId';
        $list['conf']['subTitle'] = '订单量(笔)';
        $list['conf']['bGC'] = '#a37229';
        $list['conf']['bC'] = '#a37229';
        $list['conf']['title'] = '30天内生成订单统计';
        $list['conf']['xAxes'] = '日期';
        $list['conf']['yAxes'] = '订单量';

        return view('admin.charts.lineCharts',['list' => $list]);
    }


    public static function OrderSuccessCharts(){
        $dt = Carbon::now();

        $range = $dt->subDays(30)->toDateTimeString();

        $list['data'] = Order::where([
            ['created_at', '>=', $range],
            ['pay_status', '=', 1],
        ])
            ->groupBy('date')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ])->toArray();
        $list['conf']['id'] = 'OrderSuccessChartsId';
        $list['conf']['subTitle'] = '付款量(笔)';
        $list['conf']['bGC'] = 'green';
        $list['conf']['bC'] = 'green';
        $list['conf']['title'] = '30天内已付款订单统计';
        $list['conf']['xAxes'] = '日期';
        $list['conf']['yAxes'] = '付款量';

        return view('admin.charts.lineCharts',['list' => $list]);
    }

    public static function OrderRefundCharts(){
        $dt = Carbon::now();

        $range = $dt->subDays(30)->toDateTimeString();

        $list['data'] = Order::where([
            ['created_at', '>=', $range],
            ['refund', '=', 1],
        ])
            ->groupBy('date')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ])->toArray();
        $list['conf']['id'] = 'OrderRefundChartsId';
        $list['conf']['subTitle'] = '退款量(笔)';
        $list['conf']['bGC'] = '#d6301f';
        $list['conf']['bC'] = '#d6301f';
        $list['conf']['title'] = '30天内退款订单统计';
        $list['conf']['xAxes'] = '日期';
        $list['conf']['yAxes'] = '退款量';

        return view('admin.charts.lineCharts',['list' => $list]);
    }
}
<?php
namespace App\Admin\Extensions\Charts;


use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class  LinesCharts{

    public static function MemberRegCharts(){
        $dt = Carbon::now();

        $range = $dt->subDays(60)->toDateTimeString();

        $list = User::where('created_at', '>=', $range)
            ->groupBy('date')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ])->toArray();
//        dd($list);exit;
//        $res = array();
//        foreach ($list as $k => $l){
//            $res['date'][$k] = $l['date'];
//            $res['value'][$k] = $l['value'];
//        }
//        dd($res['date']);
        return view('admin.charts.memberReg',['member_list' => $list]);
    }
}
<?php
namespace App\Admin\Extensions\Charts;


use App\Models\News;
use App\Models\NewsTage;
use Illuminate\Support\Facades\DB;

class  PieCharts{


    public static function newsCharts(){
        $list['data'] = News::groupBy('tag')
            ->orderBy('tag')
            ->get([
            DB::Raw('tag as tag'),
            DB::Raw('COUNT(*) as value'),
        ]);

        $list['conf']['id'] = 'newsChartsId';
        $list['conf']['title'] = '新闻发布统计';

        $list['category'] = NewsTage::orderBy('id')->get();

        return view('admin.charts.pieCharts',['list' => $list]);
    }
}
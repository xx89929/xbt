<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Charts\LinesCharts;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Tab;


class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Dashboard');
            $content->description('Description...');

            $content->row(Dashboard::title());


            $content->row(function (Row $row) {
                $row->column(4, function (Column $column) {
                    $tab = new Tab();
                    $tab->add('会员注册统计', LinesCharts::MemberRegCharts());
                    $tab->add('医生注册统计', LinesCharts::DocRegCharts());
                    $column->append($tab);
                });

                $row->column(4, function (Column $column) {
                    $tab = new Tab();
                    $tab->add('生成订单统计', LinesCharts::OrderCharts());
                    $tab->add('已付款订单统计', LinesCharts::OrderSuccessCharts());
                    $tab->add('退款订单统计', LinesCharts::OrderRefundCharts());
                    $column->append($tab);
                });
            });

            $content->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
        });
    }
}

<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Charts\LinesCharts;
use App\Admin\Extensions\Charts\PieCharts;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\User;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Tab;


class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('首页');
            $content->description('仪表盘');

            $content->row(Dashboard::title());

            $content->row(function (Row $row) {
                $row->column(4, function (Column $column) {
                    $userCount = User::count();
                    $infoBox = new InfoBox('会员统计(位)', 'users', 'aqua', '/admin/member/manage', $userCount);
                    $column->append($infoBox);
                });

                $row->column(4, function (Column $column) {
                    $orderCount = Order::count();
                    $infoBox = new InfoBox('订单统计(笔)', 'shopping-cart', 'green', '/admin/order/list', $orderCount);
                    $column->append($infoBox);
                });

                $row->column(4, function (Column $column) {
                    $moneyCount = Order::where('pay_status','=',1)->sum('order_money');
                    dd($moneyCount);
                    $infoBox = new InfoBox('交易金额(元)', 'rmb', 'red', '/admin/order/list', number_format($moneyCount,2));
                    $column->append($infoBox);
                });

            });

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

                $row->column(4, function (Column $column) {
                    $collapse = new Collapse();
                    $collapse->add('新闻发布统计', PieCharts::newsCharts());
                    $column->append($collapse);
                });
            });




//            $content->row(function (Row $row) {
//
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::environment());
//                });
//
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::extensions());
//                });
//
//                $row->column(4, function (Column $column) {
//                    $column->append(Dashboard::dependencies());
//                });
//            });
        });
    }
}

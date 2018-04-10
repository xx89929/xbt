<?php

namespace App\Admin\Controllers;

use App\Models\Order;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RefundOrderController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('申请退款');
            $content->description('列表');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('申请退款');
            $content->description('编辑');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('申请退款');
            $content->description('创建');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Order::class, function (Grid $grid) {
            $grid->model()->where('refund','1')->orWhere('refund','2')->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->order_id('订单号');
            $grid->trade_id('交易号');
            $grid->relevancy_order_pro()->name('产品名称');
            $refund = [
                'on'  => ['value' => 1, 'text' => '退款中', 'color' => 'primary'],
                'off' => ['value' => 2, 'text' => '已退款', 'color' => 'default'],
            ];
            $grid->refund('退款')->switch($refund);
            $grid->order_status('订单状态')->switch([
                'on'  => ['value' => 1, 'text' => '交易中', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '订单关闭', 'color' => 'danger'],
            ]);
            $grid->refund_at('退款时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Order::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->switch('order_status','订单状态')->states([
                'on'  => ['value' => 1, 'text' => '交易中', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '订单关闭', 'color' => 'danger'],
            ]);
            $form->switch('refund','订单状态')->states([
                'on'  => ['value' => 1, 'text' => '退款中', 'color' => 'primary'],
                'off' => ['value' => 2, 'text' => '已退款', 'color' => 'default'],
            ]);

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}

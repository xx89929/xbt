<?php

namespace App\Admin\Controllers;

use App\Models\MemberInfo;
use App\Models\Order;

use App\Models\Product;
use App\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class OrderController extends Controller
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

            $content->header('订单管理');
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

            $content->header('订单管理');
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

            $content->header('订单管理');
            $content->description('录入');

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

            $grid->id('ID')->sortable();
            $grid->order_id('订单ID')->sortable();
            $grid->logist_id('物流ID')->sortable();
            $grid->relevancy_order_pro()->name('产品名称');
            $grid->relevancy_order_user()->username('会员账号');
            $grid->pro_nub('购买数量');
            $grid->order_money('交易金额');
            $grid->deal_status('交易状态')->switch([
                'on'  => ['value' => 1, 'text' => '已出货', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '未出货', 'color' => 'danger'],
            ]);
            $grid->order_status('订单状态')->switch([
                'on'  => ['value' => 1, 'text' => '交易成功', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '订单关闭', 'color' => 'danger'],
            ]);
            $grid->created_at('下单时间');
            $grid->updated_at('更新时间');
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
            $form->text('order_id', '订单ID');
            $form->text('logist_id', '物流ID');
            $form->select('pro_id', '产品信息')->options(function(){
                return Product::all()->pluck('name','id');
            });
            $form->select('member_id', '购买会员')->options(function(){
                return User::all()->pluck('username','id');
            });
            $form->number('pro_nub', '购买数量');
            $form->switch('deal_status', '交易状态')->states([
                'on'  => ['value' => 1, 'text' => '已出货', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '未出货', 'color' => 'danger'],
            ]);
            $form->switch('order_status', '订单状态')->states([
                'on'  => ['value' => 1, 'text' => '交易成功', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '订单关闭', 'color' => 'danger'],
            ]);

            $form->currency('order_money', '订单总额')->symbol('￥');

            $form->display('created_at', '下单时间');
            $form->display('updated_at', '更新时间');
        });
    }
}

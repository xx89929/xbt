<?php

namespace App\Admin\Controllers;

use App\Models\Area;
use App\Models\MemberInfo;
use App\Models\MemberOrAddr;
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
            $grid->relevancy_order_user()->username('购买会员');
            $grid->member_id('收货信息')->display(function ($id){
                $mem_addr = MemberOrAddr::userID($id)->first();
                $province = Area::getId($mem_addr->province)->select('area_name')->first();
                $city = Area::getId($mem_addr->city)->select('area_name')->first();
                $district = Area::getId($mem_addr->district)->select('area_name')->first();
                return "<span class='label label-primary'>$province->area_name</span>
                        <span class='label label-primary'>$city->area_name</span>
                        <span class='label label-primary'>$district->area_name</span>
                        <span class='label label-primary'>$mem_addr->address</span>
                        <span class='label label-primary'>$mem_addr->phone</span>
                        ";
            });
            $grid->rele_order_store()->name('店铺');
            $grid->rele_order_doctor()->realname('医生');
            $grid->pro_nub('购买数量');
            $grid->order_money('交易金额');
            $grid->pay_status('是否支付')->switch([
                'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
            ]);
            $grid->deal_status('交易状态')->switch([
                'on'  => ['value' => 1, 'text' => '已经出货', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '还未出货', 'color' => 'danger'],
            ]);
            $grid->order_status('订单状态')->switch([
                'on'  => ['value' => 1, 'text' => '交易成功', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '订单关闭', 'color' => 'danger'],
            ]);
            $grid->created_at('下单时间');

            $grid->filter(function($filter){

                // 在这里添加字段过滤器
                $filter->like('order_id', '订单号');
                $filter->like('relevancy_order_pro.name', '产品名称');
                $filter->like('relevancy_order_pro.name', '产品名称');
                $filter->between('order_money', '交易金额');
                $filter->equal('deal_status','交易状态')->select(['0' => '未出货','1' => '已出货']);
                $filter->equal('order_status','订单状态')->select(['0' => '关闭','1' => '成功']);
                $filter->equal('pay_status','支付状态')->select(['0' => '未支付','1' => '已支付']);
                $filter->between('created_at', '下单时间')->datetime();
            });
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
                'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
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

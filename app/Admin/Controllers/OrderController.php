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
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\Table;

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
            $grid->paginate(10);
            $grid->model()->orderBy('id','desc');
            $grid->id('ID')->sortable();
            $grid->order_id('订单ID')->sortable();
            $grid->logist_id('物流ID')->sortable();
            $grid->relevancy_order_pro()->name('产品名称');
            $grid->relevancy_order_user()->username('购买会员');


//            $states = [
//                'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
//                'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
//            ];
//            $grid->column('pay_status')->switchGroup([
//                'pay_status' => '是否支付',
//                'deal_status' => '交易状态',
//                'order_status' => '订单状态',
//            ],$states);

            $grid->column('order_info','订单详情')->expand(function (){
                switch ($this->pay_way){
                    case 'aliPay':
                        $this->pay_way = '支付宝';
                        break;
                    case 'wePay':
                        $this->pay_way = '微信';
                        break;
                    default:
                        $this->pay_way = '没有支付方式';
                        break;
                };
                $headers = [
                    '收货人姓名',
                    '收货人电话',
                    '收货人地址',
                    '会员账号',
                    '购买数量',
                    '总金额',
                    '付款方式',
                ];
                $order_info = [
                    '会员账号' => $this->relevancy_order_user['username'],
                    '付款方式' => $this->pay_way,
                    '购买数量' => $this->pro_nub,
                    '总金额' => $this->order_money,
                    '医生姓名' => $this->rele_order_doctor['realname'],
                    '店铺' => $this->rele_order_store['name'],
                    '收货人姓名' => $this->take_name,
                    '收货人电话' => $this->take_phone,
                    '收货人地址' => $this->take_address,
                    '付款时间' => $this->pay_at,
                ];
               $table =  new Table([],$order_info);
               return $table->render();
            },'订单详情');


            $grid->pay_status('付款状态')->display(function ($pay_status){
                return $pay_status ? "<span style='color:green'>已付款</span>" : "<span style='color:red'>待付款</span>";
            });

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

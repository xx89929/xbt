<?php

namespace App\Admin\Controllers;

use App\Models\DocPay;

use App\Models\Doctor;
use App\Models\PayLogOptions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class DocPayController extends Controller
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

            $content->header('医生账户明细');
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

            $content->header('医生账户明细');
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

            $content->header('医生账户明细');
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
        return Admin::grid(DocPay::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->to_doctor()->realname('医生姓名');
            $grid->goods('交易金额');
            $grid->operation('收入/消费')->display(function ($id){
                $oper = PayLogOptions::where('id',$id)->first();
                return "<span style='color:$oper->color'>$oper->title</span>";
            });
            $grid->remark('交易说明/备注');

            $grid->created_at('交易日期');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(DocPay::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('doctor_id', '医生')->options(function(){
                return Doctor::all()->pluck('realname','id');
            });
            $form->currency('goods','账户余额')->symbol('￥');
            $form->radio('operation','收入/消费')->options(PayLogOptions::all()->pluck('title','id'))->default(1);
            $form->text('remark', '交易备注');

            $form->display('created_at', '交易日期');
        });
    }
}

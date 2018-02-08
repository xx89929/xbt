<?php

namespace App\Admin\Controllers;

use App\Models\Bank;
use App\Models\DocCash;

use App\Models\Doctor;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class DocCashController extends Controller
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

            $content->header('申请提现');
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

            $content->header('申请提现');
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

            $content->header('申请提现');
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
        return Admin::grid(DocCash::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->cash_doctor()->realname('医生姓名');
            $grid->goods('提现金额');
            $grid->cash_bank()->bank_name('提现金额');
            $grid->bank_branch('开户支行');
            $grid->bank_code('银行卡号');

            $states = [
                'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
            ];
            $grid->is_cash('是否完成转账')->switch($states);

            $grid->created_at('申请时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(DocCash::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('dortor_id', '医生')->options(function(){
                return Doctor::all()->pluck('realname','id');
            });
            $form->select('bank_type','银行类型')->options(function(){
                return Bank::all()->pluck('bank_name','bank_id');
            });
            $form->text('bank_branch','开户支行');
            $form->text('bank_code','银行卡号');
            $form->currency('goods','提现金额')->symbol('￥');
            $form->switch('is_cash','是否打款')->states([
                'on'  => ['value' => 1, 'text' => '已打款', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '未打款', 'color' => 'danger'],
            ]);

            $form->display('created_at', '申请时间');
            $form->display('updated_at', '审核时间');
        });
    }
}

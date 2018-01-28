<?php

namespace App\Admin\Controllers;

use App\Models\PayLog;

use App\Models\PayLogOptions;
use App\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PayLogController extends Controller
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

            $content->header('账号明细');
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

            $content->header('账号明细');
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

            $content->header('账号明细');
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
        return Admin::grid(PayLog::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->play_log_user()->username('会员账号');
            $grid->goods('交易金额');
            $grid->operation('收入/消费')->display(function ($id){
                $options = PayLogOptions::where('id',$id)->first();
                return "<span style='color:$options->color'>$options->title</span>";
            });
            $grid->remark('备注/说明');
            $grid->created_at('交易时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(PayLog::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('member_id', '会员账号')->options(function(){
                return User::all()->pluck('username','id');
            });
            $form->currency('goods', '交易金额')->symbol('￥');
            $form->radio('operation', '收入/消费')->options(PayLogOptions::all()->pluck('title','id'))->default(1);
            $form->text('remark', '备注/说明');

            $form->display('created_at', 'Created At');
        });
    }
}

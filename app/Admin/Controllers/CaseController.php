<?php

namespace App\Admin\Controllers;

use App\Models\CaseCategory;
use App\Models\CaseXb;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CaseController extends Controller
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

            $content->header('案例');
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

            $content->header('案例');
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

            $content->header('案例');
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
        return Admin::grid(CaseXb::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('案例名称')->limit(30);
            $grid->describe('案例描述')->limit(30);
            $grid->CaseCateOne()->title('案例分类');
            $grid->image('案例图片')->image('',50,50);
            $grid->created_at('创建时间');
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
        return Admin::form(CaseXb::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','案例名称');
            $form->text('describe','案例描述');
            $form->image('image','上传图片')->uniqueName()->resize(280,240);
            $form->select('category','案例分类')->options(CaseCategory::selectOptions());
            $form->editor('content','案例内容');
        });
    }
}

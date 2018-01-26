<?php

namespace App\Admin\Controllers;

use App\Models\NewsTage;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class NewsTageController extends Controller
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

            $content->header('新闻标签');
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

            $content->header('新闻标签');
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

            $content->header('新闻标签');
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
        return Admin::grid(NewsTage::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('标签名称');
            $grid->color('标签颜色')->display(function ($color){
                return "<span class='label' style='background-color: $color;color:white'>颜色</span>";
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
        return Admin::form(NewsTage::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '标签名称');
            $form->color('color', '标签颜色');
        });
    }
}

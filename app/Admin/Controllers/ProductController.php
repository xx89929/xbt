<?php

namespace App\Admin\Controllers;

use App\Models\ProCategory;
use App\Models\Product;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProductController extends Controller
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

            $content->header('产品管理');
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

            $content->header('产品管理');
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

            $content->header('产品管理');
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
        return Admin::grid(Product::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->pics('产品图片')->image('', 100, 100);
            $grid->name('产品名称');
            $grid->price('产品价格');
            $grid->description('产品描述');
            $grid->specification('规格');
            $grid->inventory('库存');
            $grid->pro_category_one()->title('产品分类');

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
        return Admin::form(Product::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '产品名称');
            $form->text('description', '产品描述');
            $form->currency('price', '产品价格')->symbol('￥');

            $form->select('category_id', '产品分类')->options(function(){
                return ProCategory::all()->pluck('title','id');
            });
            $form->text('specification','产品规格');
            $form->number('inventory', '库存');
            $form->multipleImage('pics', '产品图片')->removable()->uniqueName()->resize(520,400);
            $form->editor('pro_info', '详细信息');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}

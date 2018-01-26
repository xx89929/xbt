<?php

namespace App\Admin\Controllers;

use App\Models\Area;
use App\Models\MemberInfo;
use App\Models\Store;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Tests\Models\User;

class StoreController extends Controller
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

            $content->header('店铺管理');
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

            $content->header('店铺管理');
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

            $content->header('店铺管理');
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
        return Admin::grid(Store::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('店铺名称');
            $grid->store_pic('店铺图片')->image('',50,50);

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
        return Admin::form(Store::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->image('store_pic','店铺图片');
            $form->text('name','店铺名称');
            $form->multipleSelect('doctor','医师')->options(function(){
                return MemberInfo::all()->where('type',2)->pluck('nickname','member_id');
            });

            $form->select('province','省')->options(
                Area::province()->pluck('area_name', 'id')
            )
                ->load('city', '/getCity');
            $form->select('city','市')->options(function ($id) {
                return Area::options($id);
            })->load('district', '/getDistrict');
            $form->select('district','区')->options(function ($id) {
                return Area::options($id);
            });
            $form->text('address','详细地址');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}

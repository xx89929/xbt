<?php

namespace App\Admin\Controllers;


use App\Models\Area;
use App\Models\MemberType;
use App\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MemberController extends Controller
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

            $content->header('会员管理');
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

            $content->header('会员管理');
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

            $content->header('会员管理');
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
        return Admin::grid(User::class, function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->id('ID')->sortable();
            $grid->username('账号');
            $grid->member_info_one()->nickname('昵称');
            $grid->member_info_one()->head_pic('头像')->image('',50,50);
            $grid->column('member_info_one.type','会员类型')->display(function ($type){
                $memberTye = MemberType::where('id',$type)->select('title','color')->first();
                
            });
            $grid->member_info_one()->phone('手机号');
            $grid->member_info_one()->goods('金额');


            $grid->created_at('创建时间')->sortable();
            $grid->updated_at('更新时间')->sortable();

            $grid->filter(function($filter){
                $filter->equal('username', '账号');
                $filter->like('member_info_one.nickname', '昵称');
                $filter->equal('member_info_one.type','会员类型')->select(function(){
                    return MemberType::all()->pluck('title','id');
                });

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
        return Admin::form(User::class, function (Form $form) {
            $form->tab('基本信息',function (Form $form){
                $form->display('id', 'ID');
                $form->display('member_info_one.goods', '金额');
                $form->image('member_info_one.head_pic','头像');
                $form->text('username', '账号');
                $form->text('member_info_one.nickname', '昵称');
                $form->select('member_info_one.type', '会员类型')->options(function(){
                    return MemberType::all()->pluck('title','id');
                });
                $form->mobile('member_info_one.phone', '手机号');
                $form->display('created_at', '创建时间');
                $form->display('updated_at', '更新时间');
            })->tab('安全信息',function (Form $form){
                $form->password('password','密码')->rules('confirmed',[
                    'confirmed' => '必须与确认密码一直',
                ]);
                $form->password('password_confirmation','确认密码');
                $form->text('member_info_one.email','邮箱');
            })->tab('收货地址',function (Form $form){

                $form->select('order_address.province','省')->options(
                    Area::province()->pluck('area_name', 'id')
                )
                    ->load('order_address.city', '/getCity');
                $form->select('order_address.city','市')->options(function ($id) {
                    return Area::options($id);
                })->load('order_address.district', '/getDistrict');
                $form->select('order_address.district','区')->options(function ($id) {
                    return Area::options($id);
                });
                $form->text('order_address.address','详细地址');
            });


            $form->ignore(['password_confirmation']);
            $form->saving(function (Form $form) {
                if ($form->password != $form->model()->password) {
                    $form->password = bcrypt($form->password);
                }
            });
        });


    }
}

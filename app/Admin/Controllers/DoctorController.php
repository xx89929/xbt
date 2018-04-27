<?php

namespace App\Admin\Controllers;

use App\Models\Bank;
use App\Models\DocGroup;
use App\Models\Doctor;

use App\Models\Store;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class DoctorController extends Controller
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

            $content->header('医生管理');
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

            $content->header('医生管理');
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

            $content->header('医生管理');
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
        return Admin::grid(Doctor::class, function (Grid $grid) {
            if (Admin::user()->isRole('agency')){
                $doctorIds = array();
                $doctor = Administrator::find(Admin::user()->id)->agencyStoreDoc;
                foreach ($doctor as $k => $v){
                    $doctorIds[$k] = $v->id;
                }
                $grid->model()->whereIn('id',$doctorIds);
            }
            $grid->id('ID')->sortable();
            $grid->avatar('头像')->image('',50,50);
            $grid->account('账号');
            $grid->realname('真实姓名');
            $grid->goods('账户余额');
            $grid->doc_to_doc_group()->title('医生分组');
            $grid->is_check('是否审核')->switch([
                'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
            ]);

            $grid->doc_to_store()->name('归属店铺');

            $grid->created_at('注册时间');
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
        return Admin::form(Doctor::class, function (Form $form) {

            $form->tab('基本信息',function (Form $form){
                $form->display('id', 'ID');
                $form->text('account', '账号');
                $form->image('avatar', '头像')->uniqueName()->resize(200,200);
                $form->text('realname', '真实姓名');
                $form->currency('goods', '账户余额')->symbol('￥');
                $form->select('doc_group','医生分组')->options(function(){
                    return DocGroup::all()->pluck('title','id');
                });

                $form->select('be_store','归属店铺')->options(function(){
                    return Store::all()->pluck('name','id');
                });

                $form->switch('is_check','是否审核')->states([
                    'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
                    'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
                ]);
                $form->password('password','密码')->rules('confirmed',[
                    'confirmed' => '必须与确认密码一直',
                ]);
                $form->password('password_confirmation','确认密码');



                $form->display('created_at', '注册时间');
                $form->display('updated_at', '更新时间');
            })->tab('银行信息',function(Form $form){
                $form->select('bank_type','银行类型')->options(function(){
                    return Bank::all()->pluck('bank_name','bank_id');
                });
                $form->text('bank_branch','开户支行');
                $form->text('bank_code','银行卡号');
            });


            $form->ignore(['password_confirmation']);
            $form->saving(function (Form $form) {
                if ($form->password != null) {
                    $form->password = bcrypt($form->password);
                }else{
                    $form->password = $form->model()->password;
                }
            });
        });
    }
}

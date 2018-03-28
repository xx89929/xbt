<?php

namespace App\Admin\Controllers;

use App\Models\Area;
use App\Models\Doctor;
use App\Models\Store;

use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use GuzzleHttp\Client;
use Illuminate\Support\MessageBag;

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
            if(Admin::user()->isRole('agency')){
                $grid->model()->where('agency',Admin::user()->id);
            }
            $grid->id('ID')->sortable();
            $grid->name('店铺名称');
            if (Admin::user()->isAdministrator()){
                $grid->agency('代理商')->display(function ($agency){
                    $an = Administrator::where('id',$agency)->first();
                    return $an['name'] ? $an['name'] : '';
                });
            }
            $grid->store_pic('店铺图片')->image('',50,50);
            $grid->store_doctor('拥有医生')->pluck('realname')->map(function($name){
                return "<span class='label label-success'>$name</span>";
            })->implode(' ');
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
            $form->image('store_pic','店铺图片')->uniqueName()->resize(198,133);
            $form->text('name','店铺名称');

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
            $form->display('lng','经度');
            $form->display('lat','维度');

            if(Admin::user()->isAdministrator()){
                $form->select('agency','代理')->options(function(){
                    return Administrator::pluck('name','id');
                });
            }

            if (Admin::user()->isRole('agency')){
                $form->hidden('agency','代理')->default(Admin::user()->id);
            }

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');


            $form->saving(function (Form $form){
                $province = Area::getId($form->province)->first();
                $city = Area::getId($form->city)->first();
                $district = Area::getId($form->district)->first();
                $address = $form->address;
                $client = new Client();
                $response = $client->get("http://api.map.baidu.com/geocoder/v2/?address=".$city->area_name.$address."&output=json&ak=GoRUSig6Ieb9CNnShGAkrHnVo46HK6dG");
                $body = json_decode($response->getBody(),true);
                if($body['status'] == 0 && $body['result']['precise'] > 0){
                    $form->lng = $body['result']['location']['lng'];
                    $form->lat = $body['result']['location']['lat'];
                }else{
                    $error = new MessageBag([
                        'title'   => '店铺地址',
                        'message' => '请填写正确地址，并保证百度地图可以查找到！',
                    ]);
                    return back()->with(compact('error'));
                }

            });
        });

    }
}

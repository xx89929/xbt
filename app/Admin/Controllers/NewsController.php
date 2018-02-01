<?php

namespace App\Admin\Controllers;

use App\Models\News;

use App\Models\NewsTage;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class NewsController extends Controller
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

            $content->header('新闻管理');
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

            $content->header('新闻管理');
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

            $content->header('新闻管理');
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
        return Admin::grid(News::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title('新闻标题');
            $grid->push_tagger('发布者');
            $grid->news_tag_one()->name('新闻标签')->display(function($name){
                $newsTage = NewsTage::where('name',$name)->first();
                return "<span class='label' style='background-color: $newsTage->color;color: white'>$name</span>";
            });
            $grid->is_push('是否发布')->switch([
                'on'  => ['value' => 1, 'text' => '已发布', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '未发布', 'color' => 'danger'],
            ]);
            $grid->read_num('阅览数');

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
        return Admin::form(News::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->image('pic', '新闻图片')->uniqueName();;
            $form->text('title', '新闻标题');
            $form->text('push_tagger', '发布者')->default('修巴堂官方');
            $form->select('tag', '新闻标签')->options(function(){
                return NewsTage::all()->pluck('name','id');
            });
            $form->text('describes','新闻描述');
            $form->switch('is_push', '是否发布')->states([
                'on'  => ['value' => 1, 'text' => '已发布', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '未发布', 'color' => 'danger'],
            ]);
            $form->number('read_num','阅览数');

            $form->editor('content','新闻内容');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}

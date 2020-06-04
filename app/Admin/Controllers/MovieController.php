<?php

namespace App\Admin\Controllers;

use App\Models\Movie;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class MovieController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Movie';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Movie());
        $grid->model()->where('id', '>', 0);
        // 第一列显示id字段，并将这一列设置为可排序列
        $grid->column('id', 'ID')->sortable();

        // 第二列显示title字段，由于title字段名和Grid对象的title方法冲突，所以用Grid的column()方法代替
        $grid->column('title')->modal('dddddd',function ($model) {
                return 12313;
            });
        $grid->column('director')->display(function($userId) {
            return User::find($userId)->name;
        });
        $grid->describe('描述');
        // 第四列显示为describe字段
        $grid->column('describe')->editable('textarea');
//        var_dump($grid->column('describe'));exit();

        // 第五列显示为rate字段
        $grid->column('rate')->label('danger');

        // 第六列显示released字段，通过display($callback)方法来格式化显示输出
        $grid->column('released', '上映?')->display(function ($released) {
            return $released ? '是' : '否';
        });

        // 下面为三个时间字段的列显示
        $grid->column('release_at');
        $grid->column('created_at');
        $grid->column('updated_at');

        // filter($callback)方法用来设置表格的简单搜索框
        $grid->filter(function ($filter) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('name', 'name');
            // 设置created_at字段的范围查询
            $filter->between('created_at', 'Created Time')->datetime();
        });
        $grid->paginate(15);
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Movie::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
//        $show->field('email', __('Email'));
//        $show->field('email_verified_at', __('Email verified at'));
//        $show->field('password', __('Password'));
//        $show->field('remember_token', __('Remember token'));
//        $show->field('created_at', __('Created at'));
//        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Movie());
        $form->text('title', __('Title'));
//        $form->email('email', __('Email'));
//        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
//        $form->password('password', __('Password'));
//        $form->text('remember_token', __('Remember token'));

        return $form;
    }
//    public function index(Content $content)
//    {
//        var_dump(123);exit;
//    }
}

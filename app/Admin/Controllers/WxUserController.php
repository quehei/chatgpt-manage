<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WxUser;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxUserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxUser(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('nick_name','昵称');
            $grid->column('avatar_url','图像')->image(80,80);
            $grid->column('phone','电话');
            $grid->column('gender','性别');
            // $grid->column('country');
            // $grid->column('province');
            // $grid->column('city');
            $grid->column('language','语言');
            $grid->column('logged_at','最后登录时间');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new WxUser(), function (Show $show) {
            $show->field('id');
            $show->field('open_id');
            $show->field('union_id');
            $show->field('nick_name');
            $show->field('password');
            $show->field('avatar_url');
            $show->field('phone');
            $show->field('gender');
            $show->field('country');
            $show->field('province');
            $show->field('city');
            $show->field('language');
            $show->field('logged_at');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new WxUser(), function (Form $form) {
            $form->display('id');
            $form->text('open_id');
            $form->text('union_id');
            $form->text('nick_name');
            $form->text('password');
            $form->text('avatar_url');
            $form->text('phone');
            $form->text('gender');
            $form->text('country');
            $form->text('province');
            $form->text('city');
            $form->text('language');
            $form->text('logged_at');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}

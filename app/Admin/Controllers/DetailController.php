<?php

namespace App\Admin\Controllers;

use App\Models\Detail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DetailController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Detail';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Detail());

        $grid->column('id', __('Id'));
        $grid->column('MainCompID', __('MainCompID'));
        $grid->column('Name', __('Name'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Detail::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('MainCompID', __('MainCompID'));
        $show->field('Name', __('Name'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Detail());

        $form->number('MainCompID', __('MainCompID'));
        $form->text('Name', __('Name'));

        return $form;
    }
}
